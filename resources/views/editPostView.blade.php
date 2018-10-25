@extends('template')

@section('title')
	Modification de billet
@endsection

@section('content')

{{ Form::open([ 'action'=>['PostController@update', $post->id], 'class' => 'form-horizontal textarea offset-lg-2 col-lg-8 offset-lg-2']) }}
{{ method_field('put') }}



	<div class="form-group">
		{{ Form::label('title :', null, ['class' => 'formTitle']) }}
		{{ Form::text('title',$post->title, ['class' => 'form-control']) }}
		{!! $errors->first('title', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group">
		{{ Form::label('content :', null, ['class' => 'formTitle'])  }}
		{{ Form::textarea('content',$post->content,['class' => 'form-control']) }}
		{!! $errors->first('title', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="submit">
		{{ Form::submit('Modifier',['class' => 'btn bouton']) }}
	</div>

{{ Form::close() }}

@endsection