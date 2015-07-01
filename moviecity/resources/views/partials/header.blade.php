{!! Form::open(['url' => 'movies/results']) !!}
	<div class="form-group">
		<label for="search" class="col-xs-2 control-label hide">Search</label>
		<div class="col-xs-offset-2 col-xs-8 input-group">
			<input type="text" class="form-control input-lg input_black" id="search" placeholder="Enter Movie Title">
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary btn-lg">Search</button>
			</div>
		</div>
	</div>
{!! Form::Close() !!}