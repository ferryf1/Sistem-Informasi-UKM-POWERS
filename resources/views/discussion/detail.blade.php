@extends('layouts.main-front')

@section('tittle')
{{ $post->judul }}
@endsection

@section('container')
<link rel="stylesheet" href="{{asset('front/css/dis-style.css')}}">
<div class="grey">
    <div class="container">
        <div class="row information">
            <h1 class="mb-4 color-dark-2 card-title article-title pt-5">{{ $post->judul }}</h1>
            <div class="row pb-2 date-head text-secondary">
                <div class="col-md-8">
                    <h6>{{$post->created_at->diffForHumans()}} | {{ $post->created_at->format('d F Y') }}
                    </h6>
                </div>
                <div class="col-md-4 ml-auto penulis">
                    <h6>Wrote By : {{ $post->author->name }} </h6>
                </div>
            </div>
            <div class="thumb-head mt-5">
                @if($post->filename)
                <div class="gbbr text-center">
                    <img src="{{ URL::to('/') }}/uploads/discussion/{{ $post->filename }}" alt="Gambar"
                        class="img-fluid ukuran" />
                </div>
                @else
                <div class="gbr text-center">
                    <img src="{{asset('gambar/LogoPowers.png')}}" class="card-img-top" alt="Undetected">
                </div>
                @endif
            </div>
            <div class="col-lg-12 isi mt-10 text-justify">
                <p>{!! $post->deskripsi !!}</p>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-1 col-md-2 col-sm-12 mr-3">
                        <!-- EDIT BUTTON -->
                        @hasRoleAndOwns('user', $post)

                        <a href="{{ route('discussion.edit', $post->id)}}" class="tumbul btn btn-sm btn-primary">Edit
                            Post</a>

                        @endOwns

                        @role('superadministrator')
                        <a href="{{ route('discussion.edit', $post->id)}}" class="tumbul btn btn-sm btn-primary">Edit
                            Post</a>

                        @endrole
                    </div>
                    <!-- DELETE BUTTON -->

                    <div class="col-lg-1 col-md-2 col-sm-12">
                        @hasRoleAndOwns('user', $post)
                        <form action="{{ route('discussion.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-name="{{ $post->judul }}"
                                class="tumbul btn btn-danger btn-sm delete-confirm gr">
                                Delete Post
                            </button>
                        </form>

                        @endOwns

                        @role('superadministrator')
                        <div class="col-md-2">
                            <form action="{{ route('discussion.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-name="{{ $post->judul }}"
                                    class="tumbul btn btn-danger btn-sm delete-confirm gr">
                                    Delete Post
                                </button>
                            </form>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="col-lg-12 mt-5">
        <h3>Commentar</h3>
    </div>
    <div class="col-lg-12 mt-3 kom">
        @comments(['model'=> $post])
    </div>
</div>





@endsection