<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Font awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- jQuery plugins -->
	<script src="{{ asset('js/plugins/jquery.actual.min.js') }}"></script>

	<style>
	html {
		font-family: 'Nunito', sans-serif !important;
	}

	html {
		overflow-y: scroll !important;
	}

	body.modal-open {
		overflow: visible !important;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-info navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="{{ route('home.home') }}" class="nav-link">Home</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Categories
				</a>
				<div class="dropdown-menu position-absolute pt-0 rounded-0">
					<a href="{{ route('categories.index') }}" class="dropdown-item border-bottom">Overview...</a>
					@foreach($categories as $category)
					<a href="{{ route('categories.show', ['category' => $category->id]) }}" class="dropdown-item">{{ $category->name }}</a>
					@endforeach
				</div>
			</li>
		</ul>
	</nav>
	
	<div class="jumbotron jumbotron-fluid">
		<div class="container container-fluid">
			<h1>Inventory Management</h1>
			<p>Easily manage inventory, maybe? If I get this to work I guess..</P>
		</div>
	</div>
	<div class="container main">
		<h1 style="margin-bottom: 50px;" class="text-center">@yield('title')</h1>
		@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissible" style="width: 50%; margin: auto;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ $error }}
		</div>
		@endforeach
		@yield('body')
	</div>
</body>
</html>
<script>
(() => {
	var scripts = [@stack('componentScripts')];

	var unique_scripts = [];

	for (var i = 0; i < scripts.length; i++) {
		if (!unique_scripts.includes(scripts[i])) {
			unique_scripts.push(scripts[i]);
		}
	}

	for (var i = 0; i < unique_scripts.length; i++) {
		$.getScript(`{{ asset('') }}${unique_scripts[i]}`);
	}
})();
</script>