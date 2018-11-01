@extends('template')

@section('content')

<h3> Formulaire de contact :  </h3>

{{ Form::open([ 'class'=>'form-vertical offset-lg-4 col-lg-4 contactSiteForm' ]) }}

	<div class="form-group" >
		@if(AUth::check())
			<input hidden type="text" name="email" placeholder=" {{ Auth::user()->email }} ">
		@else
			{{ Form::label('email ', 'Adresse mail :') }}
			<input type="text" name="email">
		@endif

		{!! $errors->first('email', '<div class="alert alert-warning" > :message </div>') !!}
	</div>

	<div class="form-group">
	{{ Form::label('Sujet : ', null) }}
	{{ Form::text('subject') }}
	{!! $errors->first('subject', '<div class="alert alert-warning" > :message </div>') !!}
	</div>

	<div class="form-group" >
		{{ Form::label('Message : ', null) }}<br/>
		{{ Form::textarea('message') }}
		{!! $errors->first('message', '<div class="alert alert-warning" > :message </div>') !!}
	</div>



	{{ Form::submit('Envoyer', ['class'=>'btn button contactSiteSubmit']) }}



{{ Form::close() }}

@endsection