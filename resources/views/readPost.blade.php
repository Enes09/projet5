@extends('template')

@section('title')
Billet
@endsection


@section('content')

	@foreach($postData as $post)
<div>
	{{ $post->title }}


@can('view', App\Post::class)
	<a href="">Supprimer</a>
	<a href="">Modifier</a>
@endcan

</div>
	@endforeach

@endsection