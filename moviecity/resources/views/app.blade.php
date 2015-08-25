<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!-- TODO: fix these so that they use app.css via elixer, add the stylesheet provided with template into the elixer mix -->
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="row">
			<div class="container">
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="{{ action('PagesController@index') }}">Movie City</a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
								<li class="active"><a href="{{ action('PagesController@home') }}">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="{{ action('MoviesController@index') }}">Recommendations</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="{{ url('auth/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

								{{-- change this to an if statment, if logged out display login, if loged in display logout --}}

								@if(Auth::guest())
									<li><a href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
								@else
									<li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
								@endif
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="container">
				{!! Html::image('images/banner.jpg', 'Movie City - Where you discover Laravel') !!}
			</div>
		</div>

		<div class="row">
			<div class="container">
				@include('partials.header')

				<div class="container">
					@yield('content')
				</div>

				@include('partials.footer')
			</div>
		</div>
	</body>
</html>