<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 6:42 PM
 */

namespace App\Views;


use Psr\Http\Message\ResponseInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class View
{
	/**
	 * @var \Twig\Environment
	 */
	protected $twig;

	public function __construct(\Twig\Environment $twig)
	{
		$this->twig = $twig;
	}

	public function render(ResponseInterface $response , $view , $data = [])
	{
		try {
			$response->getBody()->write(
				$this->twig->render($view, $data)
			);
		} catch (LoaderError $e) {
		} catch (RuntimeError $e) {
		} catch (SyntaxError $e) {
		}

		return $response;
	}

    public function share(array $data)
    {
        foreach ($data as $key => $value) {
            $this->twig->addGlobal($key , $value);
        }
	}
}
