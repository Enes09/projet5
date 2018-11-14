@extends('template')

@section('content')


<div class="panel panel-default col-md-8 offset-md-2">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>

<article class="col-md-10 offset-md-1" id="welcome">

	<h3> Bienvenue sur Dishelp </h3>

	<p>
		Dishelp est un site qui vient en aide aux personnes handicapés. Mais quels type d'aide est aporté à ces personnes ?<br/> Dishelp essaye aux maximum de mettre en relation les personnes expérimentés dans leur handicap leur permettant de vivre comme tout autre personnes avec les personnes qui sont malheureusement devenu handicapé, avec Dishelp cela ne sera plus un handicap mais une source de motivation pour aller de l'avant.
	</p>

	<p>
		Sur Dishelp vous pouvez consultez les billets postés pour mettre en place différentes communaauté en relation comme par exemple les personnes ayant des problèmes de mobilités, des problèmes linguistique, ou encore des problèmes d'ouï et plein d'autre encore, finalement permettre par exemple les personnes ayant des problèmes d'ouï depuis plus de 10 ans d'aider les plus jeunes.	
	</p>

	<p>
		Dishelp ne se limite pas à mettre en place des communautés mais également une récolte de fond pour venir en aide à ces personnes sur le plan financier.
	</p>

	<p>
		Vous pouvez nous communiquer de nouvel idées pour améliorer votre expérience sur Dishelp ou encore mettre en place de nouvel communauté sur celui-ci avec le formulaire de contact gràce à nos devloppeurs bénévole qui serront à votre disposition.
	</p>

	<p>
		Noubliez pas de vous inscrire pour venir en aide aux personnes qui en on besoin, contactez de nouvel personnes ou encore demander de l'aide
	</p>
</article>

@endsection
