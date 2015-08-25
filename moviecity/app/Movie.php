<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	protected $fillable = [
	'title',
	'description',
	'actors',
	'director',
	'release',
	'recommended',
	'rating',
	'category',
	'user_id' //temp???
	];

	protected $dates = ['release'];

	public function scopeRecommended($query){ // query scope
		$query->where('recommended', '=', 1);
	}

	public function setReleaseAttribute($date){ // mutator
		$this->attributes['release'] = Carbon::parse($date);
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
