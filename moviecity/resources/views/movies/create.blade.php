{{-- auth required
create a movie entry --}}

@extends('app')

@section('content')

	<h1>Create A New Movie Entry</h1>

	<hr/>

	{!! Form::open(['action' => 'MoviesController@store']) !!}

		@include('partials.movie_entry', ['submitButtonText' => 'Add Movie'])

	{!! Form::Close() !!}

@stop