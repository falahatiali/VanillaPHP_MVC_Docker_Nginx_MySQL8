<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 6:35 PM
 */

namespace App\Providers;


use App\Views\View;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider
{

	protected $provides = [
		View::class
	];
	/**
	 * Use the register method to register items with the container via the
	 * protected $this->container property or the `getContainer` method
	 * from the ContainerAwareTrait.
	 *
	 * @return void
	 */
	public function register()
	{
		$container = $this->getContainer();
		$config    = $container->get('config');

		$container->share(View::class , function () use($config) {
			$loader = new \Twig\Loader\FilesystemLoader(base_path("views"));

			$twig = new \Twig\Environment($loader , [
				'cache' => $config->get('cache.views.path'),
				'debug' => $config->get('app.debug')
			]);

			if ($config->get('app.debug')){
				$twig->addExtension(new \Twig\Extension\DebugExtension());
			}
			return new View($twig);
		});


	}
}
