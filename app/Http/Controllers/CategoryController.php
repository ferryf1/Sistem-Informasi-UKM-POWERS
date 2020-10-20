<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function show(Category $category){
        $data_material = $category->materials;
        // return view('front-pages.material-detail', compact('category'));
        return view('front-pages.material-detail', compact('data_material'));

    }
}
