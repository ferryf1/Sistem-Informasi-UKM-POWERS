<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Abusdesc;
use App\Testimonial;
use App\Gallery;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        // return view('admin/admin-home');
        $data_agenda = Agenda::latest()->paginate(3);
        $data_abusdesc = Abusdesc::all();
        $data_gallery = Gallery::latest()->paginate(9);
        $data_testimonials = Testimonial::all();
        return view('front-pages.landing', compact(
         'data_agenda',
         'data_abusdesc',
         'data_gallery',
         'data_testimonials'
        ));
    }

}
