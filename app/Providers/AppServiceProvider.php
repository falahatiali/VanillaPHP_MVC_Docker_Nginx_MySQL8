<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 3:29 PM
 */

class AppServiceProvider extends AbstractServiceProvider
{
	protected $provides = [
		RouteCollection::class,
		'response' ,
		'request' ,
		'emitter'
	];

	/**
	 * Use the register method to register items with the container via the
	 * protected $this->leagueContainer property or the `getLeagueContainer` method
	 * from the ContainerAwareTrait.
	 *
	 * @return void
	 */
	public function register()
	{
		$container = $this->getContainer();
		$container->share(RouteCollection::class , function () use($container){
			return new RouteCollection($container);
		});

		$container->share('response' , Response::class);
		$container->share('request' , function (){
			return ServerRequestFactory::fromGlobals(
				$_SERVER,$_GET,$_POST,$_COOKIE,$_FILES
			);
		});

		$container->share('emitter' , SapiEmitter::class);
	}
}
