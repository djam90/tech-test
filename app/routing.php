<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('home', new Route('/', [
    '_controller' => 'App\\Modules\\Home\\Controllers\\HomeController::indexAction'
]));

$routes->add('people', new Route('/people', [
    '_controller' => 'App\\Modules\\People\\Controllers\\PeopleController::indexAction'
]));

$routes->add('people/edit', new Route('/people/edit', [
    '_controller' => 'App\\Modules\\People\\Controllers\\PeopleController::editAction',
]));

return $routes;