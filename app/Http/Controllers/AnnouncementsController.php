<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengumuman = Announcement::latest()->simplePaginate(10000);
        return view('pengumuman.index',compact('data_pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        if($data_pengumuman   =   $request->file('fileattach')) {
            $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
                'fileattach'=>'required',
            ]);

            $name = rand() . '.' .$data_pengumuman->getClientOriginalName();
            $data_pengumuman->move(public_path('uploads/news'), $name);
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
            $data_pengumuman = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                
            );
        }

        Announcement::create($form_data);
        return redirect()->route('announcement.index')->with('toast_success','Announcement has been created');
        
    }

    public function DownloadFile($id)
    {
        $file = Announcement::findOrFail($id);
        return response()->download(public_path('uploads/news/'.$file->fileattach));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tampil = Announcement::findOrFail($id);
        return view('pengumuman.detail', compact('tampil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
        return view('pengumuman.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        
        $name = $request->hidden_image;
        File::delete(public_path('uploads/news/'.$name));
        $data_pengumuman = $request->file('fileattach');
        
        if($data_pengumuman != ''){
            
        $validasi = $request->validate([
            'judul' => 'required',
            'deskripsi'=> 'required',
            'fileattach'=>'required',
        ]);
        $name = rand() . '.' .$data_pengumuman->getClientOriginalName();
        $data_pengumuman->move(public_path('uploads/news'), $name);
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
            $data_pengumuman = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'fileattach' => null,
            );
        }
        
        
        Announcement::findOrFail($id)->update($form_data);
        return redirect()->route('announcement.index')->with('toast_success','Announcement has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Announcement $announcement)
    {
        //
        $name = $announcement->fileattach;
        File::delete(public_path('uploads/news/'.$name));
        $announcement = Announcement::findorFail($announcement->id);
        $announcement->delete();
        return redirect()->route('announcement.index')->with('toast_success','Announcement has been deleted');
    }

    // public function deleteall(Request $request)
    // {
    //     //
    //     $delete_all = $request->input('delid');
    //     Announcement::whereIn('id', $delete_all)->delete();
    //     return redirect()->route('announcement.index');
    // }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function search(Request $request){
        $search = $request->get('search');
        $data_pengumuman = Announcement::where('judul','like','%' . $search . '%')->paginate(10);
        return view('pengumuman.index',compact('data_pengumuman','search'));
    }
}