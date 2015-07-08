<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Movie;
use App\Actor;
use App\ActorMoviePivot;

class ActorsController extends Controller {

	public function actor($id){
		$actor = Actor::findOrFail($id);

		// this can become a query scope
		$pivots = ActorMoviePivot::where('actor_id', $id)->get();

		foreach ($pivots as $pivot){
			$movies[] = Movie::find($pivot->movie_id);
		}

		return view('actors.actor', compact('actor', 'movies'));
	}
}
