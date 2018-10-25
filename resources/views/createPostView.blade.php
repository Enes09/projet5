@extends('template')

@section('title')
	Nouveau billet
@endsection



@section('content')

{{ Form::open(['route' => 'post.store' , 'class' => 'form-horizontal textarea offset-lg-2 col-lg-8 offset-lg-2']) }}

	<div class="form-group">
		{{ Form::label('title :', null, ['class' => 'formTitle']) }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
		{!! $errors->first('title', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group">
		{{ Form::label('content :', null, ['class' => 'formTitle'])  }}
		{{ Form::textarea('content', null, ['class' => 'form-control']) }}
		{!! $errors->first('title', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="submit">
		{{ Form::submit('Poster',['class' => 'btn bouton']) }}
	</div>

{{ Form::close() }}

@endsection