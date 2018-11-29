@extends('layouts.template')

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
		@if(!$user->super_admin === 1)
		<a class="btn button demote" href=" {{ route('user.demote', $user->id) }} ">Destituer</a>
		@endif
	@endif

@endcan

@can('update', $user)
<a class="btn button updateUser" href=" {{ route('user.edit', $user->id) }} ">Modifier</a>
@endcan

@if(Auth::user()->super_admin === 1 || Auth::user()->admin === 1)
<a class="btn button contactFromProfile"  href=" {{ route('user.contact', $user->id) }} ">Contacter</a>
@endif

@can('delete', $user)
	<div style="text-align: right;">

		@if($user->super_admin != 1)
			{{ Form::open([ 'action'=>['UserController@destroy', $user->id], 'id'=>'deleteUser', 'style'=>'position:absolute; right:5px; bottom:10px;' ]) }}
						{{ method_field('DELETE') }}
						{{  Form::submit('Supprimer', ['class'=>'btn button', 'onclick'=>'return confirm("êtes vous sûr de vouloir banir '.  $user->pseudo .' ? ")'])}}
					{{ Form::close() }}
		@endif
	</div>
@endcan
</div>



</div>


@endsection