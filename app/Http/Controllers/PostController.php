<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Requests\StatusRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use \Intervention\Image\ImageManagerStatic;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        $tags = Tag::all();
        return view('dashboard.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $args = ['slug' => str_slug($request['title']),
            'excerpt' => substr($request['content'], 0, 255),
            'user_id' => Auth::user()->id
        ];
        $request->merge($args);
        $allRequest = $request->all();
        $post = Post::create($allRequest);

        foreach ($allRequest['tag_id'] as $value) {
            $post->tags()->attach($value);
        }
        if (Input::file()) {
            $image = Input::file('thumbnail_link');
            $ext = $image->getClientOriginalExtension();
            $fileName = $args['slug'] . str_random(3) . '.' . $ext;
            $path = public_path('img/update/' . $fileName);
            ImageManagerStatic::make($image->getRealPath())->resize(200, 200)->save($path);
            $post->thumbnail_link = $fileName;
            $post->save();
        }
        return redirect()->to('post')->with('message', 'Votre post est bien créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        $tags = Tag::all();
        return view('post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(PostRequest $request, $id)
    {
        $args = ['slug' => str_slug($request['title']),
            'excerpt' => substr($request['content'], 0, 255),
            'user_id' => Auth::user()->id
        ];
        $request->merge($args);
        $allRequest = $request->all();
        $post = Post::find($id);
        if (isset($allRequest['tag_id'])) {

            DB::table('post_tag')->where('post_id', $id)->delete();
            foreach ($allRequest['tag_id'] as $value) {
                $post->tags()->attach($value);
            }
        }
        $post->update($allRequest);
        if (Input::file()) {
            $image = Input::file('thumbnail_link');
            $ext = $image->getClientOriginalExtension();
            $fileName = $args['slug'] . str_random(3) . '.' . $ext;
            $path = public_path('img/update/' . $fileName);
            ImageManagerStatic::make($image
                ->getRealPath())
                ->resize(200, 200)
                ->save($path);
            $post->thumbnail_link = $fileName;
            $post->save();
        }

        return redirect()->to('post')->with('message', 'Mise à jour effectué');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->to('post')->with('message', 'Post supprimé avec succès');
    }

    public function changeToStatus(StatusRequest $request, $id)
    {
        Post::find($id)->update($request->all());

        return redirect()->to('post')->with('message', 'Changement de statut effectué');
    }
}
