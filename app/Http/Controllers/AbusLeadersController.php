<?php

namespace App\Http\Controllers;

use App\AbusLeader;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AbusLeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_abusleader = AbusLeader::all();
        return view('abus-leader.index', compact('data_abusleader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('abus-leader.create');
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
            'instagram' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($data_abusleader   =   $request->file('filename')) {

            $name = rand() . '.' .$data_abusleader->getClientOriginalName();
            $data_abusleader->move(public_path('uploads/leader'), $name);
            $form_data = array(
                'nama' => $request->nama,
                'instagram' => $request->instagram,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );

        AbusLeader::create($form_data);
        return redirect()->route('abusleader.index')->with('toast_success','Leader has been posted');
        }
    }

    public function DownloadFile($id)
    {
        $file = AbusLeader::findOrFail($id);
        return response()->download(public_path('uploads/leader/'.$file->filename));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbusLeader  $abusLeader
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbusLeader  $abusLeader
     * @return \Illuminate\Http\Response
     */
    public function edit(AbusLeader $abusleader)
    {
        //
        return view('abus-leader.edit', compact('abusleader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbusLeader  $abusLeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbusLeader $abusleader)
    {
        //
        $name = $request->filename;
        File::delete(public_path('uploads/leader/'.$name));
        $name = $request->filename;
        $data_abusleader = $request->file('filename');
        if($data_abusleader != ''){
        $validasi = $request->validate([
            'nama' => 'required',
            'instagram' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $name = rand() . '.' .$data_abusleader->getClientOriginalName();
        $data_abusleader->move(public_path('uploads/leader'), $name);
        }
        else{
            $validasi = $request->validate([
                'nama' => 'required',
                'instagram' => 'required',
                'deskripsi'=> 'required',
                'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }
        $form_data = array(
            'nama' => $request->nama,
            'instagram' => $request->instagram,
            'deskripsi'=> $request->deskripsi,
            'filename' => $name,
        );
        AbusLeader::findOrFail($abusleader->id)->update($form_data);
        return redirect()->route('abusleader.index')->with('toast_success','Leader has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbusLeader  $abusLeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbusLeader $abusleader)
    {
        //
        $name = $abusleader->filename;
        File::delete(public_path('uploads/leader/'.$name));
        $abusleader = AbusLeader::findorFail($abusleader->id);
        $abusleader->delete();
        return redirect()->route('abusleader.index')->with('toast_success','Leader has been deleted');
    }
}
