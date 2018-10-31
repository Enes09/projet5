@extends('template')

@section('title')
commentaire du billet
@endsection

@section('content')


@if(Session::has('status'))
<p class="status" > {{ Session::get('status') }} </p>
@endif


<div class="post offset-lg-1 col-lg-10 offset-lg-1" >

			@foreach($users as $user)
				@if( $post->user_id === $user->id )
						<p>Publié par : {{ $user->pseudo }} </p>
				@endif
			@endforeach
			

			<p class="center title"><strong> Titre : {{ $post->title }}</strong></p>
			<p class="center content"> {!!  strip_tags($post->content, '<strong><em><p>') !!} </p>

				<div class="row"> 
					<span class="date col-lg-6">

						<strong> Posté le :</strong>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/y') }}
						&nbsp;

						@if($post->created_at != $post->updated_at)

							<strong>Dernière mis à jour :</strong>{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/y') }}

						@endif

					</span>  
					
					<span class="link col-lg-6">

						@can('update', $post)
							<a class="update" href="{{ route('post.edit', $post->id) }}">Modifier</a>
						@endcan

						@can('delete', $post)

								{{ Form::open(['action'=>['PostController@destroy', $post->id],'id'=>'deleteForm' ,'method'=>'post']) }}

									{{ method_field('DELETE') }}
									{{ Form::submit('Supprimer', ['class'=>'delete btn button']) }}
									
								{{ Form::close() }}

						@endcan

					</span>
					
				</div>

		</div>

	{{ Form::open([ 'route'=>'comment.store', 'class'=>'offset-lg-1 col-lg-5 commentForm' ]) }}

		{{ Form::label('content', 'Ajouter un commentaire : ', ['class'=>'row ' ]) }}
		{{ Form::textarea('content', null, ['class'=>'col-lg-12 textareaComment']) }}
		
		{{ Form::hidden('post_id', $post->id) }}

		{{ Form::submit('Publier', ['class'=>'btn button col-lg-12']) }}
		

	{{ Form::close() }}

<div class="offset-lg-1">
{{$comments->render("pagination::bootstrap-4")}}
</div>

	@foreach($comments as $comment)

	<div class="comment col-lg-8">

		@foreach($users as $user)
			@if($user->id === $comment->user_id)
			<p>Publier par : {{ $user->name }} </p>
			@endif
		@endforeach

		<p class="commentTitle" > {{ $comment->title }} </p>
		<p> {{ $comment->content }} </p>

		<span class="commentDate">
			{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/y à H:i:s')}}
		</span>

		<span class="links offset-lg-5 col-lg-6">
			
			
			<a class="commentLike btn" href=" {{ route('comment.like', $comment->id) }} "><i class="far fa-thumbs-up"></i></a>
			

			
			<a class="commentDislike btn" href=" {{ route('comment.dislike', $comment->id) }} "><i class="far fa-thumbs-down"></i></a>
			

			
			<a class="commentAlert btn" href=" {{ route('comment.alert', $comment->id) }}  ">Alerter <i class="fas fa-exclamation-circle"></i></a>
			

			@if($comment->allowed === 0)
			<a class="commentAllow btn" href=" {{ route('comment.allow', $comment->id) }} ">Valider <i class="fas fa-check-circle"></i></a>
			@else
			<p>Ce message  été validé.</p>
			@endif



			{{ Form::open(['action'=>['CommentController@destroy', $comment->id], 'id'=>'deleteComment', 'method'=>'post']) }}
				 {{ method_field('delete') }}
				 {{ Form::hidden('id', $comment->id) }}
				{{ Form::button('<i class="far fa-trash-alt"></i>', ['class' => 'btn btn-sm deleteComment', 'type' => 'submit']) }}
			{{ Form::close() }}

		</span>
	</div>


	@endforeach
	
<div class="offset-lg-1">
{{$comments->render("pagination::bootstrap-4")}}
</div>

@endsection