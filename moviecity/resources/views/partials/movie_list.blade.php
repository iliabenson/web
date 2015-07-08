<div class="container">	
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Image</th>
				<th>Movie Title</th>
				<th>Released</th>
				<th>Director</th>
				<th>Recommended</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			@foreach($movies as $movie)			
				<tr>
					<td><img src="http://placehold.it/60x75"></td>
					<td>{{ $movie->title }} ({{ $movie->release->year }})</td>
					<td>{{ $movie->release->year }}</td>
					<td>{{ $movie->director }}</td>
					@if ($movie->recommended == 1)
						<td>
							{{ $movie->user->name }}
						</td>
					@else
						<td>Nope</td>
					@endif
					<td>
						<button type="submit" onclick="window.location='{{ action('MoviesController@show', [$movie->id]) }}'" class="btn btn-primary btn-lg">View</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>