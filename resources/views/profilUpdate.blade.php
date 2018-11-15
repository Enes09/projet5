@extends('template')

@section('content')

{{ Form::open([ 'action'=>['UserController@update', $user->id], 'class'=>'form-vertical offset-lg-4 col-lg-4 offset-lg-4 updateProfileForm' ]) }}
{{ method_field('PUT') }}
{{ Form::hidden('id',$user->id) }}

	<div class="form-group">
	{{ Form::label('Nom', null, ['class'=>'updateFormNom'] )}}
	{{ Form::text('name',$user->name) }}
	{{ $errors->first('name',  ':message') }}
	</div>

	<div class="form-group">
		{{ Form::label('Prénom', null) }}
		{{ Form::text('last_name',$user->last_name) }}
		{{ $errors->first('last_name',  ':message') }}
	</div>

	<div class="form-group">
	{{ Form::label('Pseudo') }}
	{{ Form::text('pseudo', $user->pseudo) }}
	{{ $errors->first('pseudo',  ':message') }}
	</div>

	<div class="form-group">
		{{ Form::label('date de naissance') }}
		{{ Form::date('birth_date', $user->birth_date) }}
		{{ $errors->first('birth_date',  ':message') }}
	</div>	
	
	<div class="form-group">
		{{ Form::label('Adresse mail') }}
		{{ Form::email('email', $user->email) }}
		{{ $errors->first('email',  ':message') }}
	</div>

	<div class="col-md-12 updateDiv">
		{{ Form::submit('Modifier', ['class'=>'btn button updateButton']) }}
	</div>

{{ Form::close() }}


@endsection