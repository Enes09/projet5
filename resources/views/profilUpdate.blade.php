@extends('layouts.template')

@section('content')

{{ Form::open([ 'action'=>['UserController@update', $user->id], 'class'=>'form-vertical offset-lg-4 col-lg-4 offset-lg-4 updateProfileForm' ]) }}
{{ method_field('PUT') }}
{{ Form::hidden('id',$user->id) }}

<div style="text-align: right; height: 40px;">* Champs obligatoires</div>

	<div class="form-group row">
	{{ Form::label('* Nom :', null, ['class'=>'updateFormNom col-md-3 form-label'] )}}
	<div class="col-md-7">
	{{ Form::text('name',$user->name, ['class'=>'form-control']) }}
	</div>
	{{ $errors->first('name',  ':message') }}
	</div>

	<div class="form-group row">
		{{ Form::label('* Prénom :', null, ['class'=>'col-md-3 form-label']) }}
		<div class="col-md-7">
		{{ Form::text('last_name',$user->last_name, ['class'=>'form-control']) }}
		</div>
		{{ $errors->first('last_name',  ':message') }}
	</div>

	<div class="form-group row ">
	{{ Form::label('* Pseudo :', null, ['class'=>'col-md-3 form-label']) }}
	<div class="col-md-7">
	{{ Form::text('pseudo', $user->pseudo, ['class'=>'form-control']) }}
	</div>
	{{ $errors->first('pseudo',  ':message') }}
	</div>

	<div class="form-group row ">
		{{ Form::label('* Date de naissance:', null, ['class'=>'col-md-3 form-label']) }}
		<div class="col-md-7">
		{{ Form::date('birth_date', $user->birth_date, ['class'=>'form-control']) }}
		</div>
		{{ $errors->first('birth_date',  ':message') }}
	</div>	
	
	<div class="form-group row">
		{{ Form::label('* Adresse mail :', null, ['class'=>'col-md-3 form-label']) }}
		<div class="col-md-7">
		{{ Form::email('email', $user->email, ['class'=>'form-control']) }}
		</div>
		{{ $errors->first('email',  ':message') }}
	</div>

	<div style="height: 30px; text-align: right;">
		{{ Form::submit('Modifier', ['class'=>'btn btn-secondary updateButton']) }}
	</div>

{{ Form::close() }}


@endsection