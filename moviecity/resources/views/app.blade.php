<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!-- TODO: fix these so that they use app.css via elixer, add the stylesheet provided with template into the elixer mix -->
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>

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