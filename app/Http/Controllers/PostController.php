<?php

namespace App\Http\Controllers;

use App\Models\LikeDislike;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view('post', compact('data'));
    }

    public function details($id)
    {

        $post = Post::find($id);
        return view('post-details', compact('post'));
    }

    public function save_likedislike(Request $request)
    {
        $data = new LikeDislike;
        $data->post_id = $request->post;
        if ($request->type == 'like') {
            $data->like = 1;
        } else {
            $data->dislike = 1;
        }
        $data->save();
        return response()->json(['bool' => true]);
    }
}
