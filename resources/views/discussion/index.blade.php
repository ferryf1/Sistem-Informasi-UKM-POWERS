@extends('layouts.main-front')

@section('tittle', 'Discussions List')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/dis-list.css')}}">
<div class="container sm">
    <div class="row mt-3 text-center">
        <div class="col-12">
            <h1 class="mt">Discussions List</h1>
        </div>
        <div class="col-12 margin-tombol ml-auto">
            @if(Auth::check())
            <a href="{{ route('discussion.create') }}" class="btn btn-dark my-3 tbl">Create Post</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-dark my-3 tbl">Login To Create Post</a>
            @endif
        </div>


    </div>

    @foreach( $posts as $post)
    <div class="card shadow  justify-content-center mb-5 mt-2">
        <div class="row">
            <div class="col-md-4 inner text-center">
                @if($post->filename)
                <img src="{{ URL::to('/') }}/uploads/discussion/{{ $post->filename }}" class="card-img-top"
                    alt="Undetected">
                @else
                <div class="inner-pwr">
                    <img src="{{asset('gambar/LogoPowers.png')}}" class="card-img-top" alt="Undetected">
                </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->judul }}</h5>
                    <p class="card-text">{!! strip_tags(substr($post->deskripsi,0, 200,)) !!}</p>
                    <div class="tulisan text-muted">
                        <h6>Published on : {{$post->created_at->diffForHumans()}} |
                            {{ $post->created_at->format('d F Y') }}</h6>
                        <h6 class="wrote">Wrote by : {{ $post->author->name }}</h6>
                    </div>
                    <div class="">
                        <a href="{{ route('discussion.show', $post->id)}}" class="tombol btn btn-sm btn-dark">Read
                            More...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        <div>
            {{ $posts->links() }}
        </div>
    </div>


    @include('sweetalert::alert')



</div>



@endsection