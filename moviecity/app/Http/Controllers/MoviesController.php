<?php namespace App\Http\Controllers;

use App\Movie;
use App\Actor;
use App\ActorMoviePivot;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\SearchRequest;
// use Illuminate\Http\Request;
// use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Auth;

// TODO: account for actors and movies of the same name, for now it just updates existing vs creating new
// TODO: add wiring and support for image upload, management, and database value lookup and display

class MoviesController extends Controller {

	public function index(){
		$movies = Movie::latest('updated_at')->recommended()->get();

		return view('movies.index', compact('movies'));
	}

	public function create(){
		return view('movies.create');
	}

	private function CreatePivotsAndActors($movie){
		$actors = array_map('trim', explode(',', $movie->actors));

		foreach ($actors as $actor) {
			$temp = Actor::firstOrNew(['name' => $actor]);
			$temp->save();

			ActorMoviePivot::create(['actor_id' => $temp->id, 'movie_id' => $movie->id]);
		}
	}

	public function store(MovieRequest $request){
		$movie = new Movie($request->all());

		Auth::user()->movies()->save($movie);

		$this->CreatePivotsAndActors($movie);

		return redirect('movies');
	}

	public function show($id){
		$movie = Movie::findOrFail($id);

		$actors = explode(',', $movie->actors);

		return view('movies.show', compact('movie', 'actors'));
	}

	private function DeletePivotsAndActors($movie){
		$actors = array_map('trim', explode(',', $movie->actors));

		ActorMoviePivot::where('movie_id', $movie->id)->delete();

		foreach ($actors as $actor){
			$temp = Actor::where('name', $actor)->first(); // fine because actors with same name get updated vs duplicated.
			if(ActorMoviePivot::where('actor_id', $temp->id)->first() == null){ // this is fine, pivot for target movie is already gone, so if one (first one) is found, it means that actor is in another movie
				$temp->delete();
			}
		}
	}

	public function edit($id){
		$movie = Movie::findOrFail($id);

		$this->DeletePivotsAndActors($movie);

		return view('movies.edit', compact('movie'));
	}

	public function update($id, MovieRequest $request){
		$movie = Movie::findOrFail($id);

		$movie->update($request->all());

		$this->CreatePivotsAndActors($movie);

		return redirect('movies');
	}

	public function destroy($id){
		//
	}

	// TODO: need to rewire to use people, that way can search for actors and director and other options if i choose to add them
	// TODO: use boorap to give search hints when typing in names
	// TODO: edit search engine and DBase to account for roles and search by director too.
	public function results(SearchRequest $request){
		$movies = Movie::where('title', $request->search)->get();

		$actors = Actor::where('name', $request->search)->get();

		return view('movies.results', compact('movies', 'actors'));
	}

	// public function actors($name){
	// 	return view('movies.actors');
	// }

}
