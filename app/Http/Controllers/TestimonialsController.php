<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_testimonials = Testimonial::all();
        return view('testimonials.index', compact('data_testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('testimonials.create');
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
            'nama' => 'required',
            'jabatan' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($data_testimonials   =   $request->file('filename')) {

            $name = rand() . '.' .$data_testimonials->getClientOriginalName();
            $data_testimonials->move(public_path('uploads/testimonials'), $name);
            $form_data = array(
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );

        Testimonial::create($form_data);
        return redirect()->route('testimonials.index')->with('toast_success','Testimonial has been posted');
        }
    }

    public function DownloadFile($id)
    {
        $file = Testimonial::findOrFail($id);
        return response()->download(public_path('uploads/testimonials/'.$file->filename));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
        return view('testimonials.edit', compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        $name = $request->filename;
        File::delete(public_path('uploads/testimonials/'.$name));
        $name = $request->filename;
        $data_testimonials = $request->file('filename');
        if($data_testimonials != ''){
        $validasi = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $name = rand() . '.' .$data_testimonials->getClientOriginalName();
        $data_testimonials->move(public_path('uploads/testimonials'), $name);
        }
        else{
            $validasi = $request->validate([
                'nama' => 'required',
                'jabatan' => 'required',
                'deskripsi'=> 'required',
                'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }
        $form_data = array(
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'deskripsi'=> $request->deskripsi,
            'filename' => $name,
        );
        Testimonial::findOrFail($testimonial->id)->update($form_data);
        return redirect()->route('testimonials.index')->with('toast_success','Testimonial has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        $name = $testimonial->filename;
        File::delete(public_path('uploads/testimonials/'.$name));
        $testimonial = Testimonial::findorFail($testimonial->id);
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('toast_success','Testimonial has been deleted');
    }
}
