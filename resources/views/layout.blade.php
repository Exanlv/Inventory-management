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

	<style>
	html {
		font-family: 'Nunito', sans-serif !important;
	}

	.main h1 {
		color: #212529;
	}

	.main {
		font-size: 20px;
		color: #909090;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-info navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="nav-link">Home</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Categories
				</a>
				<div class="dropdown-menu position-absolute">
					@foreach($categories as $category)
					<a href="{{ route('category.show', ['category' => strtolower($category->name)]) }}" class="dropdown-item">{{ $category->name }}</a>
					@endforeach
					<a href="{{ route('category.add') }}" class="dropdown-item">Add...</a>
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
		@yield('body')
	</div>
</body>
</html>