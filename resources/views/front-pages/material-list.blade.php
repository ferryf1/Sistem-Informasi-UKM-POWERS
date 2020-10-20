@extends('layouts.main-front')

@section('tittle', 'Material List')

@section('container')

<link rel="stylesheet" href="{{asset('front/css/material-list.css')}}">

<div class="container my-5">
    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/book.png')}}" alt="Gambar" class="img-fluid buku-img" />
            </div>
            <div class="col-md-6 tubuh">
                <h4 class="card-title">Basic Class</h4>
                <div class="card-text">
                    <p>A class for people who are learning the very basic of english. In this class you are going to learn a lot of basic skill of english.</p>
                    <h5 class="text-secondary">Wrote by : Education Team</h5>
                </div>
            </div>
            <div class="col-md-3 text-center tbl">
                <a href="/categories/Basic" class="tombol btn btn-dark">Start</a>
            </div>
        </div>
    </div>

    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/books.png')}}" alt="Gambar" class="img-fluid bukus-img" />
            </div>
            <div class="col-md-6 tubuh">
                <h4 class="card-title">Grammar Class</h4>
                <div class="card-text">
                    <p>A class for people who start to learn the grammar in english. You can improve your grammar in this class, it helps to explain many things through understanding and implementing the language in our daily activity.</p>
                    <h5 class="text-secondary">Wrote by : Education Team</h5>
                </div>
            </div>
            <div class="col-md-3 text-center tbl">
                <a href="/categories/Grammar" class="tombol btn btn-dark">Start</a>
            </div>
        </div>
    </div>

    <div class="card shadow  justify-content-center my-5 col-md-12 kartu">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{asset('gambar/interaction.png')}}" alt="Gambar" class="img-fluid buku-img" />
            </div>
            <div class="col-md-6 tubuh">
                <h4 class="card-title">Speaking Class</h4>
                <div class="card-text">
                    <p>In this class you will learn the basic tips of speaking english and you can quickly improve your conversation skill like a native speaker does.</p>
                    <h5 class="text-secondary">Wrote by : Education Team</h5>
                </div>
            </div>
            <div class="col-md-3 text-center tbl">
                <a href="/categories/Speaking" class="tombol btn btn-dark">Start</a>
            </div>
        </div>
    </div>




</div>




@endsection