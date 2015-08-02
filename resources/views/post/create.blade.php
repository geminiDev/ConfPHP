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
                <div class="form-containe">
                    <input type="hidden" name="user_id" value=""/>
                    {!! Form::label('title', 'Titre :',['for'=> 'title']) !!}<br/>
                    {!! Form::text('title',old('title') ,['class'=>'form-control', 'id'=>'title', 'required']) !!}
                    {{ $errors->first('title', '<span class="help-block">:message</span>') }}

                </div>
                <div class="form-containe">
                    {!!Form::label('content', 'Article : ')!!}<br/>
                    {!!Form::textarea('content', '', ['cols'=>70, 'rows'=>10, 'class'=>'form-control'])!!}
                    {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                </div>
                <div class="form-containe">
                    {!! Form::label('date_start', 'Date de début :',['for'=> 'date_start']) !!}{!!
                    Form::text('date_start','',['class'=>'form-control', 'id'=>'date_start', 'placeholder'=>'Choisissez
                    votre date', 'required']) !!}<br/>
                    {!! Form::label('date_end', 'Date de fin :',['for'=> 'date_end']) !!}{!!
                    Form::text('date_end','',['class'=>'form-control', 'id'=>'date_end', 'placeholder'=>'Choisissez
                    votre date', 'required']) !!}<br/>
                </div>
                <fieldset class="form-containe">
                    {!! MyHtml::thumb('mon image',['name'=>'thumbnail_link','formats'=>'jpeg,png,jpg','sizes'=>'2Mo'])
                    !!}
                </fieldset>

                <div class="form-containe">
                    <strong>Choisissez le statut de votre post :</strong>
                    {!! MyHtml::radio('status',['value'=>'publish','title'=>'publier'])!!}
                    {!!MyHtml::radio('status',['value'=>'unpublish','title'=>'dépublier','checked'])!!}
                </div>

                <div class="form-containe">
                    <strong>Tags de l'article :</strong>
                    @if($tags)
                        <ul>
                            @foreach($tags as $tag)
                                <li>
                                    {!!Form::checkbox('tag_id[]', $tag->id,false,['title'=> $tag->name])!!}
                                    {!!Form::label('tag_id',ucfirst($tag->name), ['title'=> $tag->name])!!}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <p>{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-lg']) !!}</p>
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('assets/js/vendor/jquery.datetimepicker.min.js')}}"></script>
@endsection