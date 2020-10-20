@extends('layouts.main')

@section('tittle', 'Edit Leader')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Leader</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Leader Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('abusleader.update',$abusleader->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Leader's Name</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $abusleader->nama }}" placeholder="Enter the Leader's Name" />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Leader's Description</label>
                                    <input type="text" class="form-control" name="deskripsi" id="nama"
                                        value="{{ $abusleader->deskripsi }}" placeholder="Enter the leader's description" />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Leader's Instagram</label>
                                    <input type="text" class="form-control" name="instagram" id="nama"
                                        value="{{ $abusleader->instagram }}" placeholder="Enter the Leader's Instagram" />
                                </div>
                               
                                <div class="form-group">
                                    <label>File Document</label>
                                    <input type="file" name="filename" class="form-control" />
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Input Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content -->

@endsection