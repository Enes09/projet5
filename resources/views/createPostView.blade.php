@extends('layouts.template')

@section('title')
	Nouveau billet
@endsection

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bziizowrerw8frw7u16pkbzufq9pq4whkn951ppg5tz5bnpb"></script>

<script>

	tinymce.init({
        selector : "textarea",
        language: 'fr_FR',
        language_url: 'http://localhost/projet5/public/js/fr_FR.js',
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    });

</script>

@section('content')

{{ Form::open(['route' => 'post.store' , 'class' => 'form-horizontal createPostForm textarea offset-lg-2 col-lg-8 offset-lg-2']) }}

<div style="text-align: right; height: 40px;">* Champs obligatoires</div>

	<div class="form-group row">
		{{ Form::label('* Title :', null, ['class' => 'formTitle col-md-1 form-label']) }}
		<div class="col-md-11">
		{{ Form::text('title', null, ['class' => 'form-control', 'autofocus']) }}
		</div>
		{!! $errors->first('title', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="form-group">
		{{ Form::label('* Contenu :', null, ['class' => 'formTitle createPostContenTitle col-md-3'])  }}
		{{ Form::textarea('content', null, ['class' => 'form-control']) }}
		{!! $errors->first('content', '<div class="alert alert-warning"> :message </div>') !!}
	</div>

	<div class="submit">
		{{ Form::submit('Poster',['class' => 'btn btn-secondary']) }}
	</div>

{{ Form::close() }}

@endsection