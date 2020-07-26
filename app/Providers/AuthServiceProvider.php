<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/25/20
 * Time: 10:18 PM
 */

namespace App\Providers;


use App\Auth\Auth;
use App\Auth\Hasher;
use App\Session\SessionStore;
use Doctrine\ORM\EntityManager;
use League\Container\ServiceProvider\AbstractServiceProvider;

class AuthServiceProvider extends AbstractServiceProvider
{
	protected $provides =[
		Auth::class
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
		$container->share(Auth::class , function () use ($container){
			return new Auth(
				$container->get(EntityManager::class),
				$container->get(Hasher::class),
				$container->get(SessionStore::class)
			);
		});
	}
}
