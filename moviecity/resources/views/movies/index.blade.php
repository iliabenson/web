@extends('app')

@section('content')

	<h1>Recommended movies</h1>

	<hr/>

	@if (count($movies) > 0)

		@include('partials.movie_list')

	@else
		<h1>Sorry! We don't have any recommendations at this time.</h1>
	@endif

@stop