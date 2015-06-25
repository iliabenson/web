<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		// can be used to overwrite the default logic for fetching the record. so can use 'where' to find specific instance.
		// research this more though
		// $router->bind('articles', function($id){
		// 	return \App\Article::published()->findOrFail($id);
		// });

		$router->model('articles', 'App\Article'); // binding the model Article to the route articles. no i dont have to search for it, it will be available in all routes. so any route called articles with or without an 'articles' (because laravel makes them have the same name by default) wild card will map to the Article model and the wild card will be evaluated on the spot, the requested object will be fetched on the spot and passed to the underlying route method.
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
