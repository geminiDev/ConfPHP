<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('dashboard.index',compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags=Tag::all();
        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $args=[ 'slug'=>str_slug($request['title']),
            'excerpt' => substr($request['content'],0,255),
            'user_id' =>Auth::user()->id
        ];
        $request->merge($args);
        $allRequest=$request->all();
        $post = Post::create($allRequest);
        /*$post = new Post();
        $post->title='dimanche';
        $post->slug = 'Samedi';
        $post->content = 'lorem';
        $post->status = 'publish';
        $post->save();*/
        foreach($allRequest['tag_id'] as $value){
            $post->tags()->attach($value);
        }

            //$post = Post::create($request->all());
        // Si j'ai une image
        if($request->hasFile('thumbnail')){
            // Je récupère l'image
            $file=$request->file('thumbnail');
            // je récupere l'extension
            $ext=$file->getClientOriginalExtension();
            // Je crée un nouveau nom de 12 caractere aléatoire
            $fileName= str_random(12).'.'.$ext;
            // Je déplace le fichier avec son nouveau nom
            // public_path('upload') si pb de chemin essayer cette solution.
            $file->move('./uploads', $fileName);
            // UPDATE de l'objet Model la methode sav en base la valeur
            // updated
            $post->link_thumbnail = $fileName;
            $post->save();
        }
        return redirect()->to('post');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $tags=Tag::all();
        return view('post.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Post::find($id)->update($request->all());
        return redirect()->to("post")->with('message', 'success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->to('post')->with('message', 'success');
    }
}
