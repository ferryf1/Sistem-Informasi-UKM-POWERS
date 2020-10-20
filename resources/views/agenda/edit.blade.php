@extends('layouts.main')

@section('tittle', 'Edit Agenda')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Agenda</h1>
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
                            <h3 class="card-title">Agenda</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('agenda.update',$agenda->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Agenda Title</label>
                                    <input type="text" class="form-control" name="judul" id="nama"
                                        placeholder="Enter Agenda Title" value="{{ $agenda->judul }}" />
                                </div>
                                <div class="form-group">
                                    <label>Category Agenda</label>
                                    <select class="form-control" name="kategori">
                                        <option value="Casual" {{ old('kategori') == "Casual" ? 'selected' : '' }}>
                                            Casual</option>
                                        <option value="Competition"
                                            {{ old('kategori') == "Competition" ? 'selected' : '' }}>Competition
                                        </option>
                                        <option value="Formal" {{ old('kategori') == "Formal" ? 'selected' : '' }}>
                                            Formal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Agenda Description</label>
                                    <textarea class="form-control" id="summary-ckeditor"
                                        name="deskripsi">{{ $agenda->deskripsi }}</textarea>
                                </div>
                            <div class="form-group">
                                <label>File Document</label>
                                <input type="file" name="filename" value="{{ $agenda->filename }}" class="form-control" />
                                <img src="{{URL::to('/') }}/uploads/agendas/{{$agenda->filename}}"
                                        class="img-thumbnail" width="100" />
                                    <input type="hidden" name="hidden_image" value="{{$agenda->filename}}">
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