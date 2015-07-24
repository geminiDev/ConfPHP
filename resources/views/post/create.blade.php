@extends('layouts.dash');

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery.datetimepicker.min.css')}}" id="theme_base"/>
@endsection

@section('content')
    <section>
        <div>

            @if(!isset($_POST))

            @else
                <h2>Créer votre post :</h2>
                {!! Form::open(['url'=>'post', 'method'=> 'post', 'files'=>true]) !!}
                <div>
                    <input type="hidden" name="user_id" value=""/>
                    {!! Form::label('title', 'Titre :',['for'=> 'title']) !!}<br/>
                    {!! Form::text('title',old('title') ,['class'=>'form-control', 'id'=>'title', 'required']) !!}
                    {{ $errors->first('title', '<span class="help-block">:message</span>') }}

                </div>
                <div>
                    {!!Form::label('content', 'Article : ')!!}<br/>
                    {!!Form::textarea('content', '', ['cols'=>70, 'rows'=>10, 'class'=>'form-control'])!!}
                    {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                </div>
                <div>
                    {!! Form::label('date_start', 'Date de début :',['for'=> 'date_start']) !!}{!! Form::text('date_start','',['class'=>'form-control', 'id'=>'date_start', 'placeholder'=>'Choisissez votre date', 'required']) !!}<br/>
                    {!! Form::label('date_end', 'Date de fin :',['for'=> 'date_end']) !!}{!! Form::text('date_end','',['class'=>'form-control', 'id'=>'date_end', 'placeholder'=>'Choisissez votre date', 'required']) !!}<br/>
                </div>
                <div>
                    {!! MyHtml::thumb('mon image',['name'=>'thumbnail_link','formats'=>'jpg, png','sizes'=>'1Mo',
                    'class'=>'form-control']) !!}
                </div>

                <div>
                    <strong>Choisissez le statut de votre post :</strong>
                    {!! MyHtml::radio('status',['value'=>'publish','title'=>'publier'])!!}
                    {!!MyHtml::radio('status',['value'=>'unpublish','title'=>'dépublier','checked'])!!}
                </div>

                <div>
                    <strong>Choissez les Tags de l'article :</strong>
                    @if($tags)
                        <ul>
                            @foreach($tags as $tag)
                                {!!MyHtml::radio('tag_id',['value'=>$tag->id,'checked','title'=> $tag->name])!!}
                            @endforeach
                        </ul>
                    @endif
                </div>
                <p>{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-lg btn-block']) !!}</p>
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('assets/js/vendor/jquery.datetimepicker.min.js')}}"></script>
@endsection