@extends('layouts.master')
@section('content')
    <section class="post">

        @if($posts)
            @foreach($posts as $post)
                <article class="news">
                    <h2><a class="link-post" href="{{url('/single/'.$post->id)}}">{{$post->title}}</a></h2>

                    <div class="excerpt">
                        <img class="left" src="/img/update/{{$post->thumbnail_link}}" alt=""/>

                        <p class="abstract">{{$post->excerpt}}</p>

                        <p><a class="link" href="{{url('/single/'.$post->id)}}">Lire la suite...</a></p>

                        <p><a class="link-outside" href="{{$post->url_site}}">Site web de la conférence</a></p>
                    </div>
                    <div class="link-keyword"><strong>Tags :</strong>
                        @foreach($post->tags as $tag)
                            <a href="{{url('tag/'.$tag->id)}}">{{ucfirst($tag->name)}}</a>
                        @endforeach
                    </div>
                    <div class="numberComment">
                        <p><strong>Nombre de commentaire</strong> {{ count($post->displayComments()) }}</p>
                    </div>
                    <div class="dateConf">
                        <h3 class="date">DEBUT : {{$post->date_start}} FIN : {{$post->date_end}}</h3>
                    </div>
                </article>
            @endforeach
        @endif
    </section>
@endsection
