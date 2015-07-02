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
	'category'
	];

	protected $dates = ['release'];

	public function scopeRecommended($query){
		$query->where('recommended', '=', 1);
	}

	// public function getSearchResultsAttrubute($query){
	// 	$query->where('title', )
	// }

	public function setReleaseAttribute($date){
		$this->attributes['release'] = Carbon::parse($date);
	}

	// public function setActorsAttribute($actors){
	// 	$this->attributes['actors'] = explode(',', $actors);
	// }
}
