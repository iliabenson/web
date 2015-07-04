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

class MoviesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$movies = Movie::latest('updated_at')->recommended()->get();

		return view('movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		return view('movies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MovieRequest $request){
		// Movie::create($request->all());
		$movie = new Movie($request->all());

		Auth::user()->movies()->save($movie);

		$actors = array_map('trim', explode(',', $request->actors));

		foreach ($actors as $actor) {
			$temp = Actor::firstOrNew(['name' => $actor]);
			$temp->save();

			$pivot = new ActorMoviePivot;
			$pivot->actor_id = $temp->id;
			$pivot->movie_id = $movie->id;

			// dd($movie, $temp, $pivot);

			$pivot->save();
		}

		return redirect('movies');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$movie = Movie::findOrFail($id);
		$actors = explode(',', $movie->actors);

		return view('movies.show', compact('movie', 'actors'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$movie = Movie::findOrFail($id);

		return view('movies.edit', compact('movie'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MovieRequest $request){
		// dd($request->title);
		$movie = Movie::findOrFail($id);

		$movie->update($request->all());

		return redirect('movies');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		//
	}

	// TODO: need to rewire to use people, that way can search for actors and director and other options if i choose to add them
	public function results(SearchRequest $request){
		$movies = Movie::where('title', $request->search)->orWhere('actors', $request->search)->get();

		return view('movies.results', compact('movies'));
	}

}
