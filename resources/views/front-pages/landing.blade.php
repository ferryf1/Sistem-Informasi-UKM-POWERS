@extends('layouts.main-front')

@section('tittle', 'Home')

@section('container')

<link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('front/css/owl.theme.default.css')}}">
<link rel="stylesheet" href="{{asset('front/css/landing-style.css')}}">
<link rel="stylesheet" href="{{asset('front/css/baguettebox.css')}}">

<div class="site-blocks-cover overlay headerbg" data-aos="fade" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 mt-lg-5 text-center">
                <h1 class="text-uppercase mb-5" data-aos="fade-up">Welcome To Powers Glory 2020</h1>
            </div>
        </div>
    </div>
</div>

<div class="container sm">
    <!-- ABOUT US -->
    <div class="row about">
        <div class="col-lg-6 tulisan">
            <h2>About Us</h2>
            <p>{!! strip_tags(substr($data_abusdesc[0]->deskripsi,0, 1500,)) !!}</p>

            <div class="tbla">
                <a href="{{ route('about-us') }}" class="btn btn-warning">Read More</a>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5 about-img">
            <img src="{{asset('gambar/bersama-1.png')}}" alt="Gambar" class="img-fluid rounded">
        </div>
    </div>

    <!-- OUR AGENDA -->
    <div class="why-join">
        <div class="join col-12 text-center">
            <h2>Our Agenda</h2>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row agd">
        @foreach( $data_agenda as $data_agenda)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="cardd shadow  justify-content-center kertas" style="width: 20rem;">
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
</div>



<!-- WHY JOIN POWERS -->
<div class="grey">
    <div class="container sm">
        <div class="why-join p-5">
            <div class="join col-12 text-center">
                <h2>Why Join Powers ?</h2>
            </div>

            <div class="row join-powers text-center">
                <div class="col-lg-3 col-md-6">
                    <img src="{{asset('gambar/why1.png')}}" alt="">
                    <p>Get More Knowledge</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{asset('gambar/why2.png')}}" alt="">
                    <p>Improve Yourself With Powers</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{asset('gambar/why3.png')}}" alt="">
                    <p>Expand Your Career Opportunity</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{asset('gambar/why4.png')}}" alt="">
                    <p>Learn English With Having Fun</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- TESTIMONI -->
<div class="container sm">
    <div class="why-join">
        <div class="join col-12 text-center">
            <h2>What Are They Saying ?</h2>
        </div>
    </div>

    <div class="testimonial-carousel owl-carousel owl-theme">
        @foreach( $data_testimonials as $data_testimonial)
        <div class="card card-t shadow testimoni">
            <div class="row">
                <div class="col-lg-4 col-md-12 gambar-moni">
                    <img src="{{ URL::to('/') }}/uploads/testimonials/{{ $data_testimonial->filename }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8 col-md-12 tulisan-moni">
                    <p>{!! $data_testimonial->deskripsi !!}</p>
                    <h4>{{ $data_testimonial->nama }}</h4>
                    <h5 class="text-muted">{{ $data_testimonial->jabatan }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- GALLERY -->
    <div class="why-join">
        <div class="join col-12 text-center">
            <h2>Gallery</h2>
        </div>
    </div>

    <section class="gallery-block cards-gallery">
        <!-- First Row -->
        <div class="row gsr">
            @foreach( $data_gallery as $data_gallery)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 transform-on-hover shadow">
                    <div class="innera">
                        <a class="lightbox gambar-kartu"
                            href="{{ URL::to('/') }}/uploads/gallery/{{ $data_gallery->filename }}"><img
                                src="{{ URL::to('/') }}/uploads/gallery/{{ $data_gallery->filename }}"
                                class="card-img-top img-fluid rounded"></a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </section>





    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>



<script src=" {{asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src=" {{asset('front/js/jquery.min.js')}}"></script>
<script src=" {{asset('front/js/owl.carousel.js')}}"></script>
<script>
$('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 20,
    dots: true,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})
</script>

<script src=" {{asset('front/js/baguettebox.js')}}"></script>
<script>
baguetteBox.run('.cards-gallery', {
    animation: 'slideIn'
});
</script>

@endsection