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
                        <div class="card-header">Add New Category</div>
                        <div class="card-body">
                            @if (session('status'))
                            <script type="text/javascript">
                                toastr.success('{{ session("status") }}')
                            </script>
                            @elseif(session('failed'))
                            <script type="text/javascript">
                                toastr.warning('{{ session("failed") }}')
                            </script>
                            @endif
                            <form class="px-4 pt-2 pb-3" method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="inputTitle" class="col-form-label">Name</label>
                                    <input id="inputTitle" type="text" name="name" placeholder="Enter name" value="{{old('name', $user->name)}}" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                    <input id="inputEmail" type="email" name="email" placeholder="Enter email" value="{{old('email', $user->email)}}" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
 
                                <button class="btn btn-primary w-100" type="submit">Update</button>
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
<script type="text/javascript">
    $('.post').addClass('active');
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.category').addClass('active');
        $('.summernote').summernote({
            height: 300 // Set height of editor
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail"/>');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#category").change(function() {
        readURL(this);
    });
</script>
@endsection
