@extends('layouts.main-front')

@section('tittle', 'About Us')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/about-us.css')}}">

<div class="container">
    <div class="row information">

        <div class="thumb-head my-5">
            <img src="{{asset('gambar/Bersama.jpg')}}" alt="Gambar" class="img-fluid rounded ukuran" />
        </div>
        <div class="col-lg-12 mt-10 text-justify">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.p>
        </div>

        <!-- OUR LEADER -->
        <section class="leader">
            <div class="container my-3 py-5 text-center">
                <div class="row mb-5">
                    <div class="col">
                        <h1>Our Leader</h1>
                        <p class="mt-3 tulis"> This is our leader for the past 4 years.</p>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body carda">
                                <div class="innera">
                                    <img src="{{asset('gambar/Jaki.jpg')}}" alt=""
                                        class="img-fluid rounded-circle w-50 mb-3 ">
                                </div>
                                <h3>Zaki Rasyid</h3>
                                <h5>Powers Leader 2019</h5>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <i class="fa fa-instagram"></i>
                                        <p>@zakiamrsyd</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="inner">
                                    <img src="{{asset('gambar/Jaki.jpg')}}" alt=""
                                        class="img-fluid rounded-circle w-50 mb-3">
                                </div>
                                <h3>Zaki Rasyid</h3>
                                <h5>Powers Leader 2019</h5>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <i class="fa fa-instagram"></i>
                                        <p>@zakiamrsyd</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="inner">
                                    <img src="{{asset('gambar/Jaki.jpg')}}" alt=""
                                        class="img-fluid rounded-circle w-50 mb-3">
                                </div>
                                <h3>Zaki Rasyid</h3>
                                <h5>Powers Leader 2019</h5>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <i class="fa fa-instagram"></i>
                                        <p>@zakiamrsyd</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="inner">
                                    <img src="{{asset('gambar/Jaki.jpg')}}" alt=""
                                        class="img-fluid rounded-circle w-50 mb-3">
                                </div>
                                <h3>Zaki Rasyid</h3>
                                <h5>Powers Leader 2019</h5>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <i class="fa fa-instagram"></i>
                                        <p>@zakiamrsyd</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </div>
</div>


@endsection