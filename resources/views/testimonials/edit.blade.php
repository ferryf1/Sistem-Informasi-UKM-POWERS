@extends('layouts.main')

@section('tittle', 'Edit Testimonial')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Testimonial</h1>
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
                            <h3 class="card-title">Testimonial Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Name</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $testimonial->nama }}" placeholder="Enter the Your Name" />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Position</label>
                                    <input type="text" class="form-control" name="jabatan" id="nama"
                                        value="{{ $testimonial->jabatan }}" placeholder="Enter the Your Position" />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Testimonial Description</label>
                                    <textarea class="form-control" name="deskripsi" id="summary-ckeditor">
                                    {{ $testimonial->deskripsi }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>File Document</label>
                                    <input type="file" name="filename" class="form-control" />
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit Data</button>
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