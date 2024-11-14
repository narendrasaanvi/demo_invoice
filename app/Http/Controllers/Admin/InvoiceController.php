<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

class InvoiceController extends Controller
{

    function convertNumberToWordsForIndia($number)
    {

        $words = array(
            '0' => '',
            '1' => 'one',
            '2' => 'two',
            '3' => 'three',
            '4' => 'four',
            '5' => 'five',
            '6' => 'six',
            '7' => 'seven',
            '8' => 'eight',
            '9' => 'nine',
            '10' => 'ten',
            '11' => 'eleven',
            '12' => 'twelve',
            '13' => 'thirteen',
            '14' => 'fouteen',
            '15' => 'fifteen',
            '16' => 'sixteen',
            '17' => 'seventeen',
            '18' => 'eighteen',
            '19' => 'nineteen',
            '20' => 'twenty',
            '30' => 'thirty',
            '40' => 'fourty',
            '50' => 'fifty',
            '60' => 'sixty',
            '70' => 'seventy',
            '80' => 'eighty',
            '90' => 'ninty'
        );

        //First find the length of the number
        $number_length = strlen($number);
        //Initialize an empty array
        $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $received_number_array = array();

        //Store all received numbers into an array
        for ($i = 0; $i < $number_length; $i++) {
            $received_number_array[$i] = substr($number, $i, 1);
        }

        //Populate the empty array with the numbers received - most critical operation
        for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
            $number_array[$i] = $received_number_array[$j];
        }

