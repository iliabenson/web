<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
// use Illuminate\Http\Request;
// use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Auth; // needed for Auth in store. look up facades http://laravel.com/docs/5.1/facades

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

	public function store(ArticleRequest $request){
		$article = new Article($request->all());

		// Auth::user()->articles would return a collections, since we want to continue to chain methods we have to reference articles as a method
		Auth::user()->articles()->save($article);

		// Article::create($request->all());

		return redirect('articles'); // why use a redirect here vs a view?
									// because using a view would require to pass in values, redirect just calls the articles page and routes takes care of rest.
	}

	public function edit($id){
		$article = Article::findOrFail($id);

		return view('articles.edit', compact('article'));
	}

	public function update($id, ArticleRequest $request){
		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}

}
