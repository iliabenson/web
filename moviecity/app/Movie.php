<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	protected $fillable = [
		'title',
		'description',
		'actors',
		'director',
		'writer',
		'publisher',
		'release'
	];

	protected $dates = ['release'];

	public function setReleaseAttribute($date){
		$this->attributes['release'] = Carbon::parse($date);
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	// TODO: add functionality to that can search movies <-> actors and directors and writers
}
