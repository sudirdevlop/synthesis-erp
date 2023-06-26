<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        // dd(Auth::user());
        // get menu
        $get_menu = DB::select('EXECUTE SP_GetMenu :project_id, :userId', [
            'project_id' => session("project"),
            'userId' => Auth::user()->user_id,
        ]);
        // dd(json_encode($get_menu));

        return view('layouts.master', [
            "menus" => $get_menu
        ]);
    }

}