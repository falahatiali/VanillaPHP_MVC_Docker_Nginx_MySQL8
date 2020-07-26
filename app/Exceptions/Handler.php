<?php

namespace App\Exceptions;

use App\Session\SessionStore;
use App\Views\View;
use Psr\Http\Message\ResponseInterface;
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
	 * @var \App\Views\View
	 */
	private $view;
	/**
	 * @var \Psr\Http\Message\ResponseInterface
	 */
	private $response;

	/**
	 * Handler constructor.
	 * @param \Exception                          $exception
	 * @param \Psr\Http\Message\ResponseInterface $response
	 * @param SessionStore                        $session
	 * @param \App\Views\View                     $view
	 */
    public function __construct(\Exception $exception,ResponseInterface $response, SessionStore $session , View $view)
    {
        $this->exception = $exception;
        $this->session = $session;
		$this->view = $view;
		$this->response = $response;
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


	protected function handleCsrfTokenException(\Exception $e)
	{
		return $this->view->render($this->response, 'errors/csrf.twig');
	}

    private function unhandleException(\Exception $exception)
    {
        throw $exception;
    }
}
