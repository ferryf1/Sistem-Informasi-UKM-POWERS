<?php

namespace App\Http\Controllers;

use App\Abusdesc;
use Illuminate\Http\Request;

class AbusdescsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_abusdescs = Abusdesc::all();
        return view('abus-desc.index', compact('data_abusdescs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('abus-desc.create');
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
            'deskripsi'=> 'required',
        ]);
            $form_data = array(
                'deskripsi'=> $request->deskripsi,
            );

        Abusdesc::create($form_data);
        return redirect()->route('abusdesc.index')->with('toast_success','Description has been created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abusdesc  $abusdesc
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abusdesc  $abusdesc
     * @return \Illuminate\Http\Response
     */
    public function edit(Abusdesc $abusdesc)
    {
        //
        return view('abus-desc.edit', compact('abusdesc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abusdesc  $abusdesc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abusdesc $abusdesc)
    {
        //
        $validasi = $request->validate([
            'deskripsi'=> 'required',
        ]);
        $form_data = array(
            'deskripsi'=> $request->deskripsi,
        );
        Abusdesc::findOrFail($abusdesc->id)->update($form_data);
        return redirect()->route('abusdesc.index')->with('toast_success','Description has been updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abusdesc  $abusdesc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abusdesc $abusdesc)
    {
        //
        
        $abusdesc = Abusdesc::findorFail($abusdesc->id);
        $abusdesc->delete();
        return redirect()->route('abusdesc.index')->with('toast_success','Description has been deleted');
    }
}
