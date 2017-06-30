<?php

namespace AP\Tinyurl;

use AP\Support\ServiceProvider as Base;

class ServiceProvider extends Base
{
	protected $defer = false;
	
	public function boot()
	{
		//if(!$this->app->routesAreCached()){require __DIR__.'/../routes/routes.php';}
		$this->registerRoutes();
		
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'tinyurl');
		$this->loadTranslationsFrom(__DIR__.'/../resources/langs', 'tinyurl');
		$this->loadMigrationsFrom(__DIR__.'/../migrations');
		
		$this->publishes([__DIR__.'/../config/config.php' => config_path('tinyurl.php')], 'config');
		$this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/tinyurl')], 'public');
	}
	
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tinyurl');
		
		$this->app->bind('AP\Tinyurl\Contract', 'AP\Tinyurl\Repository');
		
		$this->app->singleton('tinyurl', 'AP\Tinyurl\Contract');
	}
	
	public function provides()
	{
		return ['tinyurl'];
	}
	
	protected function registerRoutes()
	{
		$this->app['router']->group(['middleware' => 'web', 'prefix' => 'url', 'namespace' => 'Anutiger\Tinyurl'], function($router){
			$router->get('/', ['as' => 'tinyurl.index', 'uses' => 'Controller@index']);
			$router->get('create', ['as' => 'tinyurl.create', 'uses' => 'Controller@create']);
			$router->post('/', ['as' => 'tinyurl.store', 'uses' => 'Controller@store']);
			$router->get('{hash}', ['as' => 'tinyurl.show', 'uses' => 'Controller@show']);
			$router->get('{hash}/edit', ['as' => 'tinyurl.edit', 'uses' => 'Controller@edit']);
			$router->put('{hash}', ['as' => 'tinyurl.update', 'uses' => 'Controller@update']);
			$router->delete('{hash}', ['as' => 'tinyurl.delete', 'uses' => 'Controller@destroy']);
			$router->get('redirect/{hash}', ['as' => 'tinyurl.redirect', 'uses' => 'Controller@redirect']);
		});

		$this->app['router']->group(['middleware' => 'auth:api', 'prefix' => 'api/v1', 'namespace' => 'Anutiger\t\Http\Controllers\Api'], function($router){
			//$router->get('/', ['as' => 't.api.index.get', 'uses' => 'Controller@getIndex']);
			//$router->post('/', ['as' => 't.api.index.post', 'uses' => 'Controller@postIndex']);
		});
	}
}