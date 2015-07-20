@extends('layouts.master')
@include('blog.includes.nav')
@section('content')
    <section>
        @if($posts)
            @foreach($posts as $post)

                <h2>{{$post->title}}</h2>
                <img src="'/img/'{{$post->thumbnail_link}}'/'" alt=""/>

                <div class="excerpt">
                    <p>{{$post->excerpt}}</p>

                    <p><a href="#">Lire la suite...</a></p>

                    <p><a href="{{$post->url_site}}">Site web de la conférence</a></p>
                </div>
                <span class=""><strong>Mots clefs :</strong> </span>
                <span>Nombre de commentaire</span>
                <div class="dateConf">
                    <span>DEBUT : {{$post->date_start}} FIN : {{$post->date_end}}</span>
                </div>
            @endforeach
        @endif
    </section>
@endsection
@yield('aside')