@extends('app')

@section('content')

	<h1>Search Results</h1>

	<hr/>

	@if (count($movies) > 0)

		@include('partials.movie_list')

	@else
		<h1>Sorry! We looked but couldn't find any Movies matching your search. :(</h1>
	@endif

	@if (count($actors) > 0)

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
								<button type="submit" onclick="window.location='#'" class="btn btn-primary btn-lg">View</button>
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