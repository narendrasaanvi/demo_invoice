<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ExportController extends Controller
{
    public function export(Request $request)
    {
        // Fetch data from your models
        $invoice = Invoice::get();

        // Create a new PhpSpreadsheet object
        $spreadsheet = new Spreadsheet();

        // Add first sheet for data information
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('data Information');

        // Add headers for data sheet
        $headers = ['Customer', 'Mobile', 'Email', 'Address', 'GST', 'Service', 'Event Date', 'Venue'];
        $sheet->fromArray([$headers], null, 'A1');

        // Add data data
        $row = 2;
        foreach ($invoice as $data) {
            $sheet->setCellValue('A'.$row, $data->customer_name);
            $sheet->setCellValue('B'.$row, $data->custmore_mobile);
            $sheet->setCellValue('C'.$row, $data->custmore_email);
            $sheet->setCellValue('D'.$row, $data->address);
            $sheet->setCellValue('E'.$row, $data->gst);
            $sheet->setCellValue('F'.$row, $data->service);
            $sheet->setCellValue('G'.$row, $data->event_date);
            $sheet->setCellValue('H'.$row, $data->venue);
            $row++;
        }



        // Create Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = 'export.xlsx';
        $writer->save($filename);

        // Download the file
        return response()->download($filename)->deleteFileAfterSend(true);
    }

}
