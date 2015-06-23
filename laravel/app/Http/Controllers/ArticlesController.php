<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;

// use Illuminate\Http\Request;

class ArticlesController extends Controller {

	public function index(){
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id){
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}

	public function create(){
		return view('articles.create');
	}

	public function store(CreateArticleRequest $request){
		Article::create($request->all());

		return redirect('articles'); // why use a redirect here vs a view?
									// because using a view would require to pass in values, redirect just calls the articles page and routes takes care of rest.
	}

}
