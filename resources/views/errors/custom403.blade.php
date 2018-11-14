<!DOCTYPE html>
<html>
<head>
	<title>error</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=" {{ URL::asset('css/Dishelp.css') }} ">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>

{{ Html::image('images/dishelpLogo.jpg', 'Le logo de dishelp', ['class'=>'logo col-md-3']) }}


	<div class="col-md-10 offset-md-1 oups">
		<p><i class="fas fa-exclamation"></i> <strong> Oups... </strong> <i class="fas fa-exclamation"></i></p>
		<p> La page n'existe pas ... </p>
	</div>

	<a class="btn button col-md-2 offset-md-1 homeReturnButton" href=" {{ url('/')}} "><i class="fas fa-arrow-circle-left"></i> Retour à l'acceuil</a>

</body>
</html>



