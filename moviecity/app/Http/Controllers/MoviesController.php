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
// TODO: use bootstrap to give search hints when typing in names
// TODO: add wiring and support for image upload, management, and database value lookup and display
// TODO: add dynamic field support for person entry and change actor to person with a role field. that way writer and director can be people and actors and search can be extended to them too.
// TODO: split the request for store and updates for movie input and person input, somehow need to have that one form trigger two controllers, one for movies and one for people. if thats not possible then leave as is, its partitioned enough to be abstract.
// TODO: rename movies.index to recommendations, fix all broken links that occur there after.

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

		// this can become a query scope
		$pivots = ActorMoviePivot::where('movie_id', $id)->get();

		foreach ($pivots as $pivot){
			$actors[] = Actor::find($pivot->actor_id);
		}

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
		$movie = Movie::findOrFail($id);

		$this->DeletePivotsAndActors($movie);

		$movie->delete();

		return redirect('movies');
	}

	public function results(SearchRequest $request){
		$movies = Movie::where('title', $request->search)->get();

		$actors = Actor::where('name', $request->search)->get();

		return view('movies.results', compact('movies', 'actors'));
	}
}
