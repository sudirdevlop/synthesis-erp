<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class InvoiceController extends Controller
{
    
    public function index()
    {

        // $data = DB::select('exec SP_SelectUsers ?', [1]);
        // return $data;

        $user = Auth::user();
        if(!$user) {
            return Redirect::route('login');
        }
        $data = [
            "title" => "Kode Faktur"
        ];
        return view('Reports.Invoice.index', [
            'user' => $user,
            'data' => $data
        ]);
    }
}