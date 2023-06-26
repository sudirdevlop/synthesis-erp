<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransactionPPJBController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('Transactions.Ppjb.index');
    }
    
    
}
