<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMoviePivot extends Model {

	protected $fillable = [
		'actor_id',
		'movie_id'
	];

}
