<?php


namespace App\Auth;


interface Hasher
{
    public function create($plain);

    public function check($plain , $hash);

    public function needsRehash($hash);
}