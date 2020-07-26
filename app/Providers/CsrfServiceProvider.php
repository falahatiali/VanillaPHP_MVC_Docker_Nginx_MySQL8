<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/26/20
 * Time: 9:33 PM
 */

namespace App\Providers;


use App\Security\Csrf;
use App\Session\SessionStore;
use League\Container\ServiceProvider\AbstractServiceProvider;

class CsrfServiceProvider extends AbstractServiceProvider
{

	protected $provides = [Csrf::class];
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
		$container->share(Csrf::class , function () use( $container ){
			return new Csrf($container->get(SessionStore::class));
		});
	}
}
