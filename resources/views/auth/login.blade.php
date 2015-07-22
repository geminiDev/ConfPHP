@extends('layouts.master')
@include('blog.partials.menu')

@section('content')
    <h1>Bienvenu sur ConfPHP</h1>
    <p><small>Veuillez-vous authentifier</small></p>
    {!! Form::open(['url'=>'auth/login', 'method' => 'POST']) !!}
    <p><stong>Email : </stong>{!! Form::email('email', old('email'),['class'=>'form-control', 'required']) !!}</p>
    {!! $errors->first('email', ':message') !!}
    <p><stong>Password : </stong>{!! Form::password('password',['class'=>'form-control', 'required']) !!}</p>
    <p><stong>Remember : </stong>{!! Form::checkbox('Remember', 1, false, ['id'=> 'Remember']) !!}</p>
    {!! Form::submit('Click Me', ['Class'=>'btn btn-primary btn-lg btn-block']) !!}
    {!! Form::close() !!}
@endsection