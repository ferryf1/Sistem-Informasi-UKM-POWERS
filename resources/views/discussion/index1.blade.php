@extends('layouts.main-front')

@section('tittle', 'Discussions List')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/dis-list.css')}}">
<div class="container">
    <div class="row mt-3 text-center">
        <div class="col-12">
            <h1 class="mt">Discussions List</h1>
        </div>
        <div class="col-12 margin-tombol ml-auto">
            @if(Auth::check())
            <a href="{{ route('discussion.create') }}" class="btn btn-primary my-3 tbl">Create Post</a>
            @else  
            <a href="{{ route('login') }}" class="btn btn-primary my-3 tbl">Login To Create Post</a>
            @endif
        </div>


    </div>

    <div class="row">
        @foreach( $posts as $post)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow  justify-content-center kertas" style="width: 20rem;">
                <div class="inner">
                @if($post->filename)
                    <img src="{{ URL::to('/') }}/uploads/discussion/{{ $post->filename }}" class="card-img-top" alt="Undetected">
                @else
                <img src="{{asset('gambar/LogoPowers.png')}}" class="card-img-top" alt="Undetected">
                @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->judul }}</h5>
                    <p class="card-text">{!! strip_tags(substr($post->deskripsi,0, 130,)) !!}</p>
                    <div class="tulisan text-muted">
                        <p>Published on : {{$post->created_at->diffForHumans()}} | {{ $post->created_at->format('d F Y') }}</p>
                        <p class="wrote">Wrote by : {{ $post->author->name }}</p>
                    </div>
                    <div class="">
                        <a href="{{ route('discussion.show', $post->id)}}" class="tombol btn btn-sm btn-primary">Read More...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>




    



</div>



@endsection