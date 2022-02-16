<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'commentBody'=>'required',
        ]);

        $blog->comments()->create(['body'=>request('commentBody'),'user_id'=>auth()->id()]);
        $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id());
        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber)->queue(new SubscriberMail($blog));
        });
        return back();
    }
}
