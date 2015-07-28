@extends('layouts.master')
@include('blog.partials.menu')
@section('content')
    <section>
        <h3>Laisser un messsage</h3>
        (*)Champs obligatoires
        {!! Form::open(['url'=>'contact'])!!}
        <div class="form-group">
            {!!Form::label('email', '(*)Email:',['for'=> 'email'])!!}<br/>
            {!!Form::email('email', old('email'), ['class'=>'form-control', 'id'=>'email', 'require'])!!}
            {!! $errors->first('email', '<span class="help-block">:message</span>')!!}<br/>
            {!!Form::label('captcha', 'Calculer la somme 5+3',['for'=> 'antispam'])!!}<br/>
            {!!Form::text('captcha', '', ['class'=>'form-control', 'id'=>'antispam', 'require'])!!}
        </div>
        {!!Form::label('message', '(*)Commentaire : ')!!}<br/>
        {!!Form::textarea('message', '', ['cols'=>30, 'rows'=>10, 'class'=>'form-control'])!!}
        {!! $errors->first('message', '<span class="help-block">:message</span>')!!}
        <p>{!! Form::submit('Valider', ['class'=>'btn btn-primary']) !!}</p>
        {!! Form::close() !!}
    </section>
@endsection
@yield('aside')
