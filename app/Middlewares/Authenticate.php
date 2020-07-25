<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/25/20
 * Time: 11:24 PM
 */

namespace App\Middlewares;


use App\Auth\Auth;
use App\Session\SessionStore;

class Authenticate
{
	/**
	 * @var \App\Auth\Auth
	 */
	private $auth;

	/**
	 * Authenticate constructor.
	 * @param \App\Auth\Auth $auth
	 */
	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	public function __invoke($request , $response , callable $next)
	{
		if ($this->auth->hasUserInSession()){
			try{
				$this->auth->setUserFromSession();
			}catch (\Exception $exception){
//				$this->auth->logout()
			}
		}

		return $next($request , $response);
	}
}
