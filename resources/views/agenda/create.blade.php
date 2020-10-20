@extends('layouts.main')

@section('tittle', 'Create Agenda')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Agenda</h1>
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
                            <h3 class="card-title">Agenda Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Agenda Title</label>
                                    <input type="text" class="form-control" name="judul" id="nama"
                                        value="{{ old('judul') }}" placeholder="Enter the Agenda tittle" />
                                </div>
                                <div class="form-group">
                                    <label>Category Agenda</label>
                                    <select class="form-control" name="kategori">
                                        <option value="Casual" {{ old('kategori') == "Casual" ? 'selected' : '' }}>Casual</option>
                                        <option value="Competition" {{ old('kategori') == "Competition" ? 'selected' : '' }}>Competition</option>
                                        <option value="Formal" {{ old('kategori') == "Formal" ? 'selected' : '' }}>Formal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Agenda Description</label>
                                    <textarea class="form-control" id="summary-ckeditor" name="deskripsi">
                                    {{ old('deskripsi') }}
                                    </textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label>Document File</label>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>
<script>
CKEDITOR.replace('summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>

@endsection