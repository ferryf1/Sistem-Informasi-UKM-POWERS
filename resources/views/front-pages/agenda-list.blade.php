@extends('layouts.main-front')

@section('tittle', 'Agendas List')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/agenda-list.css')}}">

<div class="headinglist">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-light">Our Agendas</h2>
            <h5 class="section-sub-title text-light text-dark-new">Explore Our Agenda That We Will Held Soon!</h5>

            <div class="form-group mt-2 searchthings has-search">
                <form action="searchagendafront" method="GET">
                    <i class="fas fa-search form-control-feedback"></i>
                    <input type="search" name="search" class="form-control" placeholder="Search Agenda..." aria-label=""
                        aria-describedby="basic-addon1">
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container mt-5 sm">
    <div class="row">
        @foreach( $data_agenda as $data_agenda)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow  justify-content-center kertas" style="width: 20rem;">
                <div class="inner">
                    <img src="{{ URL::to('/') }}/uploads/agendas/{{ $data_agenda->filename }}" class="card-img-top"
                        alt="Undetected">
                </div>
                <div class="card-body text-center">
                    <h5 class="">{{ $data_agenda->judul }}</h5>
                    <div class="ktgr text-muted">
                        <p class="wrote">Category : {{ $data_agenda->kategori }}</p>
                    </div>
                   
                    <div class="ktgr text-muted">
                        
                        <p>Published on : {{$data_agenda->created_at->diffForHumans()}} |
                            {{ $data_agenda->created_at->format('d F Y') }}</p>
                    </div>
                    <div class="">
                        <a href="{{ route('agenda-detail', $data_agenda->id)}}"
                            class="tombol btn btn-sm btn-dark">Read More...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>








</div>



@endsection