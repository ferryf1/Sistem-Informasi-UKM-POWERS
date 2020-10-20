@extends('layouts.main-front')

@section('tittle', 'Register')

@section('container')
<link rel="stylesheet" href="{{asset('front/css/register-global.css')}}">

<div class="registermembers color-bwa">
    <div class="container">
        <form action="{{ route('newranger.store') }}" method="post" class="col-sm-12" enctype="multipart/form-data">
            @csrf
            <h2 class="section-title mb-3 text-light">New Rangers</h2>
            <h5 class="section-sub-title text-light">Let's Join Us To Become Our New Rangers</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif -->
            <div class="form-group mt-4">
                <label for="Namalengkap" class="text-light">Full Name</label>
                <input type="text" class="form-control" name="namalengkap" id="Namalengkap"
                    placeholder="Enter Your Full Name" />
            </div>
            <div class="form-group mt-4">
                <label for="Nim" class="text-light">NIM</label>
                <input type="number" class="form-control" name="nim" id="Nim" placeholder="Enter Your NIM" />
            </div>
            <div class="form-group mt-4">
                <label for="" class="text-light">Majors</label>
                <select class="form-control custom-select" name="jurusan" id="main_menu">
                    <option selected disabled=>--Select Major--</option>
                    <option value="AK">Akuntansi</option>
                    <option value="AB">Administrasi Bisnis</option>
                    <option value="IKP">Ilmu Kelautan dan Perikanan</option>
                    <option value="TA">Teknik Arsitektur</option>
                    <option value="TE">Teknik Elektro</option>
                    <option value="TM">Teknik Mesin</option>
                    <option value="TP">Teknik Pertanian</option>
                    <option value="TS">Teknik Sipil dan Perencanaan</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <label for="" class="text-light">Study Program</label>
                <select class="form-control custom-select" name="prodi" id="sub_menu">
                    
                </select>
            </div>
            <div class="form-group mt-4">
                <label for="email" class="text-light">Your Email</label>
                <input type="email" class="form-control" name="email" id="email"
                    placeholder="Enter Your Email" />
            </div>
            <div class="form-group mt-4">
                <label for="nohandphone" class="text-light">Your Phone Number (WhatsApp)</label>
                <input type="number" class="form-control" name="nohandphone" id="nohandphone"
                    placeholder="Enter Your Phone Number" />
            </div>
            <div class="form-group mt-4">
                <label for="" class="text-light">Semester</label>
                <select class="form-control" name="semester">
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>
            <div class="form-group mt-4">
                <label for="" class="text-light">Tell Us Your Reason To Join POWERS</label>
                <textarea class="form-control" name="alasan" id="" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary w-20 mt-1 mb-5 bg-warning text-dark">Register</button>
        </form>
    </div>
</div>

@include('sweetalert::alert')

<script src=" {{asset('front/js/selectmajor.js')}}"></script>

<div class="gsrbwh">
</div>




@endsection