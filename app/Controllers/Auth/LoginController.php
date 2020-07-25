<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 11:05 PM
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Views\View;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller
{

	/**
	 * @var \App\Views\View
	 */
	private $view;

	public function __construct(View $view)
	{
		$this->view = $view;
	}

	public function loginForm(RequestInterface $request , ResponseInterface $response)
	{
		return $this->view->render($response , 'auth/login.twig');
	}

	public function login(RequestInterface $request , ResponseInterface $response)
	{
		$this->validate($request , [
//		    'username'  => ['required' , 'email' , 'min' => [] ,[ 'regex' =>'/^[A-Za-z]\w+$/' ]],
		    'email'     => ['required' , 'email' , ['lengthMin', 10]],
		    'password'  => ['required' ,  ['lengthMin', 8]],
        ]);
	}
}
