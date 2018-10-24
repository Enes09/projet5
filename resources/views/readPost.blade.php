@extends('template')

@section('title')
Billet
@endsection


@section('content')


{{$postData->render("pagination::bootstrap-4")}}

	@foreach($postData as $post)

		<div class="post offset-lg-1 col-lg-10 offset-lg-1" >

			<p>

			Publié par : 

				@if( Auth::user()->id === $post->user_id )
					vous
				@else
					{{ Auth::user()->name }}
				@endif

			</p>
			

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

						<a class="comments" href="">Commentaires</a>

						@can('view', App\Post::class)
							<a class="update" href="">Modifier</a>
						@endcan

						@can('view', App\Post::class)
							<a class="delete" href="">Supprimer</a>
						@endcan

					</span>
					
				</div>

		</div>

	@endforeach

{{$postData->render("pagination::bootstrap-4")}}


@endsection