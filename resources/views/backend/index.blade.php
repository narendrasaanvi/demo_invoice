@extends('backend.layouts.master')
@section('title','Admin-Panel || Banner Create')
@section('main-content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><a href="{{ URL::asset('admin/dashboard')}}" class="dashbord">Dashboard</a></h1>
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
         <div class="card mb-4 ">
            <div class="card-body">
               <div class="d-flex justify-content-between">
                  <h4 class="card-title mb-0">
                     Welcome Invoice Dashboard.
                  </h4>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-3 col-6">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3>{{$totalfive}}</h3>
                     <p>Total Excel Invoice</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-map"></i>
                  </div>
                  <a href="{{ URL::asset('admin/invoice?company_name=excel')}}" class="small-box-footer">Genrate <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>{{$totaleight}}</h3>
                     <p>Total B2B Invoice</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-map"></i>
                  </div>
                  <a href="{{ URL::asset('admin/invoice?company_name=b2b')}}" class="small-box-footer">Genrate <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<script type="text/javascript">
   $('.dashboard').addClass('active');
</script>
@endsection