        $number_to_words_string = "";
        //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
            //"01,23,45,6,78"
            //"00,10,06,7,42"
            //"00,01,90,0,00"
            if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                    $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                    $number_array[$i] = 0;
                }
            }
        }

        $value = "";
        for ($i = 0; $i < 9; $i++) {
            if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                $value = $number_array[$i] * 10;
            } else {
                $value = $number_array[$i];
            }
            if ($value != 0) {
                $number_to_words_string .= $words["$value"] . " ";
            }
            if ($i == 1 && $value != 0) {
                $number_to_words_string .= "Crores ";
            }
            if ($i == 3 && $value != 0) {
                $number_to_words_string .= "Lakhs ";
            }
            if ($i == 5 && $value != 0) {
                $number_to_words_string .= "Thousand ";
            }
            if ($i == 6 && $value != 0) {
                $number_to_words_string .= "Hundred &amp; ";
            }
        }
        if ($number_length > 9) {
            $number_to_words_string = "Sorry This does not support more than 99 Crores";
        }
        return ucwords(strtolower($number_to_words_string) . " Only.");
    }
    public function index(Request $request)
    {
        $date = Carbon::now();
        $month = $date->format('M');
        $year = $date->format('y');
        $nextyear = $year + 1;
        // Get or create the current sequential number
        $companyName = $request->query('company_name');

        if ($companyName === 'excel') {
            $invoice = Invoice::where('company_name', 'excel')->orderBy('id', 'desc')->first();
            if ($invoice !== null) {
                $sequentialNumber = $invoice->invoice_number;
            } else {
                $sequentialNumber = '21/aug/24-25';
            }
        } elseif ($companyName === 'b2b') {
            $invoice = Invoice::where('company_name', 'b2b')->orderBy('id', 'desc')->first();
            if ($invoice !== null) {
                $sequentialNumber = $invoice->invoice_number;
            } else {
                $sequentialNumber = '72/aug/24-25';
            }
        }



        $firstValue = strtok($sequentialNumber, '/');
        $uniqueNumber = $firstValue + 1; // Replace with your unique number logic
        $invoiceNumberFormatted = sprintf("%d/%s/%s-%02d", $uniqueNumber, strtolower($month), $year, $nextyear);

        // Increment and save the sequential number for the next invoice
        $invoiceNumber = $invoiceNumberFormatted;

        return view('backend.invoice.index', compact('companyName', 'invoiceNumber'));
    }

    public function store(Request $request)
    {

        try {
            $rules = [
                'customerName' => 'required|string|max:150',
                'tax_type' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('admin.invoice.index')->withInput()->withErrors($validator);
            } else {
                $invoice = new Invoice();
                $invoice->tax_type = $request->input('tax_type');
                $invoice->tax_for = $request->input('tax_for');
                $invoice->customer_name = $request->input('customerName');
                $invoice->custmore_mobile = $request->input('mobileNumber');
                $invoice->custmore_email = $request->input('emailAddress');
                $invoice->invoice_number = $request->input('invoiceNumber');
                $invoice->invoice_date = $request->input('invoiceDate');
                $invoice->total_amount = $request->input('total_amount');
                $invoice->tax_amount = $request->input('tax_amount');
                $invoice->final_amount = $request->input('final_amount');
                $invoice->discount = $request->input('discount');
                $invoice->final_amount_after_discount = $request->input('final_amount_after_discount');
                $invoice->address = $request->input('address');
                $invoice->gst = $request->input('gst');
                $invoice->service = $request->input('service');
                $invoice->event_date = $request->input('event_date');
                $invoice->venue = $request->input('venue');
                $invoice->company_name = $request->input('company_name');

                $invoice->save();
                $lastInsertedId = $invoice->id;

                $itemNames = $request->input('itemName');
                foreach ($itemNames as $index => $itemName) {
                    $item = new InvoiceItem();
                    $item->invoice_id = $lastInsertedId;
                    $item->item_name = $itemName;
                    $item->hsncode = $request->input('hsncode')[$index] ?? null;
                    $item->quantity = $request->input('quantity')[$index] ?? null;
                    $item->price = $request->input('price')[$index] ?? null;
                    $item->note = $request->input('note')[$index] ?? null;
                    $item->save();
                }
                return redirect()->route('admin.invoice.index', ['company_name' => $request->input('company_name')])
                    ->with('success', 'Invoice created successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.invoice.index', ['company_name' => $request->input('company_name')])
                ->with('error', 'Failed to create invoice');
        }
    }

    public function downloadpdf($id)
    {




        function convertNumberToWordsForIndia($number)
        {

            $words = array(
                '0' => '',
                '1' => 'one',
                '2' => 'two',
                '3' => 'three',
                '4' => 'four',
                '5' => 'five',
                '6' => 'six',
                '7' => 'seven',
                '8' => 'eight',
                '9' => 'nine',
                '10' => 'ten',
                '11' => 'eleven',
                '12' => 'twelve',
                '13' => 'thirteen',
                '14' => 'fouteen',
                '15' => 'fifteen',
                '16' => 'sixteen',
                '17' => 'seventeen',
                '18' => 'eighteen',
                '19' => 'nineteen',
                '20' => 'twenty',
                '30' => 'thirty',
                '40' => 'fourty',
                '50' => 'fifty',
                '60' => 'sixty',
                '70' => 'seventy',
                '80' => 'eighty',
                '90' => 'ninty'
            );

            //First find the length of the number
            $number_length = strlen($number);
            //Initialize an empty array
            $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
            $received_number_array = array();

            //Store all received numbers into an array
            for ($i = 0; $i < $number_length; $i++) {
                $received_number_array[$i] = substr($number, $i, 1);
            }

            //Populate the empty array with the numbers received - most critical operation
            for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
                $number_array[$i] = $received_number_array[$j];
            }

            $number_to_words_string = "";
            //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
            for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
                //"01,23,45,6,78"
                //"00,10,06,7,42"
                //"00,01,90,0,00"
                if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                    if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                        $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                        $number_array[$i] = 0;
                    }
                }
            }

            $value = "";
            for ($i = 0; $i < 9; $i++) {
                if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                    $value = $number_array[$i] * 10;
                } else {
                    $value = $number_array[$i];
                }
                if ($value != 0) {
                    $number_to_words_string .= $words["$value"] . " ";
                }
                if ($i == 1 && $value != 0) {
                    $number_to_words_string .= "Crores ";
                }
                if ($i == 3 && $value != 0) {
                    $number_to_words_string .= "Lakhs ";
                }
                if ($i == 5 && $value != 0) {
                    $number_to_words_string .= "Thousand ";
                }
                if ($i == 6 && $value != 0) {
                    $number_to_words_string .= "Hundred &amp; ";
                }
            }
            if ($number_length > 9) {
                $number_to_words_string = "Sorry This does not support more than 99 Crores";
            }
            return ucwords(strtolower($number_to_words_string) . "Rupees only.");
        }












        $invoices = Invoice::findOrFail($id);

        $invoiceDate = Carbon::parse($invoices->invoice_date);
        $dueDate = $invoiceDate->copy()->addDays(9)->format('d/m/y');

        $invoiceDate = $invoiceDate->format('d/m/y');
        $word = convertNumberToWordsForIndia($invoices->final_amount);
        $items = InvoiceItem::where('invoice_id', $invoices->id)->get();
        $companyName = $invoices->company_name;
        if ($companyName == 'excel') {
            $imagePath = public_path('assets/img/logo.png');
            $imagePathSill = public_path('assets/img/excel_sill.png');
            $imagePathSign = public_path('assets/img/excel_sign.png');
            $companyName = 'EXCEL EVENT';
            $companyAddres = 'BE - 322, SECTOR - I,SALT LAKE  <br>  CITY KOLKATA -700 064';
            $compnayMobile = '8272932588 / +91 8442908337';
            $companyMail = 'excelevent.kol@gmail.com';
            $companyGST = '19ACXPB1419R1ZW ';
            $companyPAN = 'ACXPB1419R';
            $li2 = 'Cheque should be in favour of "Excel Events" payable at Kolkata';
            $li3 = 'Bank Details : Name - Excel Events : Bank Name - ICICI Bank Branch - Chandannagar Hoogly WB - 712136: Type - Current A/  ICICI Bank, A/c No 090005002491 IFSC Code - 1CICO000405 ';
        } else {
            $imagePath = public_path('assets/img/b2b.png');
            $imagePathSill = public_path('assets/img/b2b_sill.png');
            $imagePathSign = public_path('assets/img/b2b_sign.png');
            $companyName = 'B2B Eventz';
            $companyAddres = 'Alambazar, Baranagar, Kolkata-700035';
            $compnayMobile = '9874223817/+91 7044548313';
            $companyMail = 'b2beventz.kol@gmail.com';
            $companyGST = '19AAPFB0432J1ZE';
            $companyPAN = 'AAPFBO432J';
            $li2 = 'Cheque should be in favour of "B2B Eventz" payable at Kolkata';
            $li3 = 'Bank Details : Name -B2B Eventz: Bank Name - HDFC Bank Branch -Stephen Housa Kol -700001 : Type -Current A/C HDFC Bank, A/c No 50200071 293943 IFSC Code -HDFCO000008';
        }
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
        $base64Image = 'data:image/' . $imageType . ';base64,' . $imageData;

        $imageDataSign = base64_encode(file_get_contents($imagePathSign));
        $imageTypeSign = pathinfo($imagePathSign, PATHINFO_EXTENSION);
        $base64ImageSign = 'data:image/' . $imageTypeSign . ';base64,' . $imageDataSign;

        $imageDataSill = base64_encode(file_get_contents($imagePathSill));
        $imageTypeSill = pathinfo($imagePathSill, PATHINFO_EXTENSION);
        $base64ImageSill = 'data:image/' . $imageTypeSill . ';base64,' . $imageDataSill;

        // return view('backend.invoice.pdf', compact('items', 'invoices', 'base64Image', 'base64ImageSign', 'base64ImageSill', 'companyName', 'companyMail', 'companyAddres', 'compnayMobile', 'companyGST', 'companyPAN', 'li2', 'li3', 'invoiceDate', 'dueDate', 'word'));
        $html = view('backend.invoice.pdf', compact('items', 'invoices', 'base64Image', 'base64ImageSign', 'base64ImageSill', 'companyName', 'companyMail', 'companyAddres', 'compnayMobile', 'companyGST', 'companyPAN', 'li2', 'li3', 'invoiceDate', 'dueDate', 'word'))->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->set_option('defaultPaperSize', 'A4');
        $dompdf->set_option('defaultPaperSize', 'portrait');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->set_option('isHtml5ParserEnabled', true);
        return $dompdf->stream($invoices->customer_name . '.pdf');
    }


    public function view()
    {
        $invoice = Invoice::all();
        return view('backend.invoice.manage', compact('invoice'));
    }
    public function destroy($id)
    {
        $record = Invoice::findOrFail($id);
        $item = InvoiceItem::where('invoice_id', $id);
        $item->delete();
        $record->delete();
        return redirect()->route('admin.invoice.view')->with('success', 'Record deleted successfully');
    }
    public function customersearch(Request $request)
    {
        $query = $request->get('query');
        $customers = Invoice::where('customer_name', 'LIKE', "%{$query}%")->get();
        return response()->json($customers);
    }

    public function customershow($id)
    {
        $customer = Invoice::findOrFail($id);
        return response()->json($customer);
    }
}
