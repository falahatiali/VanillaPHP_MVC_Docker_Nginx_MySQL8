<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 8:27 PM
 */

namespace App\Config\Loaders;


class ArrayLoader implements Loader
{
	/**
	 * @var array
	 */
	private $files;

	public function __construct(array $files)
	{
		$this->files = $files;
	}

	public function parse()
	{
		$parsed = [];

		foreach ($this->files as $namespace => $path) {
			try {
				$parsed[$namespace] = require $path;
			} catch (\Exception $e) {
				//
			}
		}

		return $parsed;
	}
}
