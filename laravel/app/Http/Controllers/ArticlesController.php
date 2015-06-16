<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
	public function index(){
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id){
		$article = Article::findOrFail($id);

		// dd($article->published_at);

		return view('articles.show', compact('article'));

	}

	public function create(){
		return view('articles.create');
	}

	public function store(ArticleRequest $request){
		Article::create($request->all());

		return redirect('articles');
	}

	public function edit($id){
		$article = Article::findOrFail($id);

		return view('articles.edit', compact('article'));
	}

	public function update($id, ArticleRequest $request){ // order of id or request does not matter, they can be interchanged
		// can use generic Request $request instead of ArticleRequest $request.
		// generic request is an alternative to a Form Request, which is what we did in store function.
		// method injection: the Request object is instantiated by laravel on its own, it figures out what i need, this is true for all objects.
		$article = Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');
	}
}
