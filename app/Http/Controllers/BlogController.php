<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;


class BlogController extends Controller
{
    public function index(){
        $posts = Post::all();
        $comments= Comment::all();
        $tags = Tag::all();
        return view('blog.index', compact('posts', 'comments','tags'));
    }
    public function showPost($id){
        $posts = Post::find($id);
        $comments = Post::find($id)->comments;
        return view('Blog.single', compact('posts','comments'));
    }
    public function createToMail(){
        return view('blog.contact');
    }
    public function showPostByTag($id){
        $tag= Tag::find($id);
        $name= $tag->name;
        $posts=$tag->posts()->get();
        return view('Blog.tag', compact('posts', 'name'));
    }

}
