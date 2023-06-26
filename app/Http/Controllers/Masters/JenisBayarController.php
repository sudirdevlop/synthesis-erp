<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class JenisBayarController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        if(!$user) {
            return Redirect::route('login');
        }
        $data = [
            "title" => "JenisProduk"
        ];
        return view('Masters.JenisBayar.index', [
            'user' => $user,
            'data' => $data
        ]);
    }
    
    public function list()
    {
        $list = DB::select("EXEC SP_GetMasterJenisBayar");
        
        $response['data'] = $list;
        return response()->json($response, 200);
    }

    public function store(request $request)
    {
        try {
            if(empty($request->category_payment_id))
            {
                // insert master jenis_bayar
                $store = DB::statement('EXECUTE SP_MasterJenisBayar :jenis_bayar_id, :project_id, :company_id, :user_id, :jenis_bayar_name, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                    'jenis_bayar_id' => 0,
                    'project_id' => session("project"),
                    'company_id' => session("company"),
                    'user_id' => Auth::user()->user_id,
                    'jenis_bayar_name' => $request->category_payment,
                    'created_by' => Auth::user()->user_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_by' => null,
                    'updated_date' => null,
                    'ip_address' => $this->getIp(),
                    'mac_address' => $this->getMac(),
                    'State' => 'Insert'
                ]);
                
                $response['message'] = "Successfully saved";

            }else{

                $master_jenis_bayar = DB::select("EXEC SP_GetMasterJenisBayarById :jenis_bayar_id", [
                    'jenis_bayar_id' => $request->category_payment_id
                ]);
                // update master jenis_bayar
                $update = DB::statement('EXECUTE SP_MasterJenisBayar :jenis_bayar_id, :project_id, :company_id, :user_id, :jenis_bayar_name, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                    'jenis_bayar_id' => $request->category_payment_id,
                    'project_id' => session("project"),
                    'company_id' => session("company"),
                    'user_id' => Auth::user()->user_id,
                    'jenis_bayar_name' => $request->category_payment,
                    'created_by' => $master_jenis_bayar[0]->created_by,
                    'created_date' => $master_jenis_bayar[0]->created_date,
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

            $master_jenis_bayar = DB::select("EXEC SP_GetMasterJenisBayarById :jenis_bayar_id", [
                'jenis_bayar_id' => $request->category_payment_id
            ]);
            // update master jenis_bayar
            $update = DB::statement('EXECUTE SP_MasterJenisBayar :jenis_bayar_id, :project_id, :company_id, :user_id, :jenis_bayar_name, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                'jenis_bayar_id' => $request->category_payment_id,
                'project_id' => session("project"),
                'company_id' => session("company"),
                'user_id' => Auth::user()->user_id,
                'jenis_bayar_name' => $master_jenis_bayar[0]->jenis_bayar_name,
                'created_by' => $master_jenis_bayar[0]->created_by,
                'created_date' => $master_jenis_bayar[0]->created_date,
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

    function by_id($id) {
        $data = DB::select("EXEC SP_GetMasterJenisBayarById :jenis_bayar_id", [
            'jenis_bayar_id' => $id
        ]);
        $response['data'] = $data[0];
        return response()->json($response, 200);
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