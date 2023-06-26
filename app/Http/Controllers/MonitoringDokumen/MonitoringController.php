<?php

namespace App\Http\Controllers\MonitoringDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MonitoringController extends Controller
{
    //
    public function index()
    {   
        
        return view('monitoring_dokumen.index', [
        ]);
    }

    public function list()
    {
        $list = DB::select("EXEC SP_GetMasterAttachment");
        
        $response['data'] = $list;
        return response()->json($response, 200);
    }

    public function store(request $request)
    {
        try {
            if(empty($request->attachment_id))
            {
                // insert master attachment

                $file = $request->file('attachment_directory');
                $fileName = $file->getClientOriginalName();
                $dateTime = date('YmdHis');
                $fileNameWithDateTime = $dateTime . '_' . $fileName;
                $targetDirectory = '/SynthesisERP/Attachment/DocumentMonitoring/';

                $destinationPath = '\\\\192.167.12.7\\it'.$targetDirectory;


                $store = DB::statement('EXECUTE SP_MasterAttachment :attachment_id, :user_id, :employee_code, :attachment_name, :attachment_directory, :created_by, :created_date, :updated_by, :updated_date, :start_date, :end_date, :ip_address, :mac_address, :State', [
                    'attachment_id' => 0,
                    'user_id' => Auth::user()->user_id,
                    'employee_code' => Auth::user()->username,
                    'attachment_name' => $request->attachment_name,
                    'attachment_directory' => $destinationPath.$fileNameWithDateTime,
                    'created_by' => Auth::user()->user_id,
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_by' => null,
                    'updated_date' => null,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'ip_address' => $this->getIp(),
                    'mac_address' => $this->getMac(),
                    'State' => 'Insert'
                ]);
                
                file_put_contents($destinationPath.$fileNameWithDateTime, file_get_contents($file));
                
                $response['message'] = "Successfully saved";

            }else{

                $master_attachment = DB::select("EXEC SP_GetMasterAttachmentById :attachment_id", [
                    'attachment_id' => $request->attachment_id
                ]);
                // update master attachment
                $update = DB::statement('EXECUTE SP_MasterAttachment :attachment_id, :project_id, :company_id, :user_id, :attachment_code, :attachment_name, :jenis_attachment_id, :ppn, :account_number, :account_div, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                    'attachment_id' => $request->attachment_id,
                    'project_id' => session("project"),
                    'company_id' => session("company"),
                    'user_id' => Auth::user()->user_id,
                    'attachment_code' => $request->attachment_code,
                    'attachment_name' => $request->attachment_name,
                    'jenis_attachment_id' => $request->category_attachment,
                    'ppn' => $request->ppn,
                    'account_number' => $request->account_1,
                    'account_div' => $request->account_2,
                    'created_by' => $master_attachment[0]->created_by,
                    'created_date' => $master_attachment[0]->created_date,
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

            $master_attachment = DB::select("EXEC SP_GetMasterAttachmentById :attachment_id", [
                'attachment_id' => $request->attachment_id
            ]);
            // update master attachment
            $update = DB::statement('EXECUTE SP_MasterAttachment :attachment_id, :project_id, :company_id, :user_id, :attachment_code, :attachment_name, :jenis_attachment_id, :ppn, :account_number, :account_div, :created_by, :created_date, :updated_by, :updated_date, :ip_address, :mac_address, :State', [
                'attachment_id' => $request->attachment_id,
                'project_id' => session("project"),
                'company_id' => session("company"),
                'user_id' => Auth::user()->user_id,
                'attachment_code' => $request->attachment_code,
                'attachment_name' => $request->attachment_name,
                'jenis_attachment_id' => $request->category_attachment,
                'ppn' => $request->ppn,
                'account_number' => $request->account_1,
                'account_div' => $request->account_2,
                'created_by' => $master_attachment[0]->created_by,
                'created_date' => $master_attachment[0]->created_date,
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
        $data = DB::select("EXEC SP_GetMasterAttachmentById :attachment_id", [
            'attachment_id' => $id
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

    public function upload_ktp(Request $request)
    {
        if ($request->hasFile('upload_ktp')) {
            $file = $request->file('upload_ktp');
            $fileName = $file->getClientOriginalName();
            $dateTime = date('YmdHis');
            $fileNameWithDateTime = $dateTime . '_' . $fileName;
            $targetDirectory = '/Synthesis ERP/Attachment/DocumentMonitoring/';

            $destinationPath = '\\\\192.167.12.7\\it'.$targetDirectory;

            if (file_put_contents($destinationPath.$fileNameWithDateTime, file_get_contents($file))) {
                // dd($destinationPath.$fileNameWithDateTime);
                // File berhasil diunggah
                return "File uploaded successfully!";
            } else {
                // Gagal mengunggah file
                return "File upload failed!";
            }
        } else {
            // Tidak ada file yang diunggah
            return "No file uploaded!";
        }
    }

}