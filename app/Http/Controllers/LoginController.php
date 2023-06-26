<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;

class LoginController extends Controller
{
    //
    public function login()
    {   

        $list_project = DB::select("EXEC SP_GetProject");
        $list_company = DB::select("EXEC SP_GetCompany");

        return view('auth.login_v1', [
            'list_company' => $list_company,
            'list_project' => $list_project
        ]);
    }

    public function login_document_monitoring()
    {   

        return view('auth.login_document_monitoring', [
        ]);
    }

    public function authenticate(Request $request)
    {
        if(!empty($request->project))
        {
            $project = explode("|", $request->project);
            $project_name = explode("-", $project[1]);
        }

        if(!empty($request->company))
        {
            $company = explode("|", $request->company);
        }

        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {

            $userId = Auth::user()->user_id;

            // insert UserLog
            $userLog = DB::statement('EXECUTE SP_UserLog :user_log_id, :user_id, :status, :log_date, :ip_address, :mac_address, :State', [
                'user_log_id' => null,
                'user_id' => $userId,
                'status' => 1,
                'log_date' => date('Y-m-d H:i:s'),
                'ip_address' => $this->getIp(),
                'mac_address' => $this->getMac(),
                'State' => 'Insert'
            ]);

            // update master user
            $user = DB::statement('EXECUTE SP_MasterUsers :user_id, :username, :password, :remember_token, :user_role_id, :is_active, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                'user_id' => $userId,
                'username' => $request->username,
                'password' => Auth::user()->password,
                'remember_token' => null,
                'user_role_id' => Auth::user()->user_role_id,
                'is_active' => 0,
                'created_by' => null,
                'created_date' => Auth::user()->created_date,
                'updated_by' => $userId,
                'updated_date' => date('Y-m-d H:i:s'),
                'ip_address' => $this->getIp(),
                'mac_address' => $this->getMac(),
                'State' => 'Update'
            ]);   

            // get employee
            $get_employee = DB::select('EXECUTE SP_GetEmployee :username', [
                'username' => $request->username
            ]);
            
            $request->session()->regenerate();
            if(!empty($request->project))
            {
                $request->session()->put('project', $project[0]);   
                $request->session()->put('project_name', $project_name[1]);  
                $request->session()->put('employee_name', $get_employee[0]->employee_name);   
            }
            if(!empty($request->company))
            {
                $request->session()->put('company', $company[0]);   
            } 

            return redirect()->intended('dashboard');
        };

        return back()->withErrors([
            'username' => 'Username dan password tidak cocok.',
        ])->onlyInput('username');
    }

    public function logout(){

        $userId = Auth::user()->user_id;
        // insert UserLog
        $userLog = DB::statement('EXECUTE SP_UserLog :user_log_id, :user_id, :status, :log_date, :ip_address, :mac_address, :State', [
            'user_log_id' => null,
            'user_id' => $userId,
            'status' => (string)0,
            'log_date' => date('Y-m-d H:i:s'),
            'ip_address' => $this->getIp(),
            'mac_address' => $this->getMac(),
            'State' => 'Insert'
        ]);

        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function logout_monitoring(){

        $userId = Auth::user()->user_id;
        // insert UserLog
        $userLog = DB::statement('EXECUTE SP_UserLog :user_log_id, :user_id, :status, :log_date, :ip_address, :mac_address, :State', [
            'user_log_id' => null,
            'user_id' => $userId,
            'status' => (string)0,
            'log_date' => date('Y-m-d H:i:s'),
            'ip_address' => $this->getIp(),
            'mac_address' => $this->getMac(),
            'State' => 'Insert'
        ]);

        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login_document_monitoring');
    }

    public function display_forgot_password(){
        return view('auth.forgot_password', [
        ]);
    }

    public function forgot_password(Request $request){

        $employee = DB::select('EXECUTE SP_GetEmail :employee_code', [
            'employee_code' => $request->employee_code,
        ]);
        
        $dataEmail["email"] = $employee[0]->email;
        $dataEmail["employee_code"] = $request->employee_code;
        $dataEmail["body"] = "Hallo Customer,";
        $dataEmail["title"] = "Forgot Password";

        try {
            $kirim_email = Mail::send('auth.email_forgot_password', $dataEmail, function($message)use($dataEmail) {

                $message->to($dataEmail["email"], $dataEmail["email"])

                ->subject($dataEmail["title"]);

            });
        } catch (\Exception $e) {
            dd($e);
        }
        $dt['message'] = "Check your email !";
        return response()->json($dt, 200); 
    }

    public function display_reset_password(Request $request){
        return view('auth.reset_password', [
            "employee_code" => $request->page
        ]);
    }

    public function reset_password(Request $request){

        $reset_pass = DB::statement('EXECUTE SP_ResetPassword :employee_code, :password, :updated_date, :ip_address, :mac_address', [
            'employee_code' => $request->employee_code,
            'password' => Hash::make($request->password),
            'updated_date' => date('Y-m-d H:i:s'),
            'ip_address' => $this->getIp(),
            'mac_address' => $this->getMac()
        ]);

        $dt['message'] = "Reset Password successfully";
        return response()->json($dt, 200); 
    }
    

    private function getIp(){
        // Jalankan perintah ipconfig melalui PHP
        $command = 'ipconfig';
        $output = shell_exec($command);

        // Ambil informasi IP dari hasil output
        $ip = '';
        $lines = explode("\n", $output);
        foreach ($lines as $line) {
            if (strpos($line, 'IPv4 Address') !== false) {
                $parts = explode(':', $line);
                $ip = trim($parts[1]);
                break;
            }
        }
        
        return $ip;
    }

    private function getMac(){
        // Jalankan perintah getmac melalui PHP
        $command = 'getmac /FO CSV /NH';
        $output = shell_exec($command);

        // Get the MAC Address from the output
        $macAddress = '';
        $lines = explode("\n", $output);
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                $parts = str_getcsv($line);
                $macAddress = trim($parts[0], '"');
                break;
            }
        }

        // Display the obtained MAC Address
        return $macAddress;
    }
}
