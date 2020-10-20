<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class GallerysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_gallery = Gallery::latest()->simplePaginate(10000);
        return view('gallery.index', compact('data_gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gallery.create');
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
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($data_gallery   =   $request->file('filename')) {

            $name = rand() . '.' .$data_gallery->getClientOriginalName();
            $data_gallery->move(public_path('uploads/gallery'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );

        Gallery::create($form_data);
        return redirect()->route('gallery.index')->with('toast_success','Photo has been posted');
        }
    }

    public function DownloadFile($id)
    {
        $file = Gallery::findOrFail($id);
        return response()->download(public_path('uploads/gallery/'.$file->filename));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
        $data_gallery = Gallery::findOrFail($id);
        return view('gallery.detail', compact('data_gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        $name = $request->hidden_image;
        File::delete(public_path('uploads/gallery/'.$name));
        $name = $request->filename;
        $data_gallery = $request->file('filename');
        if($data_gallery != ''){
        $validasi = $request->validate([
            'judul' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $name = rand() . '.' .$data_gallery->getClientOriginalName();
        $data_gallery->move(public_path('uploads/gallery'), $name);
        }
        else{
            $validasi = $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
                'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }
        $form_data = array(
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'filename' => $name,
        );
        Gallery::findOrFail($gallery->id)->update($form_data);
        return redirect()->route('gallery.index')->with('toast_success','Photo has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        $name = $gallery->filename;
        File::delete(public_path('uploads/gallery/'.$name));
        $gallery = Gallery::findorFail($gallery->id);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('toast_success','Photo has been deleted');
    }
}
