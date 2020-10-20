@extends('layouts.main')

@section('tittle', 'Edit Post')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
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
                            <h3 class="card-title">Gallery</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('gallery.update',$gallery->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Post Title</label>
                                    <input type="text" class="form-control" name="judul" id="nama"
                                        placeholder="Enter Post Title" value="{{ $gallery->judul }}" />
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Gallery Description</label>
                                    <textarea class="form-control" id="summary-ckeditor"
                                        name="deskripsi">{{ $gallery->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>File Document</label>
                                    <input type="file" name="filename" value="{{ $gallery->filename }}"
                                        class="form-control" />
                                    <img src="{{URL::to('/') }}/uploads/gallery/{{$gallery->filename}}"
                                        class="img-thumbnail" width="100" />
                                    <input type="hidden" name="hidden_image" value="{{$gallery->filename}}">
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
    <!-- /.content -->
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