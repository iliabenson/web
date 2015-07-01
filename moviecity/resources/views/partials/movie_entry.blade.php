<!-- Title Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Form Input -->
<div class="form-group">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Actors Form Input -->
<div class="form-group">
	{!! Form::label('actors', 'Actors:') !!}
	{!! Form::textarea('actors', null, ['class' => 'form-control']) !!}
</div>

<!-- Director Form Input -->
<div class="form-group">
	{!! Form::label('director', 'Director:') !!}
	{!! Form::text('director', null, ['class' => 'form-control']) !!}
</div>

<!-- Writer Form Input -->
<div class="form-group">
	{!! Form::label('writer', 'Writer:') !!}
	{!! Form::text('writer', null, ['class' => 'form-control']) !!}
</div>

<!-- Publisher Form Input -->
<div class="form-group">
	{!! Form::label('publisher', 'Publisher:') !!}
	{!! Form::text('publisher', null, ['class' => 'form-control']) !!}
</div>

<!-- Release Date Form Input -->
<div class="form-group">
	{!! Form::label('release', 'Release Date:') !!}
	{!! Form::input('date', 'release', date('Y'), ['class' => 'form-control']) !!}
</div>

<!-- submit Form Input -->
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
