@extends('layouts.main')

@section('tittle', 'Material Dashboard')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Materials</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('material.create') }}">
                                    <button type="button" class="button-primary btn-sm">Add Data</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 float-right">
                        <form action="" method="GET" class="form-inline ml-3" style="position:relative;">
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
                            <h3 class="card-title">Materials</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox"
                                                    id="checkall"></td>
                                            </div>
                                        </th> -->
                                        <th>No</th>
                                        <th>Material Title</th>
                                        <th>Category</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_material as $data_material)
                                    <tr>
                                        <!-- <td>
                                            <div class="form-check">
                                                <input class="form-check-input position-static checkboxes"
                                                    type="checkbox" name="checkboxes" id="checkboxes">
                                            </div>
                                        </td> -->
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data_material->judul }}</td>
                                        <td>{{ $data_material->category->name }}</td>
                                        <td><a href="{{ route('material.DownloadFile', $data_material->id) }}"><i
                                                    class="fa fa-file mr-2"></i>
                                                Download file</a></td>
                                        <td style="width:160px">
                                            <container>
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <a href="{{ route('material.show', $data_material->id)}}">
                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <a href="{{ route('material.edit', $data_material->id)}}">
                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <form
                                                            action="{{ route('material.destroy', $data_material->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                data-name="{{ $data_material->judul }}"
                                                                class="btn btn-danger btn-sm delete-confirm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </container>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            @include('sweetalert::alert')

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
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