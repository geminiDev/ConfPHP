<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Mail;
use YOzaz\LaravelSwiftmailer\Mailer;


class BlogController extends Controller
{
    public function index(){
        $posts= Post::published()->get()->sortBy('date_start');
        $tags = Tag::all();
        return view('blog.index', compact('posts', 'comments','tags'));
    }
    public function showPost($id){
        $posts = Post::find($id);
        $comments = Post::find($id)->comments;
        return view('Blog.single', compact('posts','comments'));
    }
    public function showPostByTag($id){
        $tag= Tag::find($id);
        $name= $tag->name;
        $posts=$tag->posts()->get();
        return view('Blog.tag', compact('posts', 'name'));
    }
    public function noticesPage(){
        return view('Blog.notices');
    }
    public function aboutPage(){
        return view('Blog.notices');
    }

}
