@extends('layouts.dash')
@section('content')
    <table>
        <thead>
        <tr>
            <th>Statut</th>
            <th>Email</th>
            <th>Message</th>
            <th>Changer le statut</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Statut</th>
            <th>Email</th>
            <th>Message</th>
            <th>Changer le statut</th>
            <th>Supprimer</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->status}}</td>
                <td><a href="{{url('comment/'.$comment->id)}}">{{$comment->email}}</a></td>
                <td>{{$comment->comment}}</td>
                <td>
                    {!! Form::open(['url'=>'comment/'.$comment->id]) !!}
                    {!! Form::hidden('_method','put')!!}
                    @if($post->status =='publish')
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
@endsection