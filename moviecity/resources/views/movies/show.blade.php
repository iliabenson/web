@extends('app')

@section('content')
	
	<div>
		<img src="http://placehold.it/230x340" alt="image place holder">
	</div>

	<div>
		<h1>{{ $movie->title }} ({{ $movie->release->year }})</h1>

		<hr/>

		<label>Description: </label>
		<p>{{ $movie->description }}</p>
		<label>Stars: </label>
		<ul>
			@foreach($actors as $actor)

				<li><a href="{{ action('ActorsController@actor', [$actor->id]) }}">{{ $actor->name }}</a></li>

			@endforeach
		</ul>

		<label>Director: </label>
		<p>{{ $movie->director }}</p>

		<label>Rating: </label>
		<p>{{ $movie->rating }}</p>

		<label>Category: </label>
		<p>{{ $movie->category }}</p>

		<label></label>
	</div>

@stop