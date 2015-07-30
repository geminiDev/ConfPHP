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
        $comments = Comment::join('posts', 'post_id', '=', 'posts.id')
            ->select('comments.id',
            'comments.post_id',
                'comments.email',
            'comments.message',
            'posts.title',
            'comments.status')
            ->get();
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
        return redirect('/')->with('message', 'Email envoyé');
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
        return redirect()->to('comment')->with('message', 'success update');
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
        return redirect()->to('comment')->with('message', 'success');
    }
}
