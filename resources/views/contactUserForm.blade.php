@extends('layouts.template')

@section('content')

<h3> Formulaire de Contact d'abonnés : </h3>
<div class="alert alert-info offset-md-4 col-md-4" role="alert">
	<p class="reciever"> Destinataire : {{ $user->pseudo }} </p>
</div>
{{ Form::open([ 'url'=>'contactUser' ,'class'=>'form-vertical offset-lg-4 col-lg-4 contactUserForm' ]) }}

	<div style="text-align: right; height: 40px;">* Champs obligatoires</div>

	<div class="form-group row">
	{{ Form::label('* Nom : ',null, ['class'=>'col-md-3 form-label']) }}
	<div class="col-md-7">
		{{ Form::text('name', 'Administration Dishelp', ['class'=>'form-control']) }}
	</div>
	{!! $errors->first('name', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group row">
	{{ Form::label('* Sujet : ', null, ['class'=>'col-md-3 form-label']) }}
	<div class="col-md-7">
	{{ Form::text('subject', null, ['class'=>'form-control', 'autofocus']) }}	
	</div>
	{!! $errors->first('subject', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group row">
	{{ Form::label('* Message : ', null, ['class'=>'col-md-3 form-label']) }}
	<div class="col-md-7">
	{{ Form::textarea('message', null, ['class'=>'contactUserTextarea form-control']) }}
	</div>
	{!! $errors->first('message', '<div class="alert alert-warning"> :message </div>') !!}
	</div>
	
	{{ Form::hidden('email', $user->email) }}

	<div style="height: 30px; text-align: right;">
	{{ Form::submit('Envoyer', ['class'=>'btn btn-secondary submitContactForm']) }}
	</div>

{{ Form::close() }}

@endsection