@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Jobs</h1>
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

                        <form method="Post" action="{{ route('pj-update', ['id' => $pj->id]) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Job ID</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: IJ122" name="kode_mk" required autofocus
                                       maxlength="7" value="{{ $pj->idJob }}">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: IJ122" name="company-name" required autofocus
                                       maxlength="7" value="{{ $pj->companyName }}">
                            </div>           
                            </div>
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: Senior Programmer" name="nama_mk" required autofocus
                                       maxlength="32" value="{{ $pj->jobtitle }}">
                            </div>
                            <div class="form-group">
                                <label>Requirement</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: Tes" name="requirements" required autofocus
                                       value="{{ $pj->requirements }}">
                            </div>
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: 200000000" name="salary" required autofocus
                                       value="{{ $pj->salary }}">
                            </div>
                            <div class="form-group">
                                <label>Date Opened</label>
                                <input type="date" class="form-control" 
                                       name="dateopened" required autofocus
                                       value="{{ $pj->dateopened }}">
                            </div>
                            <div class="form-group">
                                <label>Date Expired</label>
                                <input type="date" class="form-control" 
                                       name="dateexpired" required autofocus
                                       value="{{ $pj->dateexpired }}">
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
