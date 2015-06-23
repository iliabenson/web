@extends('app')

@section('content')

	<h1>Write A New Article</h1>

	<hr/>

	{!! Form::open(['action' => 'ArticlesController@store']) !!} {{-- action takes you to the URI of where the corresponding controller points. however, this will be a request. can substitute @store with @show --}}

		@include('partials.form', ['submitButtonText' => 'Add Article'])

	{!! Form::Close() !!}

	@include('errors.list')
@stop