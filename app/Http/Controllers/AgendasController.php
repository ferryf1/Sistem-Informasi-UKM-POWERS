<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_agenda = Agenda::all();
        return view('agenda.index', compact('data_agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agenda.create');
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
            'kategori' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($data_agenda   =   $request->file('filename')) {

            $name = rand() . '.' .$data_agenda->getClientOriginalName();
            $data_agenda->move(public_path('uploads/agendas'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );

        Agenda::create($form_data);
        return redirect()->route('agenda.index')->with('toast_success','Agenda has been created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data_agenda = Agenda::findOrFail($id);
        return view('agenda.detail', compact('data_agenda'));
    }

    public function DownloadFileAgd($id)
    {
        $file = Agenda::findOrFail($id);
        return response()->download(public_path('uploads/agendas/'.$file->filename));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $name = $request->hidden_image;
        File::delete(public_path('uploads/agendas/'.$name));
        $data_agenda = $request->file('filename');
        if($data_agenda != ''){
        $validasi = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $name = rand() . '.' .$data_agenda->getClientOriginalName();
        $data_agenda->move(public_path('uploads/agendas'), $name);
        }
        else{
            $validasi = $request->validate([
                'judul' => 'required',
                'kategori' => 'required',
                'deskripsi'=> 'required',
                'filename'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }
        $form_data = array(
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi'=> $request->deskripsi,
            'filename' => $name,
        );
        Agenda::findOrFail($id)->update($form_data);
        return redirect()->route('agenda.index')->with('toast_success','Agenda has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
        $name = $agenda->filename;
        File::delete(public_path('uploads/agendas/'.$name));
        $agenda = Agenda::findorFail($agenda->id);
        $agenda->delete();
        return redirect()->route('agenda.index')->with('toast_success','Agenda has been deleted');
    }

    // public function deleteall(Request $request)
    // {
    //     //
    //     $delete_all = $request->input('delid');
    //     Agenda::whereIn('id', $delete_all)->delete();
    //     return redirect()->route('agenda.index');
    // }

    public function search(Request $request){
        $search = $request->get('search');
        $data_agenda = Agenda::where('judul','like','%' . $search . '%')->paginate(10);
        return view('agenda.index',compact('data_agenda','search'));
    }
}
