<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_portfolio = Portfolio::latest()->simplePaginate(10000);
        return view('portfolios.index',compact('data_portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('portfolios.create');
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
        if($data_portfolio   =   $request->file('fileattach')) {
            $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
                'fileattach'=>'required',
            ]);

            $name = rand() . '.' .$data_portfolio->getClientOriginalName();
            $data_portfolio->move(public_path('uploads/portfolios'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'fileattach' => $name,
            );
        }else{
            $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
            ]);
            $data_portfolio = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                
            );
        }

        Portfolio::create($form_data);
        return redirect()->route('portfolio.index')->with('toast_success','Portfolio has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tampil = Portfolio::findOrFail($id);
        return view('portfolios.detail', compact('tampil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
        $name = $request->hidden_image;
        File::delete(public_path('uploads/portfolios/'.$name));
        $data_portfolio = $request->file('fileattach');
        
        if($data_portfolio != ''){
            
        $validasi = $request->validate([
            'judul' => 'required',
            'deskripsi'=> 'required',
            'fileattach'=>'required',
        ]);
        $name = rand() . '.' .$data_portfolio->getClientOriginalName();
        $data_portfolio->move(public_path('uploads/portfolios'), $name);
        $form_data = array(
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'fileattach' => $name,
        );
        } else{
            $validasi = $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
            ]);
            $data_portfolio = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'fileattach' => null,
            );
        }
        
        
        Portfolio::findOrFail($portfolio->id)->update($form_data);
        return redirect()->route('portfolio.index')->with('toast_success','Portfolio has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
        $name = $portfolio->fileattach;
        File::delete(public_path('uploads/portfolios/'.$name));
        $portfolio = Portfolio::findorFail($portfolio->id);
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('toast_success','Portfolio has been deleted');
    }
}
