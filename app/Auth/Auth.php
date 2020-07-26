<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/25/20
 * Time: 10:18 PM
 */

namespace App\Auth;


use App\Models\User;
use App\Session\SessionStore;
use Doctrine\ORM\EntityManager;

class Auth
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $db;
	/**
	 * @var \App\Auth\Hasher
	 */
	private $hash;
	/**
	 * @var \App\Session\SessionStore
	 */
	private $session;

	protected $user;

	/**
	 * Auth constructor.
	 * @param \Doctrine\ORM\EntityManager $db
	 * @param \App\Auth\Hasher            $hash
	 * @param \App\Session\SessionStore   $session
	 */
	public function __construct(EntityManager $db, Hasher $hash, SessionStore $session)
	{

		$this->db = $db;
		$this->hash = $hash;
		$this->session = $session;
	}

	public function attempt($username  , $password)
	{
		$user  = $this->getByEmailOrUsername($username);

		if (!$user && !$this->hasValidCredential($user , $password)){
			return false;
		}

		$this->setUserSession($user);

		return true;
	}

	public function hasValidCredential($user, $password)
	{
		if (!$user instanceof User){
			return false;
		}

		return $this->hash->check($password , $user->password);
	}

	public function user()
	{
		return $this->user;
	}

	public function check()
	{
		return $this->hasUserInSession();
	}

	public function getByEmailOrUsername($username){
		if (filter_var($username, FILTER_VALIDATE_EMAIL)){
			$compare = ['email' => $username];
		}else{
			$compare = ['username' => $username];
		}
		return $this->db->getRepository(User::class)->findOneBy($compare);
	}

	private function setUserSession($user)
	{
		$this->session->set($this->key(), $user->id);
	}

	private function key()
	{
		return 'id' ;
	}

	public function hasUserInSession(){
		return $this->session->exists($this->key());
	}

	public function setUserFromSession(){
		$user = $this->getById($this->session->get($this->key()));

		if (!$user){
			throw new \Exception("User is not loged in");
		}

		$this->user = $user;
	}

	private function getById($id)
	{
		return $this->db->getRepository(User::class)->find($id);
	}

}
