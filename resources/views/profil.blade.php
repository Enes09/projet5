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
	<p><strong>Date de naissance : </strong>{{ $user->birth_date }} </p>
	<p><strong>Date d'inscription : </strong>{{ $user->created_at }} </p>


@can('update', $user)
<a class="btn button" href=" {{ route('user.edit', $user->id) }} ">Modifier</a>
@endcan

</div>


@endsection