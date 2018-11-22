@extends('template')

@section('content')


<div class="panel panel-default col-md-8 offset-md-2">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>



<div id="sliderContainer" class="row col-sm-12" >
  
  <div id="arrowDivLeft" class="offset-md-2 col-md-1 offset-lg-2 col-lg-1 arrowDiv">
	<span id="leftArrowSlide"> <i class="fas fa-caret-left fa-7x"></i> </span>
  </div>

<div id="slider" class="col-lg-6">

    <figure class="slideImages" id="slide1" style="z-index: 3;"><!-- slide -->
      {{ Html::image('images/slide1.jpg', 'personne aidant un enfant', ['class'=>'slide1Img']) }}
      <figcaption>&nbsp;&nbsp;Là où il y'a une volonté, il y a un chemin.</figcaption>
    </figure>

    <figure class="slideImages" id="slide2" style="z-index: 2;">
      {{ Html::image('images/slide2.jpg', 'la main d\'une personne agée tennant celui d\'un enfant',  ['class'=>'slide2Img']) }}
      <figcaption>&nbsp; Risquer d'échouer seul <br/>&nbsp; ou <br/>&nbsp; Tenter de réussir enssemble ?</figcaption>
    </figure>

    <figure class="slideImages" id="slide3" style="z-index: 1;">
      {{ Html::image('images/slide4.jpg', 'des enfants levant la main en classe',  ['class'=>'slide3Img']) }}
      <figcaption>&nbsp;Enssemble pour porgresser.</figcaption>
    </figure>

</div>

<div id="arrowDivRight" class="col-md-1 arrowDiv">
    <span id="rightArrowSlide" > <i class="fas fa-caret-right fa-7x"></i> </span>
</div>

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




<script src="https://js.stripe.com/v3/"></script>



<h3 class="offset-md-3">Faire un don à l'association : </h3>

<form action="{{ url('api/payment') }}" method="post" id="payment-form" class="offset-md-3 col-md-6" onsubmit=" return false;">


	<p id="MontantDuDon"><strong>Montant du don : </strong></p>

<div id="stripeBtn">
	<button type="button" class="btn btn-secondary stripeBtn" id="stripeBtn5">5,00€</button>
	<button type="button" class="btn btn-secondary stripeBtn" id="stripeBtn10">10,00€</button>
	<button type="button" class="btn btn-secondary stripeBtn" id="stripeBtn20">20,00€</button>
	<button type="button" class="btn btn-secondary stripeBtn" id="stripeBtn50">50,00€</button>
</div>


<div class="input-group col-md-6">
  <input type="text" name="donationInput" id="donationInput" class="form-control" aria-label="Amount" placeholder="5,00" value="5,00">
  <div class="input-group-append">
    <span class="input-group-text euroSpan">€</span>
  </div>
</div>
<span id="stripeError" class="alert alert-danger"> Le format du montant doit correspondre à 0,00 </span>
<p>*Format(0,00)</p>

<br/>

  <div class="form-row">
    <label for="card-element">

    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button class="btn btn-primary" id="submitStripe">Faire un don</button>
</form>


@endsection
