<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class ReportController extends Controller
{
    public function reportmonth()
    {
        return view('backend.report.month');
    }
    public function reportmonthview(Request $request)
    {
        $month = $request->input('month');
        $year = substr($month, 0, 4);
        $month = substr($month, 5, 2); // Extract the month part

        $invoice = Invoice::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        return view('backend.report.manage', compact('invoice'));
    }
    public function reportdate()
    {
        return view('backend.report.date');
    }
    public function reportdateview(Request $request)
    {
        $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');

        $invoice = Invoice::whereBetween('created_at', [$fromdate, $todate])->get();
        return view('backend.report.manage', compact('invoice'));
    }
}
