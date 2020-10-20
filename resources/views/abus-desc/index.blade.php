@extends('layouts.main')

@section('tittle', 'About Us Dashboard')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">About Us</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('abusdesc.create') }}">
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
                            <h3 class="card-title">About Us Description</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_abusdescs as $data_abusdescs)
                                    <tr>
                        </div>
                        <th>{{ $loop->iteration }}</th>
                        <td>{!! strip_tags(substr($data_abusdescs->deskripsi,0, 130,)) !!}</td>
                        <td>
                            <container>
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('abusdesc.edit', $data_abusdescs->id)}}">
                                            <div class="buton btn-primary rounded text-center img-fluid"
                                                style="height:31px;">
                                                <i class="fa fa-edit" style="margin-top:8px;"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('abusdesc.destroy', $data_abusdescs->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-name="{{ $data_abusdescs->id }}"
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