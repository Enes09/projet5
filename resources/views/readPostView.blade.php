@extends('template')

@section('title')
Billet
@endsection


@section('content')

<div class="offset-lg-1">
{{$postData->render("pagination::bootstrap-4")}}
</div>


@foreach($postData as $post)

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

						<a class="comments" href=" {{ action('CommentController@index', $post->id) }} ">Commentaires</a>

						@can('update', $post)
							<a class="update" href="{{ route('post.edit', $post->id) }}">Modifier</a>
						@endcan

						@can('delete', $post)

								{{ Form::open(['action'=>['PostController@destroy', $post->id],'id'=>'deleteForm' ,'method'=>'post']) }}

									{{ method_field('DELETE') }}
									{{ Form::submit('Supprimer', ['class'=>'delete btn button', 'onclick'=>'return confirm("êtes vous sûr de vouloir supprimer le billet intitulé '. $post->title .'? ")']) }}
									
								{{ Form::close() }}

						@endcan

					</span>
					
				</div>

		</div>

	@endforeach


<div class="offset-lg-1">
{{$postData->render("pagination::bootstrap-4")}}
</div>

@endsection