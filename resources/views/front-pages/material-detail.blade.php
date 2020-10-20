@extends('layouts.main-front')

@section('tittle', 'Material Detail')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/news-list.css')}}">

<div class="container sm">
    <div class="row my-5 newslist sm">
        <div class="col-lg-1 col-sm-2  megaphone">
            <img src="{{asset('gambar/book.png')}}" alt="Gambar" class="img-fluid" />
        </div>
        <div class="col-lg-11 col-sm-10  latest ggr">
            <h1 class="">Study Material</h1>
        </div>
    </div>
    @foreach( $data_material as $data_material)
    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/document.png')}}" alt="Gambar" class="img-fluid bukus-img" />
            </div>
            <div class="col-md-9 tubuh">
                <h4 class="card-title">{{ $data_material->judul }}</h4>

                <div class="card-text">
                    <h5 class="text-secondary font-italic">Published on :
                        {{$data_material->created_at->diffForHumans()}} |
                        {{ $data_material->created_at->format('d F Y') }}</h5>
                    <p>{!! strip_tags(substr($data_material->deskripsi,0, 200,)) !!}</p>
                    <div class="col-md-12 filea">
                        <a href="{{ route('material.DownloadFile', $data_material->id) }}" class="font-weight-bold">
                            <i class="fa fa-file mr-2"></i>
                            Download file</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>


@endsection