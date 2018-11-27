<!DOCTYPE html>
<html>
<head>

	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href=" {{ URL::asset('css/Dishelp.css') }} ">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

	{!! SEO::generate(true) !!}


</head>

<body>
	<header id="mainHeader" >

	{{ Html::image('images/dishelpLogo.jpg', 'Le logo de dishelp', ['class'=>'logo col-md-3']) }}


	<h1 class="col-md-4 offset-md-2" style="text-align: center;"> 
		@if(View::hasSection('title'))
			@yield('title')
		@else
			Acceuil
		@endif
	</h1>


	@if (Auth::guest())
		<a  class="btn button login" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Connexion</a>
		<a  class="btn button register" href="{{ route('register') }}"><i class="far fa-clipboard"></i> &nbsp;Inscription</a>
	@else
		<a class="btn button logout" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deconnexion <i class="fas fa-sign-out-alt"></i> </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endif

	<ul id="navbar">
		<li class="btn button navbarMenu" ><a  href=" {{ url('/') }} "><i class="fas fa-home"></i> Acceuil</a></li>
		<li class="btn button navbarMenu" ><a href=" {{ route('post.index') }} "><i class="fas fa-book-open"></i> Billet</a></li>

		@if(Auth::check())
			@if(Auth::user()->super_admin === 1)
				<li class="btn button navbarMenu " ><a href=" {{ route('post.create') }} "><i class="fas fa-pen"></i> Nouveau billet</a></li>
			@endif
		@endif  

		@if(Auth::check())
			<li class="btn button navbarMenu " ><a href="{{ route('user.show', Auth::user()->id) }}"><i class="fas fa-user-circle"></i> Profil</a></li>
		@endif  

		@if(Auth::check())
			@if(Auth::user()->super_admin === 1 || Auth::user()->admin === 1)
			<li class="btn button navbarMenu " ><a href=" {{ route('user.index') }} "><i class="fas fa-users"></i> Gestion des abonnés</a></li>

			<li class="btn button navbarMenu"><a href=" {{ url('alerted') }} "><i class="fas fa-exclamation-circle menu"></i> Alert</a></li>
			@endif
		@endif  

	</ul>


<div id="burgerMenu"> 
	
	<ul class="btn-group-vertical hidden menuLink">
		<li class="btn button firstLink" ><a  href=" {{ url('/') }} "><i class="fas fa-home"></i></a></li>
		<li class="btn button" ><a href=" {{ route('post.index') }} "><i class="fas fa-book-open"></i></a></li>

		@if(Auth::check())
			@if(Auth::user()->super_admin === 1)
		<li class="btn button" ><a href=" {{ route('post.create') }} "><i class="fas fa-pen"></i></a></li>
			@endif
		@endif

		@if(Auth::check())
		<li class="btn button" ><a href="{{ route('user.show', Auth::user()->id) }}"><i class="fas fa-user-circle"></i></a></li>
		@endif

		@if(Auth::check())
			@if(Auth::user()->super_admin === 1 || Auth::user()->admin === 1)
		<li class="btn button" ><a href=" {{ route('user.index') }} "><i class="fas fa-users"></i></a></li>

		<li class="btn button navbarMenu"><a href=" {{ url('alerted') }} "><i class="fas fa-exclamation-circle menu"></i></a></li>
			@endif
		@endif 

	</ul>

	<button class="btn button burgerButton" ><i class="fas fa-bars"></i></button>
</div>

	</header>



	@yield('content')






<footer>

<div class="row">

	<div class="col-md-4 offset-md-1 contactData" >
		<p><i class="fas fa-phone"></i> Tel : 01 23 45 67 89</p>
		<p> <i class="fas fa-map-marker-alt"></i> Adresse : 01 rue de paris France</p>
		<p> <i class="fas fa-clock"></i> Horaires : 9h00 - 13h00 / 14h30 - 17h00 </p>
	</div>

	<a class="col-md-3" id="legelMentions" href=" {{ url('legal') }} ">Mentions légal <i class="fas fa-external-link-alt"></i> </a>
	
	<div id="linkAndForm">	
		<div class="" id="socialLink">
			<a href="">{{ Html::image('images/facebook.png', 'Le logo de facebook', []) }}</a>
			<a href="">{{ Html::image('images/twitter1.PNG', 'Le logo de twitter', []) }}</a>
			<a href="">{{ Html::image('images/instagram2.png', 'Le logo de instagram', []) }}</a>
			<a href="">{{ Html::image('images/google+2.png', 'Le logo de google plus', []) }}</a>
		</div>

		<a class="btn button contactForm" href=" {{ url('contactSite') }} "><i class="far fa-envelope"></i> Formulaire de Contact</a>
	</div>

</div>



	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



	<script type="text/javascript" src="{{ URL::asset('js/dishelp.js') }}"></script>
	
</footer>

</body>
</html>