@extends('layouts.dash')
@section('content')
    <section class="dash-page">
        <h1>Dashboard</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Statut</th>
                    <th>Titre</th>
                    <th>Date de début et fin</th>
                    <th>Mots clefs</th>
                    <th>Changer le statut</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Statut</th>
                    <th>Titre</th>
                    <th>Date de début et fin</th>
                    <th>Mots clefs</th>
                    <th>Changer le statut</th>
                    <th>Supprimer</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->status}}</td>
                        <td><a href="{{url('post/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
                        <td>{{$post->date_start}} et {{$post->date_end}}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <a href="{{url('tag/'.$tag->id)}}">{{ucfirst($tag->name)}}</a>
                            @endforeach
                        </td>
                        <td>
                            {!! Form::open(['url'=>'status/'.$post->id]) !!}
                            {!! Form::hidden('_method','put')!!}
                            @if($post->status =='publish')
                                {!! Form::submit('unpublish', ['class'=>'btn btn-warning', 'name'=>'status']) !!}
                            @else
                                {!! Form::submit('publish', ['class'=>'btn btn-warning', 'name'=>'status']) !!}
                            @endif
                            {!! Form::close()!!}
                        </td>
                        <td>
                            {!! Form::open(['url'=>'post/'.$post->id]) !!}
                            {!! Form::hidden('_method','DELETE')!!}
                            {!! Form::submit('Supprimer', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close()!!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav class="navigation">
                {!! $posts->render() !!}
            </nav>
        </div>
    </section>
@endsection