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
	{!! Form::textarea('actors', null, ['class' => 'form-control', 'placeholder' => 'Separate names with comma']) !!}
</div>

<!-- Director Form Input -->
<div class="form-group">
	{!! Form::label('director', 'Director:') !!}
	{!! Form::text('director', null, ['class' => 'form-control']) !!}
</div>

<!-- Release Date Form Input -->
<div class="form-group">
	{!! Form::label('release', 'Release Date:') !!}
	{!! Form::input('date', 'release', date('Y-m-d'), ['class' => 'form-control']) !!}

<!-- Rating Form Input -->
<div class="form-group">
	{!! Form::label('rating', 'Rating:') !!}<br>
	{!! Form::label('G','G:') !!}
	{!! Form::radio('rating', 'G') !!}
	{!! Form::label('PG','PG:') !!}
	{!! Form::radio('rating', 'PG') !!}
	{!! Form::label('PG-13','PG-13:') !!}
	{!! Form::radio('rating', 'PG-13') !!}
	{!! Form::label('R','R:') !!}
	{!! Form::radio('rating', 'R') !!}
</div>

<!-- Category Form Input -->
<div class="form-group">
	{!! Form::label('category', 'Category:') !!} <br>
	{!! Form::label('Drama','Drama:') !!}
	{!! Form::radio('category', 'Drama') !!}
	{!! Form::label('Action','Action:') !!}
	{!! Form::radio('category', 'Action') !!}
	{!! Form::label('Comedy','Comedy:') !!}
	{!! Form::radio('category', 'Comedy') !!}
	{!! Form::label('Suspense','Suspense:') !!}
	{!! Form::radio('category', 'Suspense') !!}
	{!! Form::label('Horror','Horror:') !!}
	{!! Form::radio('category', 'Horror') !!}
	{!! Form::label('Western','Western:') !!}
	{!! Form::radio('category', 'Western') !!}
	{!! Form::label('Romance','Romance:') !!}
	{!! Form::radio('category', 'Romance') !!}
</div>

<!-- Recommended Form Input -->
<div class="form-group">
	{!! Form::label('recommended', 'Recommended:') !!}
	{!! Form::checkbox('recommended', 1) !!}
</div>

<!-- submit Form Input -->
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
