@extends('layouts.main-front')

@section('tittle', 'Portfolio List')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/news-list.css')}}">
<div class="container sm">
    <div class="row my-5 newslist sm">
        <div class="col-lg-1 col-sm-2  megaphone">
            <img src="{{asset('gambar/portfolio1.png')}}" alt="Gambar" class="img-fluid" />
        </div>
        <div class="col-lg-11 col-sm-10  latest">
            <h1 class="">Portfolios</h1>
        </div>
    </div>
    @foreach( $data_portfolio as $data_portfolio)
    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/portfolio.png')}}" alt="Gambar" class="img-fluid buku-img" />
            </div>
            <div class="col-md-9 tubuh">
                <h4 class="card-title">{{ $data_portfolio->judul }}</h4>
                <div class="card-text">
                    <h5 class="text-secondary font-italic">Published on : {{$data_portfolio->created_at->diffForHumans()}} |
                        {{ $data_portfolio->created_at->format('d F Y') }}</h5>
                    <p>{!! strip_tags(substr($data_portfolio->deskripsi,0, 130,)) !!}</p>
                    <a href="{{ route('portfolio-detail', $data_portfolio->id)}}" class="tombol btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>



@endsection