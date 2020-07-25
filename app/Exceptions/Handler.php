<?php

namespace App\Exceptions;

use App\Session\SessionStore;
use ReflectionClass;

class Handler
{
    /**
     * @var \Exception
     */
    protected $exception;
    /**
     * @var SessionStore
     */
    private $session;

    /**
     * Handler constructor.
     * @param \Exception $exception
     * @param SessionStore $session
     */
    public function __construct(\Exception $exception, SessionStore $session)
    {
        $this->exception = $exception;
        $this->session = $session;
    }

    public function respond()
    {
        $class = (new ReflectionClass($this->exception))->getShortName();

        if (method_exists($this , $method = "handle{$class}")){
            return $this->{$method}($this->exception);
        }

        $this->unhandleException($this->exception);
    }

    public function handleValidationException(\Exception $exception)
    {
        $this->session->set([
            'errors' => $exception->getErrors(),
            'old'    => $exception->getOldInput()
        ]);
        return redirect($exception->getPath());
    }

    private function unhandleException(\Exception $exception)
    {
        throw $exception;
    }
}