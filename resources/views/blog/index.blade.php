@extends('layouts.master')
@include('blog.partials.menu')
@section('content')
    <section>
        @if($posts)
            @foreach($posts as $post)
                <h2>{{$post->title}}</h2>
                <img src="/img/update/{{$post->thumbnail_link}}" alt=""/>
                <div class="excerpt">
                    <p>{{$post->excerpt}}</p>

                    <p><a href="{{url('/single/'.$post->id)}}">Lire la suite...</a></p>

                    <p><a href="{{$post->url_site}}">Site web de la conférence</a></p>
                </div>
                <div class="tags"><strong>Tags :</strong>
                    @foreach($post->tags as $tag)
                        <a href="{{url('tag/'.$tag->id)}}">{{ucfirst($tag->name)}}</a>
                    @endforeach
                </div>
                <div class="numberComment">
                    <p><strong>Nombre de commentaire</strong> {{ count($post->comments) }}</p>
                </div>
                <div class="dateConf">
                    <span>DEBUT : {{$post->date_start}} FIN : {{$post->date_end}}</span>
                </div>
            @endforeach
        @endif
    </section>
@endsection
@include('blog.includes.aside')