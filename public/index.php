<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 1:34 PM
 */

require_once __DIR__ . '/../bootstrap/app.php';

$container->get('emitter')->emit($response);
