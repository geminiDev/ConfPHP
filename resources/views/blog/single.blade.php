@extends('layouts.master')
@section('content')
    <section class="post">
        <article class="news">
            @if($posts)

                <h2>{{$posts->title}}</h2>
                <img class="left" src="/img/update/{{$posts->thumbnail_link}}" alt=""/>
                <div class="excerpt">
                    <p>{{$posts->content}}</p>

                    <p><a class="link-outside" href="{{$posts->url_site}}">Site web de la conférence</a></p>
                </div>
                <span class="link-keyword"><strong>Mots clefs :</strong>
                    @foreach($posts->tags as $tag)
                        <a href="{{url('tag/'.$tag->id)}}">{{ucfirst($tag->name)}}</a>
                    @endforeach

                </span>
                <div class="dateConf">
                    <h3 class="date">DEBUT : {{$posts->date_start}} FIN : {{$posts->date_end}}</h3>
                </div>
            @endif
        </article>
    </section>
    <section class="post">
        <div class="news">
            <h3 class="commenTitle">Laisser un commentaire</h3>
            {!! Form::open(['url'=>'comment'])!!}
            <div class="form-group">
                {!!Form::label('email', 'Email(*):',['for'=> 'email'])!!}<br/>
                {!!Form::email('email', old('email'), ['class'=>'form-control', 'id'=>'email', 'require'])!!}
                {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
            </div>
            {!!Form::label('message', 'Commentaire : ')!!}<br/>
            {!!Form::textarea('message', '', ['cols'=>30, 'rows'=>10, 'class'=>'form-control'])!!}
            {!! $errors->first('message', '<span class="help-block">:message</span>')!!}
            {!! Form::hidden('post_id', $posts->id, ['name'=>'post_id']) !!}
            <p>{!! Form::submit('Valider', ['class'=>'btn btn-primary']) !!}</p>
            {!! Form::close() !!}
        </div>
    </section>
    <section class="post">
        <article class="news">
            <p><strong class="numberComment">Commentaire :</strong></p>
            @if(count($comments)!==0)
                @if(count($comments)==1 || count($comments)==0)
                    <em>{{count($comments)}} commentaire</em>
                @else
                    <em>{{count($comments)}} commentaires</em>
                @endif
                @foreach($comments as $comment)
                    <p><strong>mail :</strong>{{$comment->email}}</p>
                    <p>{{$comment->message}}</p>
                @endforeach
            @else
                <p>Pas de commentaire à cet article</p>
            @endif
        </article>
    </section>

@endsection