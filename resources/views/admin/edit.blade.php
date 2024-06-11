@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Role User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ implode('', $errors->all(':message')) }}
                        </div>
                    @endif

                        <form method="Post" action="{{ route('admin-update', ['id' => $user->id]) }}">
                            @csrf
                            @method('patch')
                            {{-- <div class="form-group">
                                <label for="no-kk">NRP</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: 2272045" name="nrp" required autofocus
                                       maxlength="16" value="{{ $user->nrp }}">
                            </div> --}}
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: John Doe" name="name" required autofocus
                                       maxlength="16" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: 2272045@gmail.com" name="email" required autofocus
                                       maxlength="32" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>Kode Role</label>
                                <input type="text" class="form-control" 
                                       placeholder="1 = Admin // 2 = Company // 3 = JobSeeker" name="kode_role" required autofocus
                                       maxlength="1" value="{{ $user->kode_role }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"  placeholder="Contoh: 12345678"
                                       required name="password" minlength="8">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
