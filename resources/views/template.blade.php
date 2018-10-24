<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=" {{ URL::asset('css/Dishelp.css') }} ">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
@yield('content')
</body>
</html>