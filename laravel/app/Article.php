<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id' // temporary
	];

	protected $dates = ['published_at']; // tells eloquent that published_at should be treated as carbon instance. NOT SURE HOW THIS WORKS.
	// is dates a special variable that is recognized by eloquent/mysql/laravel?

	public function scopePublished($query){
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnpublished($query){
		$query->where('published_at', '>', Carbon::now());
	}

	public function setPublishedAtAttribute($date){ // this is a mutator. it takes a an element of one type and mutates it to another type.
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
