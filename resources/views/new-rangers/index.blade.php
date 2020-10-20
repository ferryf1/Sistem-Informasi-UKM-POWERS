@extends('layouts.main')

@section('tittle', 'New Rangers Dashboard')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New Rangers</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm">
                                <a href="export-new-rangers">
                                    <button type="button" class="btn btn-success btn-sm">Export Excel</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 float-right">
                        <form action="searchnewrangers" method="GET" class="form-inline ml-3"
                            style="position:relative;">
                            <div class="input-group input-group-sm" style="
                        float: right !important;
                        position: absolute;
                        right: 0;
                        top: 0;">
                                <input class="form-control form-control-navbar" name="search" type="search"
                                    placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar bg-secondary text-white" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Rangers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('deleteallNgr') }}" method="post">
                                @csrf
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input position-static" type="checkbox"
                                                        id="checkall">
                                                </div>
                                            </td>

                                            </td>
                                            <th>No</th>
                                            <th>Full Name</th>
                                            <th>NIM</th>
                                            <th>Study Program</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>

                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_newranger as $data_newranger)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input position-static checkboxes"
                                                        type="checkbox" name="delid[]" id="checkboxes"
                                                        value="{{ $data_newranger->id }}">
                                                </div>
                                                
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data_newranger->namalengkap }}</td>
                                            <td>{{ $data_newranger->nim }}</td>

                                            <td>{{ $data_newranger->prodi }}</td>
                                            <td>{{ $data_newranger->email }}</td>
                                            <td>{{ $data_newranger->nohandphone }}</td>
                                            <!-- <td style="width:160px">
                                    <container>
                                        <div class="row">
                                            <div class="col-sm">
                                                <form action="{{ route('newranger.destroy', $data_newranger->id)}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </container>
                                </td> -->
                                        </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                                @method('POST')
                                <button type="submit" class="btn btn-danger btn-sm delete-confirm-all delete-selected">
                                    Delete Selected Data
                                </button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@include('sweetalert::alert')
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->


@endsection