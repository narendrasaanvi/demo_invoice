<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class AdminController extends Controller
{
    public function index()
    {
        $totalfive = Invoice::where('company_name', 'excel')->count();
        $totaleight = Invoice::where('company_name', 'b2b')->count();
        return view('backend.index', compact('totalfive', 'totaleight'));
    }
    public function profile()
    {
        $user = auth()->user();

        return view('backend.profile', compact('user'));
    }
}
