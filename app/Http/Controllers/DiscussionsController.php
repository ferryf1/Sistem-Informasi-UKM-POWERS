<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Discussion::latest()->simplePaginate(7);
        return view('discussion.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi'=> 'required',
            'filename'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($posts   =   $request->file('filename')) {

            $name = rand() . '.' .$posts->getClientOriginalName();
            $posts->move(public_path('uploads/discussion'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );
        } else{
            $posts = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                
            );
        }

        $post = auth()->user()->discussions()->create($form_data);
        return redirect()->route('discussion.index')->with('success','Post has been created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Discussion::findOrFail($id);
        return view('discussion.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //

        if(auth()->user()->id == $discussion->user_id){
            return view('discussion.edit', compact('discussion'));
        } elseif (auth()->user()->id == '6') {
            return view('discussion.edit', compact('discussion'));
          }else{
            return redirect()->route('discussion.index')->with('warning','That was not your post!');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
        $name = $discussion->filename;
        File::delete(public_path('uploads/discussion/'.$name));
        $posts = $request->file('filename');
        if($posts   =   $request->file('filename')) {
            $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
                'filename'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $name = rand() . '.' .$posts->getClientOriginalName();
            $posts->move(public_path('uploads/discussion'), $name);
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'filename' => $name,
            );
        } else{
            $request->validate([
                'judul' => 'required',
                'deskripsi'=> 'required',
            ]);
            $posts = null;
            $form_data = array(
                'judul' => $request->judul,
                'deskripsi'=> $request->deskripsi,
                'filename'=>null,
            );
        }
        
        // if($posts   =   $request->file('filename')) {
        //     $validasi = $request->validate([
        //         'judul' => 'required',
        //         'deskripsi'=> 'required',
        //         'filename'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
        //     ]);
        //     $name = rand() . '.' .$posts->getClientOriginalName();
        //     $posts->move(public_path('uploads/discussion'), $name);
        //     $form_data = array(
        //         'judul' => $request->judul,
        //         'deskripsi'=> $request->deskripsi,
        //         'filename' => $name,
        //     );
        // }
        // else{
        //     $posts = null;
        //     $validasi = $request->validate([
        //         'judul' => 'required',
        //         'deskripsi'=> 'required',
        //     ]);
        //     $form_data = array(
        //         'judul' => $request->judul,
        //         'deskripsi'=> $request->deskripsi,
        //     );
        // }
        
        if(auth()->user()->id == $discussion->user_id){
            Discussion::findOrFail($discussion->id)->update($form_data);
            return redirect()->route('discussion.index')->with('success','Post has been edited');
        }elseif (auth()->user()->id == '6') {
            Discussion::findOrFail($discussion->id)->update($form_data);
            return redirect()->route('discussion.index')->with('success','Post has been edited');
          } else{
            return redirect()->route('discussion.index')->with('error','That was not your post!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        //
        if(auth()->user()->id == $discussion->user_id){
            $name = $discussion->filename;
            File::delete(public_path('uploads/discussion/'.$name));
            $discussion = Discussion::findorFail($discussion->id);
            $discussion->delete();
            return redirect()->route('discussion.index')->with('success','Post has been deleted');
        }elseif (auth()->user()->id == '6') {
            $name = $discussion->filename;
            File::delete(public_path('uploads/discussion/'.$name));
            $discussion = Discussion::findorFail($discussion->id);
            $discussion->delete();
            return redirect()->route('discussion.index')->with('success','Post has been deleted');
          } else{
            return redirect()->route('discussion.index')->with('error','That was not your post!');
          }
        
    }
}
