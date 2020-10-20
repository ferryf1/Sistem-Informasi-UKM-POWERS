@extends('layouts.main-front')

@section('tittle', 'Announcements List')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/news-list.css')}}">
<div class="container sm">
    <div class="row my-5 newslist sm">
        <div class="col-lg-1 col-sm-2  megaphone">
            <img src="{{asset('gambar/megaphone.png')}}" alt="Gambar" class="img-fluid" />
        </div>
        <div class="col-lg-11 col-sm-10  latest">
            <h1 class="">Latest Announcements</h1>
        </div>
    </div>
    @foreach( $data_pengumuman as $data_pengumuman)
    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/newspaper.png')}}" alt="Gambar" class="img-fluid buku-img" />
            </div>
            <div class="col-md-9 tubuh">
                <h4 class="card-title">{{ $data_pengumuman->judul }}</h4>
                <div class="card-text">
                    <h5 class="text-secondary font-italic">Published on : {{$data_pengumuman->created_at->diffForHumans()}} |
                        {{ $data_pengumuman->created_at->format('d F Y') }}</h5>
                    <p>{!! strip_tags(substr($data_pengumuman->deskripsi,0, 130,)) !!}</p>
                    <a href="{{ route('news-detail', $data_pengumuman->id)}}" class="tombol btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>



@endsection