<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
    .content {
        width: 100%;
        transform: scale(0.95);
        transform-origin: top left;
    }
    </style>
    <style>
    @page {
        size: A4;
        margin: 20px;
        /* Set margins to 0 if you want full-page content */
    }


    body {
        margin: 40px 15px 15px 15px;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-20 {
        width: 20%;
    }

    .w-30 {
        width: 30%;
    }

    .invoice-box {
        margin: auto;
        padding: 3px;
        font-size: 16px;
        line-height: 24px;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 1px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 1px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 1px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    .company-name {
        font-size: 15px;
        margin-bottom: 0;
        color: #1474c3;
    }

    .invoice-address {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 11px;
        padding: 2px 5px 2px 2px !important;
    }

    table.total {
        text-align: right;
    }

    .small-size {
        font-size: 12px;
        line-height: 22px;
    }

    table.bottom-table {
        width: 100%;
    }

    td.bottom-table-tr {
        width: 50%;
    }

    .text-end {
        text-align: right !important;
    }

    .bg-gray {
        background: #eee;
    }

    .text-center {
        text-align: center !important;
    }

    .title-bg {
        background: #eee;
        padding: 4px 200px 4px 0;
    }

    .left-box {
        list-style-type: none;
        font-size: 14px;
        line-height: 21px;
        padding: 0;
    }

    .left-title {
        background: #eeeeee;
        width: 80%;
        padding-left: 1%;
    }

    .right-box {
        border-collapse: collapse;
        width: 100%;
        font-size: 12px;
    }

    .right-box td,
    .right-box th {
        border: 1px solid #000;
        padding: 1px 5px 1px 1px;
    }

    .right-box .bg-gray {
        background-color: #f0f0f0;
    }

    .right-box .label {
        font-weight: normal;
        text-align: left;
        padding-right: 1px 1px 1px 5px;
    }

    .value {
        text-align: right;
        flex: 1;
        padding-left: 10px;
    }

    .bottom-table td {
        vertical-align: top;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .p-5 {
        padding: 5px;
    }
    </style>
</head>
@php
$totalAmount = $invoices->total_amount;
$discountPercentage = $invoices->discount;
$taxPercentage = $invoices->tax_type;

// Calculate the discount amount
$discountAmount = ($totalAmount * $discountPercentage) / 100;
// Calculate the total after discount
$totalAfterDiscount = $totalAmount + $discountAmount;
// Calculate the tax amount
$taxAmount = ($totalAfterDiscount * $taxPercentage) / 100;
// Calculate the total amount after tax
$totalAfterTax = $totalAfterDiscount + $taxAmount;
@endphp

<body>
    <table>
        <tr>
            <td class="title w-50">
                @if($invoices->customer_name=='excel')
                <img src="{{ $base64Image }}" alt="Image" style="width:150px" />
                @else
                <img src="{{ $base64Image }}" alt="Image" style="width:250px" />
                @endif
            </td>
            <td class="w-50 text-end">
                <h1 class="company-name">{{ $companyName }}</h1>
                {!! $companyAddres !!}<br>
                E-mail Id: {{ $companyMail }}<br>
                PHONE NO. : +91 {{ $compnayMobile }}<br>
            </td>
        </tr>
    </table>
    <table cellpadding="0" class="mb-3">
        <tr>
            <td class="w-50">
                <ul class="left-box">
                    <li class="left-title"><strong>BILL TO</strong></li>
                    <li>{{ $invoices->customer_name }}</li>
                    <li>{{ $invoices->address }}</li>
                    <li>GST: {{ $invoices->gst }}</li>
                </ul>
            </td>
            <td class="w-20">
            </td>
            <td class="w-30">
                <table class="right-box">
                    <tr>
                        <td class="label">DATE</td>
                        <td class="value">{{ $invoiceDate }}</td>
                    </tr>
                    <tr>
                        <td class="label">INVOICE</td>
                        <td class="value">{{ $invoices->invoice_number }}</td>
                    </tr>
                    <tr>
                        <td class="label bg-gray">Due Date</td>
                        <td class="value bg-gray">{{ $dueDate }}</td>
                    </tr>
                    <tr class="text-center">
                        <td class="">GST NO.</td>
                        <td class="">{{ $companyGST }}</td>
                    </tr>
                    <tr class="text-center">
                        <td class="">Pan No.</td>
                        <td class="">{{ $companyPAN }}</td>
                    </tr>
                    <tr>
                        <td class="label">Service</td>
                        <td class="value">{{ $invoices->service }}</td>
                    </tr>
                    <tr>
                        <td class="label">Event Date</td>
                        <td class="value">{{ $invoices->event_date }}</td>
                    </tr>
                    <tr>
                        <td class="label">Venue</td>
                        <td class="value">{{ $invoices->venue }}</td>
                    </tr>
                </table>


            </td>
        </tr>
    </table>
    <table class="invoice-address mb-3">
        <tr class="bg-gray">
            <td class="s p-5">Description</td>
            <td class="text-center">Quantity</td>
            <td class="text-center">Rate</td>
            <td class="text-end">Amount</td>
        </tr>
        @foreach($items as $item)
        <tr class="invoice-address">
            <td class="p-5">{{ $item->item_name }}
                <br>
                <span>{!! nl2br(e($item->note)) !!}</span>
            </td>
            <td class="invoice-address text-center">{{ $item->quantity }}</td>
            <td class="invoice-address text-center">{{ number_format($item->price, 2) }}
            </td>
            <td class="invoice-address text-end">{{ number_format($item->quantity * $item->price, 2) }}
            </td>
        </tr>
        @endforeach
        <tr class="invoice-address">
            <td colspan="3" class="text-end"><b>Total Amount</b></td>
            <td class="invoice-address text-end"><b>{{ number_format($invoices->total_amount, 2) }}
                </b></td>
        </tr>
        <tr class="invoice-address">
            <td colspan="3" class="invoice-address text-start p-5">Agency Charges({{$invoices->discount }}%)</td>
            <td class="invoice-address text-end">{{$invoices->discountAmount }}</td>
        </tr>
    </table>
    <table class="bottom-table">
        <tr class="invoice-address">
            <td class="small-size bottom-table-tr" style="border: solid 1px #000;">
                <ul style="padding-left: 20px;">
                    <li>Total payment due in 7 days</li>
                    <li>{{$li2}}</li>
                    <li>{{$li3}}</li>
                </ul>
            </td>
            <td class="bottom-table-tr">
                <table class="invoice-address">
                    <tr>
                        <td class="invoice-address"><b>Total:</b></td>
                        <td class="invoice-address  text-end"><b>RS.{{ number_format($totalAfterDiscount, 2) }}</b></td>
                    </tr>
                    @if($invoices->tax_for!='Free')
                    @if($invoices->tax_for=='CGST & SGST')
                    <tr>
                        <td class="invoice-address">SGST {{$invoices->tax_type/2 }}%</td>
                        <td class="invoice-address text-end">RS.{{ number_format($taxAmount / 2, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="invoice-address">CGST {{$invoices->tax_type/2 }}%</td>
                        <td class="invoice-address text-end">RS.{{ number_format($taxAmount / 2, 2) }}
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td class="invoice-address">IGST {{$invoices->tax_type}}%</td>
                        <td class="invoice-address text-end">RS.{{ number_format($taxAmount, 2) }}
                        </td>
                    </tr>
                    @endif
                    @endif

                    <tr>
                        <td class="invoice-address"><b>Final Total:</b></td>
                        <td class="invoice-address text-end"><b>RS.{{ number_format($invoices->final_amount, 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>"{!!$word!!}"</b></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="text-align: center">Thank You For Your Business !</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center">
                <img src="{{ $base64ImageSill }}" alt="Image" style="width:120px" />
            </td>
            <td style="text-align: center">
                <img src="{{ $base64ImageSign }}" alt="Image" style="width:160px" />
            </td>
        </tr>
    </table>

</body>

</html>