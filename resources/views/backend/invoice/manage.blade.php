@extends('backend.layouts.master')
@section('title','Admin-Panel || Banner Create')
@section('main-content')
<style>
    .b2b {
        text-transform: CAPITALIZE;
        background: #28a745;
        text-align: left;
        color: #fff;
        padding: 5px 30px 5px 30px;
        border-radius: 14px;
    }

    .excel {
        text-transform: CAPITALIZE;
        background: #fd7e14;
        text-align: left;
        color: #fff;
        padding: 5px 30px 5px 30px;
        border-radius: 14px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item"><a href="{{ URL::asset('admin/dashboard')}}"><i class="fas fa-cubes"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">
                            <span><i class="fas fa-file-alt"></i> Invoice</span>
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <div id="clock"></div>
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">
                                    Invoice
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover table-responsive-sm dataTable no-footer" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Company</th>
                                                        <th>Invoice</th>
                                                        <th>Invoice&nbsp;Date</th>
                                                        <th>Customer</th>
                                                        <th>Contact</th>
                                                        <th>Total&nbsp;Amount</th>
                                                        <th>Tax</th>
                                                        <th>Tax&nbsp;Amount</th>
                                                        <th>Agency Charges</th>
                                                        <th>Final&nbsp;Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoice as $data)
                                                    <tr>
                                                        <td>
                                                            @if($data->company_name == 'b2b')
                                                            <span class="b2b">{{$data->company_name}}</span>
                                                            @else
                                                            <span class="excel">{{$data->company_name}}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$data->invoice_number}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->invoice_date)->format('d/m/Y') }}</td>
                                                        <td>{{$data->customer_name}}</td>
                                                        <td>{{$data->custmore_mobile}}</td>
                                                        <td>{{$data->total_amount}}</td>
                                                        <td>{{$data->tax_type}}%</td>
                                                        <td>{{$data->tax_amount}}</td>
                                                        <td>{{$data->discount}}%</td>
                                                        <td>{{$data->final_amount_after_discount}}</td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="{{url('/admin/invoice/pdf/'.$data->id)}}" class="dropdown-item"><i class="fas fa-download"></i> Download</a>
                                                                    <form method="POST" action="{{route('admin.invoice.destroy',[$data->id])}}">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit" data-id={{$data->id}}>
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<script type=" text/javascript">
    $('.invoice-view').addClass('active');
</script>

<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv'
            ]
        });
    });
</script>



@endsection