@extends('layouts.main-front')

@section('tittle')
{{ $data_portfolio->judul }}
@endsection

@section('container')
<link rel="stylesheet" href="{{asset('front/css/news-detail.css')}}">
<div class="container sm">
    <div class="row my-5 newslist">
        <div class="col-lg-1 col-sm-2  megaphone">
            <img src="{{asset('gambar/portfolio1.png')}}" alt="Gambar" class="img-fluid" />
        </div>
        <div class="col-lg-11 col-sm-10  latest">
            <h1 class="">{{ $data_portfolio->judul }}</h1>
            <div class="col-lg-1 col-sm-2"></div>
            <div class="col-md-11 col-sm-10 font-italic">
                <h6>{{$data_portfolio->created_at->diffForHumans()}} |
                    {{ $data_portfolio->created_at->format('d F Y') }}
                </h6>
            </div>
        </div>
    </div>


    <div class="thumb-head mt-5">
                @if($data_portfolio->fileattach)
                <div class="gbbr text-center">
                    <img src="{{ URL::to('/') }}/uploads/portfolios/{{ $data_portfolio->fileattach }}" alt="Gambar"
                        class="img-fluid ukuran" />
                </div>
                @else
                
                @endif
            </div>
    <div class="inf">
        <div class="col-lg-12 mt-10 text-justify">
            <p>{!! $data_portfolio->deskripsi !!}</p>
        </div>
    </div>



</div>



@endsection