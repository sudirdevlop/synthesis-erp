<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class TransactionBookingController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('Transactions.Booking.index');
    }

    // public function upload_ktp(Request $request)
    // {
    //     if ($request->hasFile('upload_ktp')) {
    //         $file = $request->file('upload_ktp');
    //         $fileName = $file->getClientOriginalName();
    //         $targetDirectory = '/it/Synthesis ERP/Attachment/Sales AR Jual/TransactionBooking/Customer/';

    //         $url = '//192.167.12.7'.$targetDirectory.$fileName;
    //         $username = 'it_erp';
    //         $password = 'erp@synthesis';

    //         $response = Http::withOptions([
    //             'verify' => false, // Set to true if SSL certificate is valid and verified
    //             'auth' => [$username, $password],
    //         ])->attach('upload_ktp', file_get_contents($file), $fileName)
    //         ->put($url);

    //         if ($response->successful() && $response->status() === 201) {
    //             // File uploaded successfully
    //             return "File uploaded successfully!";
    //         } else {
    //             // Failed to upload file
    //             return "File upload failed!";
    //         }
    //     } else {
    //         // No file uploaded
    //         return "No file uploaded!";
    //     }
    // }

    public function upload_ktp(Request $request)
    {
        if ($request->hasFile('upload_ktp')) {
            $file = $request->file('upload_ktp');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = '/Synthesis ERP/Attachment/Sales AR Jual/TransactionBooking/Customer/';

            $destinationPath = '\\\\192.167.12.7\\it'.$targetDirectory;

            if (file_put_contents($destinationPath.$fileName, file_get_contents($file))) {
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
