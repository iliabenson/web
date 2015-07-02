{!! Form::open(['action' => 'MoviesController@results']) !!}
	<div class="form-group">
		{!! Form::label('search', 'Search:', ['class' => 'col-xs-2 control-label hide']) !!}
		<div class="col-xs-offset-2 col-xs-8 input-group">
			{!! Form::text('search', null, ['class' => 'form-control input-lg input_black', 'placeholder' => 'Enter Movie Title']) !!}
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary btn-lg">Search</button>
			</div>
		</div>
	</div>
{!! Form::Close() !!}