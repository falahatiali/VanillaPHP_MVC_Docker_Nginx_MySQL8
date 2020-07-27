<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/27/20
 * Time: 9:05 PM
 */

namespace App\Controllers;


use App\Models\User;
use Doctrine\ORM\EntityManager;

class UsersController extends Controller
{

	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $db;

	public function __construct(EntityManager $db)
	{
		$this->db = $db;
	}

	public function index()
	{
		$users = $this->db->getRepository(User::class)->findAll();
	}
}
