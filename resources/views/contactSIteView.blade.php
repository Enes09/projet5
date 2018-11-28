 @extends('template')

@section('title', 'Contact')

@section('content')


{{ Form::open([ 'url'=>'contactToSite', 'class'=>' offset-md-3 col-md-7 offset-lg-3 col-lg-5 contactSiteForm' ]) }}

<div style="text-align: right; height: 40px;">* Champs obligatoires</div>

	<div class="form-group row" >
		@if(AUth::check())
			<input hidden type="text" name="sender" value="{{Auth::user()->email}}">

			{{ Form::hidden('name', Auth::user()->name) }}
		@else
			{{ Form::label('email ', '* Adresse mail :', ['class'=>'col-md-3 col-form-label mailContactSite']) }}

			<div class="col-md-8">
				<input class="form-control" type="text" name="sender" autofocus>
			</div>
			{{ Form::hidden('name', 'visiteur') }}

		@endif

		{!! $errors->first('email', '<div class="alert alert-warning" > :message </div>') !!}
	</div>

	<div class="form-group row">

	{{ Form::label('* Sujet : ', null, ['class'=>'col-md-3 col-form-label']) }}

	<div class="col-md-8">
		{{ Form::text('subject', null, ['class'=>'form-control']) }}
	</div>
	{!! $errors->first('subject', '<div class="alert alert-warning" > :message </div>') !!}
	</div>

	<div class="form-group row" >

		{{ Form::label('* Message : ', null, ['class'=>'col-md-3 col-form-label']) }}<br/>
		<div class="col-md-8">
		{{ Form::textarea('message',null, ['class'=>'contactSiteArea form-control ']) }}
		</div>
		{!! $errors->first('message', '<div class="alert alert-warning" > :message </div>') !!}
	</div>



	<div class="contactSiteSubmit">
		{{ Form::submit('Envoyer', ['class'=>'btn btn-secondary ']) }}
	</div>


{{ Form::close() }}

@endsection