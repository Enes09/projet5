@extends('template')

@section('content')

@if($admin === 1)
	<p class="alert alert-success"> {{ $user->pseudo }} est maintenant Admin </p>
@elseif($admin === 0)
<p class="alert alert-danger"> {{ $user->pseudo }} n'est plus Admin </p>
@endif

<a  class="btn btn-primary" href=" {{ route('user.show', Auth::user()->id) }}  "> <i class="fas fa-arrow-circle-left"></i> Profil</a>

@endsection