@extends('layouts.main-front')

@section('tittle')
{{ $data_agenda->judul }}
@endsection

@section('container')
<link rel="stylesheet" href="{{asset('front/css/dis-style.css')}}">

<div class="container">
    <div class="row">
        <div class="information">
            <h1 class="mb-4 color-dark-2 card-title article-title">{{ $data_agenda->judul }}</h1>
            <div class="row pb-2 date-head text-secondary">
                <div class="col-md-8">
                    <h6>{{$data_agenda->created_at->diffForHumans()}} | {{ $data_agenda->created_at->format('d F Y') }}
                    </h6>
                </div>
                <div class="col-md-4 ml-auto">
                    <h6>Category : {{ $data_agenda->kategori }} </h6>
                </div>
            </div>
            <div class="thumb-head">
                <img src="{{ URL::to('/') }}/uploads/agendas/{{ $data_agenda->filename }}" alt="Gambar"
                    class="img-fluid ukuran rounded" />
            </div>
        </div>
        <div class="inf">
            <div class="col-lg-12 mt-10 text-justify">
                <p>{!! $data_agenda->deskripsi !!}</p>
            </div>
        </div>

    </div>
</div>



@endsection