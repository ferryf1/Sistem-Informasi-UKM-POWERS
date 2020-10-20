@extends('layouts.main-front')

@section('tittle', 'Gallery')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/baguettebox.css')}}">
<link rel="stylesheet" href="{{asset('front/css/gallery.css')}}">

<section class="gallery-block cards-gallery">
    <div class="container sm">
        <div class="heading">
            <h2>Gallery</h2>
        </div>
        <!-- First Row -->
        <div class="row">
            @foreach( $data_gallerys as $data_gallery)
            <div class="col-md-6 col-lg-4 col-sm-12">
                <div class="card border-0 transform-on-hover shadow">
                    <div class="inner">
                        <a class="lightbox gambar-kartu"
                            href="{{ URL::to('/') }}/uploads/gallery/{{ $data_gallery->filename }}"><img
                                src="{{ URL::to('/') }}/uploads/gallery/{{ $data_gallery->filename }}"
                                class="card-img-top img-fluid rounded"></a>
                    </div>
                    <div class="card-body">
                        <h6 class="text-uppercase">{{ $data_gallery->judul }}</h6>
                        <p class="text-muted card-text">{!! $data_gallery->deskripsi !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $data_gallerys->links() }}
        </div>
    </div>
</section>




<script src=" {{asset('front/js/baguettebox.js')}}"></script>
<script>
baguetteBox.run('.cards-gallery', {
    animation: 'slideIn'
});
</script>

@endsection