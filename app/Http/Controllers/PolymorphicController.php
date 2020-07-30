<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cloudinary\CloudinaryInterface;
use App\User;
use App\Video;
use App\Comment;


class PolymorphicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($view = null)
    {
        if($view != null) {
            $post = Post::with('image')->get();

            return view('Polymorphic.view', compact(['post']));

        } else {
            $post = Post::limit(10)->get();
            return view('Polymorphic.insert', compact(['post']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CloudinaryInterface $ci)
    {
        // dd($request);
        $r = $request;
        $comment = Comment::create([
            'body' => $r['comment_post'],
            'commentable_id' => $r['id_post'],
            'commentable_type' => 'App\Post',
        ]);
        // $filename = $ci->upload($request['files']);

        // dd($filename);
        return 'berhasil komen';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
