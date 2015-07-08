@extends('app')

@section('content')

	@if (count($movies) > 0)

		<h1>Movie Search Results:</h1>

		<hr/>

		@include('partials.movie_list')

	@else
		<h1>Sorry! We looked but couldn't find any Movies matching your search. :(</h1>
	@endif

	@if (count($actors) > 0)

		<h1>Actor Search Results:</h1>

		<hr/>

		<div class="container">	
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Link</th>
					</tr>
				</thead>
				<tbody>
					@foreach($actors as $actor)			
						<tr>
							<td><img src="http://placehold.it/60x75"></td>
							<td>{{ $actor->name }}</td>
							<td>
								<button type="submit" onclick="window.location='{{ action('ActorsController@actor', [$actor->id]) }}'" class="btn btn-primary btn-lg">View</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	@else
		<h1>Sorry! We looked but couldn't find any Actors matching your search. :(</h1>
	@endif

@stop