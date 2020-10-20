<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_material = Material::latest()->simplePaginate(9999);
        return view('material.index',compact('data_material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('material.create',[
            'material' => new Material(),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'category'=>'required',
            'deskripsi'=> 'required',
            'filename'=>'required',
        ]);

        if($data_material   =   $request->file('filename')) {

            $name = rand() . '.' .$data_material->getClientOriginalName();
            $data_material->move(public_path('uploads/materials'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'category_id' => $request->category,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );

        Material::create($form_data);
        return redirect()->route('material.index')->with('toast_success','Material has been created');
        }
    }

    public function DownloadFile($id)
    {
        $file = Material::findOrFail($id);
        return response()->download(public_path('uploads/materials/'.$file->filename));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
        $data_material = Material::findOrFail($material->id);
        return view('material.detail', compact('data_material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
        return view('material.edit',[
            'material' =>  $material,
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
        $name = $material->filename;
        File::delete(public_path('uploads/materials/'.$name));
        $data_material = $request->file('filename');
        if($data_material != ''){
        $validasi = $request->validate([
            'judul' => 'required',
            'category'=>'required',
            'deskripsi'=> 'required',
            'filename'=>'required',
        ]);
        $name = rand() . '.' .$data_material->getClientOriginalName();
        $data_material->move(public_path('uploads/materials'), $name);
        }
        else{
            $validasi = $request->validate([
                'judul' => 'required',
                'category'=>'required',
                'deskripsi'=> 'required',
                'filename'=>'required',
            ]);
        }
        $form_data = array(
            'judul' => $request->judul,
            'category_id' => $request->category,
            'deskripsi'=> $request->deskripsi,
            'filename' => $name,
        );
        Material::findOrFail($material->id)->update($form_data);
        return redirect()->route('material.index')->with('toast_success','Material has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
        $name = $material->filename;
        File::delete(public_path('uploads/materials/'.$name));
        $material = Material::findorFail($material->id);
        $material->delete();
        return redirect()->route('material.index')->with('toast_success','Material has been deleted');
    }
}
