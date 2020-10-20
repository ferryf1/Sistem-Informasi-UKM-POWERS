@extends('layouts.main-front')

@section('tittle', 'About Us')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/about-us.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row information">

        <div class="thumb-head my-5">
            <img src="{{asset('gambar/cover.jpg')}}" alt="Gambar" class="img-fluid rounded ukuran" />
        </div>
        <div class="col-lg-12 mt-10 text-justify">
            <p>{!! $data_abusdesc[0]->deskripsi !!}</p>
        </div>
    </div>


    <!-- OUR LEADER -->
    <section class="leader">
        <div class="container my-3 py-5 text-center">
            <div class="row mb-5">
                <div class="col-12">
                    <h1>Our Leader</h1>
                    <p class="mt-3 tulis"> This is our leader for the past 4 years.</p>
                </div>

            </div>
            <div class="row">
                @foreach( $data_abusleader as $data_abusleader)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pimg mb-3">
                                <img src="{{ URL::to('/') }}/uploads/leader/{{ $data_abusleader->filename }}" alt=""
                                    class="img-fluid">
                            </div>
                            <h3>{{ $data_abusleader->nama }}</h3>
                            <h5>{{ $data_abusleader->deskripsi }}</h5>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="p-4">
                                    <p>
                                    <i class="fa fa-instagram ig"></i>
                                    {{ $data_abusleader->instagram }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>


</div>


@endsection