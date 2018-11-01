@extends('template')

@section('content')

<h3> Formulaire de Contact d'abonnés : </h3>

<p class="reciever"> Destinataire : {{ $user->pseudo }} </p>

{{ Form::open([ 'url'=>'contactUser' ,'class'=>'form-vertical offset-lg-4 col-lg-4 contactUserForm' ]) }}

	{{ Form::hidden('from', 'enes.er2709@gmail.com') }}


	<div class="form-group">
	{{ Form::label('Nom : ',null) }}
	{{ Form::text('name', 'Administration Dishelp') }}
	{!! $errors->first('name', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group">
	{{ Form::label('Sujet : ') }}
	{{ Form::text('subject') }}	
	{!! $errors->first('subject', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group">
	{{ Form::label('Message : ', null) }}<br>
	{{ Form::textarea('message') }}
	{!! $errors->first('message', '<div class="alert alert-warning"> :message </div>') !!}
	</div>
	
	{{ Form::hidden('mail', $user->email) }}


	{{ Form::submit('envoyer', ['class'=>'btn button submitContactForm']) }}

{{ Form::close() }}

@endsection