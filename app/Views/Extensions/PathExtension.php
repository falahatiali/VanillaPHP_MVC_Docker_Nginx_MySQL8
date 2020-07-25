<?php


namespace App\Views\Extensions;


use League\Route\RouteCollection;
use Twig\Extension\AbstractExtension;

class PathExtension extends AbstractExtension
{

    /**
     * @var RouteCollection
     */
    protected $route;

    public function __construct(RouteCollection $route)
    {

        $this->route = $route;
    }

    public function getFunctions()
    {
        return [
          new \Twig\TwigFunction('route' , [ $this, 'route'])
        ];
    }

    public function route($name)
    {
        return $this->route->getNamedRoute($name)->getPath();
    }
}