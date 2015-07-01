{{-- auth required
edit a movie entry --}}

@extends('app')

@section('content')

	<h1>Edit: {!! $movie->title !!}</h1>

	<hr/>

	{!! Form::model($movie, ['method' => 'PATCH', 'action' => ['MoviesController@update', $movie->id]]) !!}

		@include('partials.movie_entry', ['submitButtonText' => 'Update Movie'])

	{!! Form::close() !!}

	@include('errors.list')

@stop