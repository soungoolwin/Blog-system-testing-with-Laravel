<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'commentBody'=>'required',
        ]);

        $blog->comments()->create(['body'=>request('commentBody'),'user_id'=>auth()->id()]);
        return back();
    }
}
