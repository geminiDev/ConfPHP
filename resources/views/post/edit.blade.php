@extends('layouts.dash');

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery.datetimepicker.min.css')}}" id="theme_base"/>
@endsection

@section('content')
    <section class="dash-page">
        <div>

            @if(!isset($_POST))

            @else
                <h2>Créer votre post :</h2>
                {!! Form::open(['url'=>'post/'.$post->id, 'files'=>true]) !!}
                {!! Form::hidden('_method','put')!!}
                <div class="form-containe">
                    {!! Form::label('title', 'Titre :',['for'=> 'title']) !!}<br/>
                    {!! Form::text('title', $post->title ,['id'=>'title','class'=>'form-control','required']) !!}
                    {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                </div>
                <div class="form-containe">
                    {!!Form::label('content', 'Article : ')!!}<br/>
                    {!!Form::textarea('content',$post->content, ['cols'=>70, 'rows'=>10, 'class'=>'form-control'])!!}
                    {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                </div>
                <div class="form-containe">
                    {!! Form::label('date_start', 'Date de début :',['for'=> 'date_start']) !!}{!!
                    Form::text('date_start',$post->date_start,['class'=>'form-control', 'id'=>'date_start', 'required'])
                    !!}<br/>
                    {!! Form::label('date_end', 'Date de fin :',['for'=> 'date_end']) !!}{!!
                    Form::text('date_end',$post->date_end,['class'=>'form-control', 'id'=>'date_end', 'required'])
                    !!}<br/>
                </div>
                <div class="form-containe">
                    {!! MyHtml::thumb('mon image',['name'=>'thumbnail_link','formats'=>'jpeg,png,jpg','sizes'=>'2Mo'])
                    !!}
                </div>
                <div class="form-containe">
                    {!! MyHtml::link('Lien du site de la conférence',['name'=>'url_site', 'class'=>'form-control', 'value'=> $post->url_site])!!}
                </div>

                <div class="form-containe">
                    <strong>Choisissez le statut de votre post :</strong>
                    @if($post->status == 'publish')
                        {!! MyHtml::radio('status',['value'=>'publish','title'=>'publier','checked'])!!}
                        {!!MyHtml::radio('status',['value'=>'unpublish','title'=>'dépublier'])!!}
                    @else
                        {!! MyHtml::radio('status',['value'=>'publish','title'=>'publier'])!!}
                        {!!MyHtml::radio('status',['value'=>'unpublish','title'=>'dépublier','checked'])!!}
                    @endif
                </div>
                <div class="form-containe">
                    <strong>Tags de l'article :</strong>
                    <ul>
                        @foreach($tags as $tag)
                            @if(in_array($tag->id, $post->displayTags()))
                                <ul>
                                    {!!Form::label('tag_id',ucfirst($tag->name), ['title'=> $tag->name])!!}
                                    {!!Form::checkbox('tag_id[]', $tag->id,['title'=> $tag->name])!!}
                                </ul>
                            @else
                                <ul>
                                    {!!Form::label('tag_id',ucfirst($tag->name), ['title'=> $tag->name])!!}
                                    {!!Form::checkbox('tag_id[]', $tag->id,false,['title'=> $tag->name])!!}
                                </ul>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <p>{!! Form::submit('Valider', ['class'=>'btn btn-primary btn-lg']) !!}</p>
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('assets/js/vendor/jquery.datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
@endsection