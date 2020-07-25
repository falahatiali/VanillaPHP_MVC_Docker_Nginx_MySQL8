<?php


namespace App\Auth;


use http\Exception\RuntimeException;

class BcryptHasher implements Hasher
{

    public function create($plain)
    {
        $hash = password_hash($plain , PASSWORD_BCRYPT, $this->options());
        if (!$hash){
            throw new RuntimeException("Bcrypt not supported. ");
        }
        return $hash;
    }

    public function check($plain, $hash)
    {
    	return password_verify($plain , $hash);
    }

    public function needsRehash($hash)
    {
    }

    private function options()
    {
        return [
          'cost' => 12
        ];
    }
}
