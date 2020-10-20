@extends('layouts.main')

@section('tittle', 'Material Detail')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Material Detail</h1>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="row p-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-3">
                        Material Data
                    </div>

                    <div class="card-body">
                        <p class="font-weight-bold">Material Title :</p>
                        <p>{{ $data_material->judul }}</p>
                        <p class="font-weight-bold">Category :</p>
                        <p>{{ $data_material->category->name }}</p>
                        <p class="font-weight-bold">Material Description :</p>
                        <p>{!! $data_material->deskripsi !!}</p>
                        <p class="font-weight-bold">Document File : </p>
                        <a href="{{ route('material.DownloadFile', $data_material->id) }}">
                            <i class="fa fa-file mr-2"></i>
                            Download file</a>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('material.edit',$data_material->id)}}">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                Edit data
                            </button>
                        </a>
                    </div>
                </div>
            </div>


            @endsection