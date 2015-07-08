@extends('app')

@section('content')
	
	<div>
		<img src="http://placehold.it/230x340" alt="image place holder">
	</div>

	<div>
		<h1>{{ $actor->name }}</h1>

		<hr/>

		<label>Movies: </label>
		<ul>
			@foreach($movies as $movie)

				<li><a href="{{ action('MoviesController@show', [$movie->id]) }}">{{ $movie->title }} ({{ $movie->release->year }})</a></li>

			@endforeach
		</ul>
	</div>

@stop