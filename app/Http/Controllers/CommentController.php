<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\StatusRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $comments = Comment::orderBy('comments.created_at','desc')->join('posts', 'post_id', '=', 'posts.id')
            ->select('comments.id',
            'comments.post_id',
                'comments.email',
            'comments.message',
            'posts.title',
            'comments.status')
            ->paginate(3);
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CommentRequest $request)
    {
        $id = Session::get('id');
        $slug = Session::get('slug');

        Comment::create($request->all());
        $email = $request->input('email');
        $comment = $request->input('message');
        $date = Carbon::create()->format('d-m-Y H:i:s');
        Mail::send(['text' => 'email.notifications'], compact('comment', 'email', 'date'), function ($message) use ($email) {
            $message
                ->to(env('EMAIL_ADMIN'))
                ->subject('ConfPHP - Notification commentaire')
                ->from($email);
        });
        return redirect('single/'.$id.'/'.$slug)->with('message', 'Votre commentaire a bien été pris en compte, il est attente de validation.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(StatusRequest $request, $id)
    {
        Comment::find($id)->update($request->all());
        return redirect()->to('comment')->with('message', 'Changement de statut effectué');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->to('comment')->with('message', 'Commentaire supprimé');
    }
}
