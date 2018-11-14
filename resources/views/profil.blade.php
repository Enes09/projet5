@extends('template')

@section('content')

<div class="offset-lg-2 col-lg-8 profilData">

   @if($user->super_admin === 1)
		<p class="userGrade" >Administrateur Principal</p>
	@elseif($user->admin === 1)
		<p class="userGrade" >Administrateur</p>
	@endif

	<p><strong>Nom : </strong> {{ $user->name }} </p>
	<p><strong>Prénom : </strong>{{ $user->last_name }} </p>
	<p><strong>Pseudo : </strong>{{ $user->pseudo }} </p>
	<p><strong>Adresse mail : </strong>{{ $user->email }} </p>
	<p><strong>Date de naissance : </strong>{{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/y') }} </p>
	<p><strong>Date d'inscription : </strong>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/y') }} </p>

<div class="userAction">
@can('promote', $user)

	@if($user->admin === 0)
		<a class="btn button promote" href=" {{ route('user.promote', $user->id) }} ">Promouvoir Admin</a>
	@endif

@endcan

@can('demote', $user)

	@if($user->admin===1)
		<a class="btn button demote" href=" {{ route('user.demote', $user->id) }} ">Destituer</a>
	@endif

@endcan

@can('update', $user)
<a class="btn button updateUser" href=" {{ route('user.edit', $user->id) }} ">Modifier</a>
@endcan


@can('delete', $user)
	<div style="text-align: right;">
		{{ Form::open([ 'action'=>['UserController@destroy', $user->id], 'id'=>'deleteUser', 'style'=>'position:absolute; right:5px; bottom:10px;' ]) }}
					{{ method_field('DELETE') }}
					{{  Form::submit('Supprimer', ['class'=>'btn button'])}}
				{{ Form::close() }}

	</div>
@endcan
</div>



</div>


@endsection