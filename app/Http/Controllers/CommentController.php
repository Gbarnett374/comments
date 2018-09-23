<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['comments'] = Comment::getThreaded();
        return view('comments.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'body' => 'required'
        ]);
        $comment = Comment::create($request->all());
        $comments = Comment::getThreaded();
        return response(view('comments.index', ['comments'=> $comments]), 200);
      

    }
}
