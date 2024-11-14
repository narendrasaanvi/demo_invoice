@extends('backend.layouts.master')
@section('title','Admin-Panel || Banner Create')
@section('main-content')
<style>
    label {
        display: inline-block;
        margin-bottom: .3rem !important;
        font-weight: normal !important;
        ;
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
                            <span><i class="fas fa-file-alt"></i>Report Month</span>
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
                                    Report Month Wise
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container mt-3">
                                <form id="invoiceForm" method="POST" action="{{ route('admin.report.date.view') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-2">
                                        <label for="invoiceDate" class="form-label">From Date</label>
                                        <input type="date" class="form-control" id="fromdate" name="fromdate">
                                    </div>
                                    <div class="mb-2">
                                        <label for="invoiceDate" class="form-label">To Date</label>
                                        <input type="date" class="form-control" id="todate" name="todate">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">View Report</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>

@endsection