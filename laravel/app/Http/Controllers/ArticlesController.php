<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
// use Illuminate\Http\Request;
// use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Auth; // needed for Auth in store. look up facades http://laravel.com/docs/5.1/facades
									// you can think of facades as pointers to a registered underlying class.
									// facades allow you to call methods on objects without actually having the instance of said object. a facade will get the object you want and then call the public method you specify on it. Article below is an eloquent model object, thus it has methods and a facade that go with it out of the box, thanks laravel.
									// Auth works the same way, so does User. they are all models, made by laravel, that come out of the box

class ArticlesController extends Controller {

	public function __construct(){
		// look up middleware, in a nutshell it is basically extra functionality that is processed in between client request and server response, like check if your logged in.
		$this->middleware('auth', ['only' => 'create']); // can be attached at the route level directly or with an anonymous function. 
		// if you do create your own middleware (via php artisan), make sure to enable it in Requests->Kernel, can make global (each request gets checked) or route specific (creates keyword and is assigned to route, like auth above).
	}

	public function index(){
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show(Article $article){
		// $article = Article::findOrFail($id); dont need to search for the article anymore since i binded the model Article to all routes in ArticleController, they each now have access to the Article object when they are called

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

	public function edit(Article $article){
		// $article = Article::findOrFail($id);

		return view('articles.edit', compact('article'));
	}

	public function update(Article $article, ArticleRequest $request){
		// $article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}

}
