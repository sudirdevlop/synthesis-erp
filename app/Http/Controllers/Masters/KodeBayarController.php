<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class KodeBayarController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        if(!$user) {
            return Redirect::route('login');
        }
        $category_payment = DB::select("EXEC SP_GetMasterJenisBayar");
        return view('Masters.KodeBayar.index', [
            'user' => $user,
            'category_payment' => $category_payment
        ]);
    }

    public function list()
    {
        $list = DB::select("EXEC SP_GetMasterBayar");
        
        $response['data'] = $list;
        return response()->json($response, 200);
    }

    public function store(request $request)
    {
        try {
            if(empty($request->payment_id))
            {
                // insert master
                $store = DB::statement('EXECUTE SP_MasterBayar :bayar_id, :project_id, :company_id, :user_id, :bayar_code, :bayar_name, :bayar_jenis_id, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                    'bayar_id' => 0,
                    'project_id' => session("project"),
                    'company_id' => session("company"),
                    'user_id' => Auth::user()->user_id,
                    'bayar_code' => $request->payment_code,
                    'bayar_name' => $request->payment_name,
                    'bayar_jenis_id' => $request->category_payment,
                    'created_by' => Auth::user()->user_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_by' => null,
                    'updated_date' => null,
                    'ip_address' => $this->getIp(),
                    'mac_address' => $this->getMac(),
                    'State' => 'Insert'
                ]);
                
                $response['message'] = "Successfully saved";

            } else {
                $master_type = DB::select("EXEC SP_GetMasterBayarById :bayar_id", [
                    'bayar_id' => $request->payment_id
                ]);
                // update master
                $store = DB::statement('EXECUTE SP_MasterBayar :bayar_id, :project_id, :company_id, :user_id, :bayar_code, :bayar_name, :bayar_jenis_id, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                    'bayar_id' => $request->payment_id,
                    'project_id' => session("project"),
                    'company_id' => session("company"),
                    'user_id' => Auth::user()->user_id,
                    'bayar_code' => $request->payment_code,
                    'bayar_name' => $request->payment_name,
                    'bayar_jenis_id' => $request->category_payment,
                    'created_by' => $master_type[0]->created_by,
                    'created_date' => $master_type[0]->created_date,
                    'updated_by' =>  Auth::user()->user_id,
                    'updated_date' => date('Y-m-d H:i:s'),
                    'ip_address' => $this->getIp(),
                    'mac_address' => $this->getMac(),
                    'State' => 'Update'
                ]);
                
                $response['message'] = "Successfully updated";

            }

            
            return response()->json($response, 200);
        } catch (Exception $e) {            
            $response['message'] = $e;
            return response()->json($response, 200);
        }
    }

    public function delete(request $request)
    {
        
        try {

            $master_type = DB::select("EXEC SP_GetMasterBayarById :bayar_id", [
                'bayar_id' => $request->payment_id
            ]);
            // update master
            $store = DB::statement('EXECUTE SP_MasterBayar :bayar_id, :project_id, :company_id, :user_id, :bayar_code, :bayar_name, :bayar_jenis_id, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                'bayar_id' => $request->payment_id,
                'project_id' => session("project"),
                'company_id' => session("company"),
                'user_id' => Auth::user()->user_id,
                'bayar_code' => $master_type[0]->bayar_code,
                'bayar_name' => $master_type[0]->bayar_name,
                'bayar_jenis_id' => $master_type[0]->bayar_jenis_id,
                'created_by' => $master_type[0]->created_by,
                'created_date' => $master_type[0]->created_date,
                'updated_by' =>  Auth::user()->user_id,
                'updated_date' => date('Y-m-d H:i:s'),
                'ip_address' => $this->getIp(),
                'mac_address' => $this->getMac(),
                'State' => 'Delete'
            ]);
            
            $response['message'] = "Successfully removed";
            
            return response()->json($response, 200);
        } catch (Exception $e) {            
            $response['message'] = $e;
            return response()->json($response, 200);
        }
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