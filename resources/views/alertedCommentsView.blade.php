@extends('layouts.template')

@section('title', 'Commentaires alertés')

@section('content')

<h3> Commentaires : </h3>



<div class="offset-lg-1">
{{$comments->render("pagination::bootstrap-4")}}
</div>

	@foreach($comments as $comment)

	<div class="comment offset-lg-1 col-lg-8">

		@foreach($users as $user)
			@if($user->id === $comment->user_id)
			<p>Publier par : <a href="{{ route('user.show', $user->id) }}">{{ $user->name }} <i class="fas fa-external-link-alt"></i></a></p>
			@endif
		@endforeach

		<p> {{ $comment->content }} </p>

		<p>Nombre d'alert : {{ $comment->alerted }} </p>
		<span class="commentDate">
			{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/y à H:i:s')}}
		</span>

		<p class="links">

			@if($comment->allowed === 0)
				@can('update', $comment)
				<a class="commentAllow btn" href=" {{ route('comment.allow', $comment->id) }} ">Valider <i class="fas fa-check-circle"></i></a>
				@endcan
			@else
			<span>Message validé.</span>
			@endif


			@can('delete', $comment)
			{{ Form::open(['action'=>['CommentController@destroy', $comment->id], 'id'=>'deleteComment', 'method'=>'post']) }}
				 {{ method_field('delete') }}
				 {{ Form::hidden('id', $comment->id) }}
				{{ Form::button('<i class="far fa-trash-alt"></i>', ['class' => 'btn btn-sm deleteComment', 'type' => 'submit', 'onclick'=>'return confirm("êtes vous sûr de vouloir supprimer ce commentaire ?")']) }}
			{{ Form::close() }}
			@endcan

		</p>
	</div>


	@endforeach

<div class="offset-lg-1">
{{$comments->render("pagination::bootstrap-4")}}
</div>

@endsection