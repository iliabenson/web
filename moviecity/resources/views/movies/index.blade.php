@extends('app')

@section('content')

This will display some recent movies or something

	<h1>Recommended movies</h1>

	<hr/>

	@foreach($movies as $movie)
		<div>
				
			<h2>
				<a href="#">{{ $movie->title }}</a>
			</h2>

			<div class="body">{{ $movie->description }}</div>

		</div>
	@endforeach
@stop

{{-- {{ action('ArticlesController@show', [$article->id]) }} --}}