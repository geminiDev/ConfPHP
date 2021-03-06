@extends('layouts.dash')
@section('content')
    <div class="table-responsive">
        <section class="dash-page">
            <p>{{Session::get('message')}}</p>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Statut actuel</th>
                    <th>Titre du post</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Modifier le statut</th>
                    <th>Supprimer</th>
                </tr>
                </thead>

                <tbody>
                @foreach($comments as $comment)
                        @if($comment->status == 'publish')
                            <tr class="success">
                        @else
                            <tr class="info">
                                @endif

                                <td>{{$comment->status}}</td>
                                <td><a href="{{url('single/'.$comment->post_id)}}">{{$comment->title}}</a></td>
                                <td><a href="{{url('comment/'.$comment->id)}}">{{$comment->email}}</a></td>
                                <td>{{$comment->message}}</td>
                                <td>
                                    {!! Form::open(['url'=>'comment/'.$comment->id]) !!}
                                    {!! Form::hidden('_method','put')!!}
                                    @if($comment->status =='publish')
                                        {!! Form::submit('unpublish', ['class'=>'btn btn-warning', 'name'=>'status'])
                                        !!}
                                    @else
                                        {!! Form::submit('publish', ['class'=>'btn btn-warning', 'name'=>'status']) !!}
                                    @endif
                                    {!! Form::close()!!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>'comment/'.$comment->id]) !!}
                                    {!! Form::hidden('_method','DELETE')!!}
                                    {!! Form::submit('Supprimer', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                </tbody>
            </table>
        </section>

        <nav class="navigation">
            {!! $comments->render() !!}
        </nav>
    </div>
@endsection