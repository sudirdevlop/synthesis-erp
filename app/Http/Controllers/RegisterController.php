<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MasterUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('auth.register_v1');
    }

    public function store(Request $request)
    {

        $user = DB::statement('EXECUTE SP_MasterUsers :user_id, :username, :password, :remember_token, :user_role_id, :is_active, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
            'user_id' => null,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'remember_token' => null,
            'user_role_id' => 1,
            'is_active' => 0,
            'created_by' => null,
            'created_date' => date('Y-m-d H:i:s'),
            'updated_by' => null,
            'updated_date' => null,
            'ip_address' => $this->getIp(),
            'mac_address' => $this->getMac(),
            'State' => 'Insert'
        ]);

        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
    }

    private function getIp(){
        
        $command = 'ipconfig';
        $output = shell_exec($command);

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
        
        $command = 'getmac /FO CSV /NH';
        $output = shell_exec($command);

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
