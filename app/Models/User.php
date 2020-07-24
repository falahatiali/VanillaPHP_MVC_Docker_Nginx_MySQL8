<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 9:52 PM
 */

namespace App\Models;

/**
 * Class User
 * @Entity
 * @Table(name="users")
 */
class User extends Model
{
	/**
	 * @GeneratedValue(strategy="AUTO")
	 * @Id @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @name @Column(type="string")
	 */
	protected $name;

	/**
	 * @email @Column(type="string")
	 */
	protected $email;

	/**
	 * @password @Column(type="string")
	 */
	protected $password;


	/**
	 * @avatar @Column(type="string" , nullable=true)
	 */
	protected $avatar;

	/**
	 * @remember_token @Column(type="string")
	 */
	protected $remember_token;

	/**
	 * @remember_identifier @Column(type="string")
	 */
	protected $remember_identifier;
}
