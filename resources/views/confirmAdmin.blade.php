@extends('template')

@section('content')

@if($admin === 1)
	<p> {{ $user->pseudo }} est maintenant Admin </p>
@elseif($admin === 0)
<p> {{ $user->pseudo }} n'est plus Admin </p>
@endif


@endsection