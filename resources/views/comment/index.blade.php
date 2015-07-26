@extends('layouts.dash')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Statut</th>
                <th>Titre du post</th>
                <th>Email</th>
                <th>Message</th>
                <th>Changer le statut</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Statut</th>
                <th>Titre du post</th>
                <th>Email</th>
                <th>Message</th>
                <th>Changer le statut</th>
                <th>Supprimer</th>
            </tr>
            </tfoot>

            <tbody  class="table-hover">
            @foreach($comments as $comment)
                <tr class="row">
                    <td>{{$comment->status}}</td>
                    <td><a href="{{url('single/'.$comment->post_id)}}">{{$comment->title}}</a></td>
                    <td><a href="{{url('comment/'.$comment->id)}}">{{$comment->email}}</a></td>
                    <td>{{$comment->message}}</td>
                    <td>
                        {!! Form::open(['url'=>'comment/'.$comment->id]) !!}
                        {!! Form::hidden('_method','put')!!}
                        @if($comment->status =='publish')
                            {!! Form::submit('Unpublish', ['class'=>'form-control']) !!}
                        @else
                            {!! Form::submit('Publish', ['class'=>'form-control']) !!}
                        @endif
                        {!! Form::close()!!}
                    </td>
                    <td>
                        {!! Form::open(['url'=>'comment/'.$comment->id]) !!}
                        {!! Form::hidden('_method','DELETE')!!}
                        {!! Form::submit('Supprimer', ['class'=>'form-control']) !!}
                        {!! Form::close()!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection