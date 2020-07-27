<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 6:22 PM
 */

namespace App\Controllers;


use App\Auth\Auth;
use App\Models\User;
use App\Session\SessionStore;
use App\Views\View;
use Doctrine\ORM\EntityManager;
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
	 * @var \App\Auth\Auth
	 */
	private $auth;

	public function __construct(View $view , EntityManager $db , Auth $auth)
	{
		$this->view = $view;
		$this->db = $db;
		$this->auth = $auth;
	}

	public function home(RequestInterface $request , ResponseInterface $response)
	{
		dump($this->db->getRepository(User::class)->findAll());
		if ($this->auth->check()){
			$users = $this->db->getRepository(User::class)->findAll();
		}else{
			$users = [];
		}
		return $this->view->render($response , 'home.twig' , ['users' => $users] );
	}
}
