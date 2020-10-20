@extends('layouts.main')

@section('tittle', 'Portfolio Detail')

@section('container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Portfolio Detail</h1>
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
                        Portfolio Data
                    </div>

                    <div class="card-body">
                        <p class="font-weight-bold">Portfolio Title :</p>
                        <p>{{ $tampil->judul }}</p>
                        <p class="font-weight-bold">Portfolio Description :</p>
                        <p>{!! $tampil->deskripsi !!}</p>
                        
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('portfolio.edit',$tampil->id)}}">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                Edit data
                            </button>
                        </a>
                    </div>
                </div>
            </div>


            @endsection