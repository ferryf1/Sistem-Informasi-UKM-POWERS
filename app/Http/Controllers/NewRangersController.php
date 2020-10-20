<?php

namespace App\Http\Controllers;

use App\NewRanger;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NewRangersExport;
use Illuminate\Http\Request;

class NewRangersController extends Controller
{

    public function __construct(){
        $this->middleware('role:superadministrator')->except(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_newranger = NewRanger::all();
        return view('new-rangers.index', compact('data_newranger'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('front-pages.register-global');
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
            'namalengkap' => 'required',
            'nim'=> 'required',
            'jurusan'=> 'required',
            'prodi'=> 'required',
            'email' => 'required',
            'nohandphone' => 'required',
            'semester'=>'required',
            'alasan'=>'required',
        ]);
       
            NewRanger::create($request->all());
            return redirect()->route('register-global')->with('success', 'Thank You For Joining Us! Your Data Will Be Confirmed Soon!');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(NewRanger $newranger)
    {
        //
        $data_newranger = NewRanger::findOrFail($newranger->id);
        return view('new-rangers.detail', compact('data_newranger'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $data_newranger = NewRanger::where('namalengkap','like','%' . $search . '%')->paginate(10);
        return view('new-rangers.index',compact('data_newranger','search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    public function deleteall(Request $request)
    {
        //
        $delete_all = $request->input('delid');
        if($delete_all != ''){
        NewRanger::whereIn('id', $delete_all)->delete();
        return redirect()->route('newranger.index')->with('toast_success', 'Data berhasil dihapus!');
        }else{
            return redirect()->route('newranger.index')->with('toast_error', 'Data gagal dihapus!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewRanger $newranger)
    {
        //
        $data_newranger = NewRanger::findOrFail($newranger->id);
        $data_newranger->forceDelete();

        return redirect()->route('newranger.index')->with('toast_success', 'Data berhasil dihapus!');
    }

    
    public function export()
    {
        $namafile = 'New-Rangers'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new NewRangersExport, $namafile);
    }
}
