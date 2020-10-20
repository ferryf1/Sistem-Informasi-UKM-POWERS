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
        <section>
            <div class="card-columns">
            <div class="card cardku">
            <div class="head text-center">
            <img src="https://news.cgtn.com/news/77416a4e3145544d326b544d354d444d3355444f31457a6333566d54/img/37d598e5a04344da81c76621ba273915/37d598e5a04344da81c76621ba273915.jpg" class="card-img-top img-lead" alt="...">
            </div> 
            <div class="card-body">
            
                <h5 class="card-title">Card title that wraps to a new line</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            </div>
        </section>

    </div>
</div>


@endsection