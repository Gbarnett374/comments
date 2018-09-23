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
        // Validate Fields. 
        $validatedData = $request->validate([
            'name' => 'required',
            'body' => 'required'
        ]);
        $parentId = $request->input('parent_id');

        if (isset($parentId)) {
          $count = Comment::getThreadCount($parentId, 0);
        }
        // Early return if we already have too many nested comments.
        if (isset($count) && $count >= 3 ) {
            $error = 'You have reached the maximum amount of nested comments.';
            return response()->json($error, 422);
        }
        // Looks like Laravel already escapes tags but lets remove them to be safe. 
        $sanitizedInputs = array_map(function($input){
            return trim(strip_tags($input));
        }, $request->all());

        $comment  = Comment::create($sanitizedInputs);
        $comments = Comment::getThreaded();
        return response(view('comments.index', ['comments'=> $comments]), 200);
        

    }
}
