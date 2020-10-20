<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\NewRanger;
use App\Agenda;
use App\Material;


class AdminController extends Controller
{
    //
    public function index()
    {
        // return view('admin/admin-home');
        $countAgenda =  Agenda::all()->count();
        $countDiscussion =  Discussion::all()->count();
        $countMaterial =  Material::all()->count();
        $countNewRanger =  NewRanger::all()->count();
        return view('admin/admin-home', compact(
            'countAgenda',
            'countDiscussion',
            'countMaterial',
            'countNewRanger'
         ));
    }
}
