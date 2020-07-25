<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 6:22 PM
 */

namespace App\Controllers;


use App\Views\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
	/**
	 * @var \App\Views\View
	 */
	private $view;
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $db;

	/**
	 * HomeController constructor.
	 * @param \App\Views\View             $view
	 */
	public function __construct(View $view)
	{
		$this->view = $view;
	}

	public function home(RequestInterface $request , ResponseInterface $response)
	{
		return $this->view->render($response , 'home.twig' , [] );
	}
}
