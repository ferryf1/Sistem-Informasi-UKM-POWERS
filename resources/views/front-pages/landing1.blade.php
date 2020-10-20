@extends('layouts.main-front')

@section('tittle', 'Home')

@section('container')



<link rel="stylesheet" href="{{asset('front/css/landing-style.css')}}">

<div class="site-blocks-cover overlay headerbg" data-aos="fade" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 mt-lg-5 text-center">
                <h1 class="text-uppercase mb-5" data-aos="fade-up">Welcome To Powers Glory 2020</h1>
            </div>
        </div>
    </div>

    <a href="#about-section" class="mouse smoothscroll">
        <span class="mouse-icon">
            <span class="mouse-wheel"></span>
        </span>
    </a>
</div>


<div class="site-section cta-big-image" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                <div class="mb-4">
                    <h3 class="h3 mb-4 text-black">For the next great business</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo tempora cumque eligendi in
                        nostrum labore omnis quaerat.</p>
                </div>
                <div class="mb-4">
                    <ul class="list-unstyled ul-check success">
                        <li>Officia quaerat eaque neque</li>
                        <li>Possimus aut consequuntur incidunt</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipisicing elit</li>
                    </ul>
                </div>
                <p><a href="#contact-section" class="smoothscroll btn btn-danger">Get In Touch</a></p>
            </div>
            <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                <figure class="circle-bg">
                    <img src="{{asset('gambar/Bersama.JPG')}}" alt="Image" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
</div>


<section class="site-section testimonial-wrap" id="testimonials-section" data-aos="fade">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Testimoni</h2>
            </div>
        </div>
    </div>
    <div class="slide-one-item home-slider owl-carousel">
        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit
                        aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt
                        consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                </blockquote>

                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="images/person_3.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                    <p>John Smith</p>
                </figure>
            </div>
        </div>
        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit
                        aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt
                        consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="images/person_2.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                    <p>Christine Aguilar</p>
                </figure>

            </div>
        </div>

        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit
                        aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt
                        consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                    <p>Robert Spears</p>
                </figure>


            </div>
        </div>

        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit
                        aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt
                        consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                    <p>Bruce Rogers</p>
                </figure>

            </div>
        </div>

    </div>
</section>


<section class="site-section" id="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Our Articles</h2>
            </div>
        </div>

        <div class="row" style="margin-bottom: 30px">

        </div>
        <p class="text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="" class="btn btn-danger">Selengkapnya</a>
        </p>
    </div>
</section>




<section class="site-section bg-light" id="contact-section" data-aos="fade">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Contact Us</h2>
            </div>
        </div>
        <div class="row mb-5">



            <div class="col-md-4 text-center">
                <p class="mb-4">
                    <span class="icon-room d-block h4 text-danger"></span>
                    <span>Politeknik Negeri Pontianak</span>
                </p>
            </div>
            <div class="col-md-4 text-center">
                <p class="mb-4">
                    <span class="icon-phone d-block h4 text-danger"></span>
                    <span>089602145265</span>
                </p>
            </div>
            <div class="col-md-4 text-center">
                <p class="mb-0">
                    <span class="icon-mail_outline d-block h4 text-danger"></span>
                    <span>ask@powers.com</span>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection