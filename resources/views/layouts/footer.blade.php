@section('footer')
<link rel="stylesheet" href="{{asset('front/css/footer.css')}}">
<footer class="ftr">
    <div class="footer-bg">
        <div class="container">
            <div class="footer-head">
                <img src="{{asset('gambar/lg-pwr.png')}}" alt="">
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="taca mb-2">
                        <h3>Stay in Touch</h3>
                    </div>
                    <div class="row icon">
                        <div class="icon1">
                            <img src="{{asset('gambar/icon_ig.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                        <div class="icon2">
                            <img src="{{asset('gambar/icon_youtube.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mr-5">
                    <div class="taca mb-2">
                        <h3>Address</h3>
                    </div>
                    <div class="row icon">
                        <div class="icon3">
                            <img src="{{asset('gambar/icon_loc.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                        <div class="desk">
                            <h5>Jl. Jend. A. Yani Pontianak</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="taca mb-2">
                        <h3>Contact</h3>
                    </div>
                    <div class="row icon">
                        <div class="icon4">
                            <img src="{{asset('gambar/icon_phone.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                        <div class="desk">
                            <h5>0896-5688-6853</h5>
                        </div>
                    </div>

                    <div class="row icon">
                        <div class="icon5">
                            <img src="{{asset('gambar/icon_pesan.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                        <div class="desk">
                            <h5>powerspolnep@gmail.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12 bwh">
                    <div class="desk gsbwh">
                        <h5>Develop By</h5>
                        <div class="">
                            <img src="{{asset('gambar/logopr.png')}}" class="img-fluid" alt="Undetected">
                        </div>
                        <h5 class="bbw">In Powers Dev Team</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


@endsection