<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $user_name = $request->user()->name;

        // if($request->has('id')){
        //     $post = Post::find($request->id);
        //     $post->title = $request->title;
        //     $post->content = $request->content;
        //     $tags = explode(",", $request->tags);
        //     $post->tag($tags);
        //     $post->save();
        // } else {
            $post = new Annonce;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = $user_id;
            $post->user_name = $user_name;
            if(!isset($request->price)){
                $post->price = 0;
            } else {
                $post->price = $request->price;
            }
            $post->save();
            //$tags = explode(",", $request->tags);
            //$post->tag($tags);
            //$post->save();
        //}
        //$post->save();
        return redirect('/annonce/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        

        $annonces = \DB::table('annonces')->orderBy('created_at', 'desc')->paginate(5);
        //$count = Post::withCount('comments')->get();
        //return view('Posts/showposts', ['posts' => Post::paginate(5)]);
        return view('/annonce/show', ['annonces' => $annonces]);
        //return view('annonce/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        //
    }
}
