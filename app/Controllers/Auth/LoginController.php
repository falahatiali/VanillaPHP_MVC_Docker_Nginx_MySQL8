<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 11:05 PM
 */

namespace App\Controllers\Auth;


use App\Auth\Auth;
use App\Controllers\Controller;
use App\Views\View;
use League\Route\RouteCollection;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller
{

	/**
	 * @var \App\Views\View
	 */
	private $view;
	/**
	 * @var \App\Auth\Auth
	 */
	private $auth;
	/**
	 * @var \League\Route\RouteCollection
	 */
	private $route;

	/**
	 * LoginController constructor.
	 * @param \App\Views\View               $view
	 * @param \App\Auth\Auth                $auth
	 * @param \League\Route\RouteCollection $route
	 */
	public function __construct(View $view, Auth $auth, RouteCollection $route)
	{
		$this->view = $view;
		$this->auth = $auth;
		$this->route = $route;
	}

	public function loginForm(RequestInterface $request , ResponseInterface $response)
	{
		return $this->view->render($response , 'auth/login.twig');
	}

	public function login(RequestInterface $request , ResponseInterface $response)
	{
		$data = $this->validate($request , [
		    'email'     => ['required' , 'email' , ['lengthMin', 10]],
		    'password'  => ['required' ,  ['lengthMin', 8]],
        ]);

		$attempt = $this->auth->attempt($data['email'] , $data['password']);

		if (!$attempt){
			dump('failed');
		}

		return redirect($this->route->getNamedRoute('home')->getPath());
	}

	public function logout($request, $response)
	{
		$this->auth->logout();

		return redirect('/');
	}
}
