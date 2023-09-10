<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use DB;
class PostsController extends Controller
{

    function index(){

        // $data = Post::leftJoin('comments', 'posts.id', '=', 'comments.post_id')
        // ->select('posts.title', 'posts.content', 'comments.comment')
        // ->get();

        $data = Post::with('comments')->get();

        // dd($data->toArray());

        return view('pages.posts')->with([
            'posts' => $data
        ]);
    }

}
