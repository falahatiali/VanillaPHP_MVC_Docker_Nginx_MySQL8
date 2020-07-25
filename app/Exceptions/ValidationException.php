<?php


namespace App\Exceptions;


use Psr\Http\Message\RequestInterface;
use Throwable;

class ValidationException extends \Exception
{
    private $request;
    /**
     * @var array
     */
    private $errors;

    public function __construct(RequestInterface $request , array $errors) {

        $this->request = $request;
        $this->errors = $errors;
    }

    public function getPath()
    {
        return $this->request->getUri()->getPath();
    }

    public function getOldInput()
    {
        return $this->request->getParsedBody();
    }

    public function getErrors()
    {
        return $this->errors;
    }
}