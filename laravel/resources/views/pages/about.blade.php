@extends('app')

@section('content')

	<h1>About: {!! $name !!}</h1>
	<h1>About: {{ $name }}</h1>

	@if (count($games))
		<h3>Games I Like:</h3>

		<ul>
			@foreach ($games as $game)
				<li>{{ $game }}</li>
			@endforeach
		</ul>
	@endif

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

@stop