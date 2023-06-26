<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class KodeAgamaController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        if(!$user) {
            return Redirect::route('login');
        }
        $data = [
            "title" => "Kode Faktur"
        ];
        return view('Masters.KodeAgama.index', [
            'user' => $user,
            'data' => $data
        ]);
    }
    
    public function list()
    {
        $list = DB::select("EXEC SP_GetMasterReligion");
        
        $response['data'] = $list;
        return response()->json($response, 200);
    }
}