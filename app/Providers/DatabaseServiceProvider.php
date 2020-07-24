<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 9:44 PM
 */

namespace App\Providers;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use League\Container\ServiceProvider\AbstractServiceProvider;

class DatabaseServiceProvider extends AbstractServiceProvider
{

	protected $provides = [
		EntityManager::class
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

		$container->share(EntityManager::class , function () use($config) {

			$entityManager = EntityManager::create(
				$config->get('db.'. env('DB_TYPE')),

				Setup::createAnnotationMetadataConfiguration([
					[base_path('app')],
					$config->get('app.debug')
				]));

			return $entityManager;

		});
	}
}
