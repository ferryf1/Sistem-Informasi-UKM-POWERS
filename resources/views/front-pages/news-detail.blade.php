@extends('layouts.main-front')

@section('tittle')
{{ $data_pengumuman->judul }}
@endsection

@section('container')
<link rel="stylesheet" href="{{asset('front/css/news-detail.css')}}">
<div class="container sm">
    <div class="row my-5 newslist">
        <div class="col-lg-1 col-sm-2  megaphone">
            <img src="{{asset('gambar/megaphone.png')}}" alt="Gambar" class="img-fluid" />
        </div>
        <div class="col-lg-11 col-sm-10  latest">
            <h1 class="">{{ $data_pengumuman->judul }}</h1>
            <div class="col-lg-1 col-sm-2"></div>
            <div class="col-md-11 col-sm-10 font-italic">
                <h6>{{$data_pengumuman->created_at->diffForHumans()}} |
                    {{ $data_pengumuman->created_at->format('d F Y') }}
                </h6>
            </div>
        </div>
    </div>


    <div class="inf">
        <div class="col-lg-12 mt-10 text-justify">
            <p>{!! $data_pengumuman->deskripsi !!}</p>
        </div>
    </div>

    <div class="col-md-12 file">
        @if($data_pengumuman->fileattach)
        <p class="font-weight-bold">Document File : </p>
        <div class="filea">
            <a href="{{ route('announcement.DownloadFile', $data_pengumuman->id) }}">
                <i class="fa fa-file mr-2"></i>
                Download file</a>
        </div>
        @else

        @endif
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>



</div>



@endsection