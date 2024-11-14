@extends('backend.layouts.master')
@section('title','Admin-Panel || Banner Create')
@section('main-content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <ol class="breadcrumb my-0 ms-2">
                  <li class="breadcrumb-item"><a href="{{ URL::asset('admin/dashboard')}}"><i class="fas fa-cubes"></i> Dashboard</a></li>
                  <li class="breadcrumb-item active">
                     <span><i class="fas fa-file-alt"></i> Posts</span>
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
                  <div class="card-header">Add New Post</div>
                  <div class="card-body">
                     @if (session('success'))
                     <script type="text/javascript">
                        toastr.success('{{ session("success") }}')
                     </script>
                     @elseif(session('failed'))
                     <script type="text/javascript">
                        toastr.warning('{{ session("failed") }}')
                     </script>
                     @endif
                     <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                           <label for="inputTitle" class="col-form-label">Current Password <span class="text-danger">*</span></label>
                           <input id="inputTitle" type="text" name="current_password" placeholder="Enter title" value="{{old('current_password')}}" class="form-control" >
                           @error('current_password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>




                        <div class="form-group">
                           <label for="inputTitle" class="col-form-label">New Password<span class="text-danger">*</span></label>
                           <input id="inputTitle" type="text" name="password" placeholder="Enter title" value="{{old('new_password')}}" class="form-control" >
                           @error('password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="inputTitle" class="col-form-label">New Confirm Password<span class="text-danger">*</span></label>
                           <input id="inputTitle" type="text" name="password_confirmation" placeholder="Enter title" value="{{old('new_confirm_password')}}" class="form-control" >
                           @error('password_confirmation')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                     <div class="form-group mb-3">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                     </div>
                     </form>
                     @if ($errors->any())
                     @foreach ($errors->all() as $error)
                     <div style="color: red;font-size: 14px;text-align: center;">{{$error}}</div>
                     @endforeach
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>

@endsection
