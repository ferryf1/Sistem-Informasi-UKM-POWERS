@extends('layouts.main')

@section('tittle', 'Agendas Dashboard')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Agendas</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{ route('agenda.create') }}">
                                    <button type="button" class="button-primary btn-sm">Add Data</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-sm float-right">
                        <form action="searchAgendas" method="GET" class="form-inline ml-3">
                            <div class="input-group input-group-sm cari">
                                <input class="form-control form-control-navbar" name="search " type="search"
                                    placeholder="Search Agenda" aria-label="Search">
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
                            <h3 class="card-title">Our Agenda</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <form action="{{ route('deleteallAgd') }}" method="post">
                                @csrf -->
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
                                            <th>Agenda Title</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_agenda as $data_agenda)
                                        <tr>
                                            <!-- <td>
                                                <div class="form-check">
                                                    <input class="form-check-input position-static checkboxes"
                                                        type="checkbox" name="delid[]" id="checkboxes"  value="{{ $data_agenda->id }}">
                                            </td> -->
                        </div>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $data_agenda->judul }}</td>
                        <td><a href="{{ route('agenda.DownloadFile', $data_agenda->id) }}"><i
                                    class="fa fa-file mr-2"></i>
                                Download file</a></td>
                        <td style="width:160px">
                            <container>
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('agenda.show', $data_agenda->id)}}">
                                            <div class="buton btn-primary rounded text-center img-fluid"
                                                style="height:31px;">
                                                <i class="fa fa-eye" style="margin-top:8px;"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="{{ route('agenda.edit', $data_agenda->id)}}">
                                            <div class="buton btn-primary rounded text-center img-fluid"
                                                style="height:31px;">
                                                <i class="fa fa-edit" style="margin-top:8px;"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('agenda.destroy', $data_agenda->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-name="{{ $data_agenda->judul }}"
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
                        <!-- @method('POST')
                        <button type="submit" class="btn btn-danger btn-sm delete-confirm-all">
                            Delete Selected Data
                        </button> -->
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