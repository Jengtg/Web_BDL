@extends('layouts.master')

@section('web-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Job Posting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post Job</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="card-header">
                    <a href="{{ route('pj-create') }}" role="button" class="btn btn-success">Tambah Job</a>
                </div>
                <div class="card-body">
                    <table id="table-kk" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Job</th>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Requirements</th>
                                <th>Salary</th>
                                <th>Date Opened</th>
                                <th>Date Expired</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pjs as $pj)
                                <tr>
                                    <td>{{ $pj->idJob }}</td>
                                    <td>{{ $pj->companyName }}</td>
                                    <td>{{ $pj->jobtitle }}</td>
                                    <td>{{ $pj->requirements }}</td>
                                    <td>{{ $pj->salary }}</td>
                                    <td>{{ $pj->dateopened }}</td>
                                    <td>{{ $pj->dateexpired }}</td>
                                    <td>{{ $pj->status }}</td>
                                    <td>
                                        <a href="{{ route('pj-edit', $pj->id) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('pj-delete', $pj->id) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
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
@endsection