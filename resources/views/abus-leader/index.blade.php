@extends('layouts.main')

@section('tittle', 'About Us')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Leader</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('abusleader.create') }}">
                                    <button type="button" class="button-primary btn-sm">Add Data</button>
                                </a>
                            </div>
                        </div>
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
                            <h3 class="card-title">Leader</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_abusleader as $data_abusleader)
                                    <tr>
                        </div>
                        <td>{{ $data_abusleader->nama }}</td>
                        <td>{{ $data_abusleader->deskripsi }}</td>
                        <td><a href="{{ route('abusleader.DownloadFile', $data_abusleader->id) }}"><i
                                    class="fa fa-file mr-2"></i>
                                Download file</a></td>
                        <td style="width:160px">
                            <container>
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('abusleader.edit', $data_abusleader->id)}}">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('abusleader.destroy', $data_abusleader->id)}}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-name="{{ $data_abusleader->judul }}"
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

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('sweetalert::alert')
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