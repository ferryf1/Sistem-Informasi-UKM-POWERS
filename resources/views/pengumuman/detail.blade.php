@extends('layouts.main')

@section('tittle', 'Announcement Detail')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Announcement Detail</h1>
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
                        Announcement Data
                    </div>

                    <div class="card-body">
                        <p class="font-weight-bold">Announcement Title :</p>
                        <p>{{ $tampil->judul }}</p>
                        <p class="font-weight-bold">Announcement Description :</p>
                        <p>{!! $tampil->deskripsi !!}</p>
                        <p class="font-weight-bold">Document File : </p>
                        <a href="{{ route('announcement.DownloadFile', $tampil->id) }}">
                            <i class="fa fa-file mr-2"></i>
                            Download file</a>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('announcement.edit',$tampil->id)}}">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                Edit data
                            </button>
                        </a>
                    </div>
                </div>
            </div>


            @endsection