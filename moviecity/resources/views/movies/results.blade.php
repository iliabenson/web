@extends('app')

@section('content')

	<h1>Search Results</h1>

	<hr/>

	@if (count($movies) > 0)

		@include('partials.movie_list')

	@else
		<h1>Sorry! We looked but couldn't find anything</h1>
	@endif
@stop