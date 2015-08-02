@extends('layouts.master')
@section('content')
    <section class="post">
        <article class="news">
            @if($posts)
                <h2>Tags : {{ucfirst($name)}}</h2>
                @foreach($posts as $post)
                    <h3>{{$post->title}}</h3>
                    <img class="left" src="/img/update/{{$post->thumbnail_link}}" alt=""/>

                    <div class="excerpt">
                        <p>{{$post->excerpt}}</p>

                        <p><a class="link-outside" href="{{$post->url_site}}">Site web de la conférence</a></p>
                    </div>
                    <span class="link-keyword"><strong>Mots clefs :</strong>
                        @foreach($post->tags as $tag)
                            <a href="{{url('tag/'.$tag->id)}}">{{ucfirst($tag->name)}}</a>
                        @endforeach
                        </span>
                    <div class="dateConf">
                        <h3 class="date">DEBUT : {{$post->date_start}} FIN : {{$post->date_end}}</h3>
                    </div>
                @endforeach
            @endif
        </article>
    </section>
@endsection