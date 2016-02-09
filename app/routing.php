<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('home', new Route('/'));
$routes->add('people', new Route('/people'));
$routes->add('people/edit', new Route('/people/edit', [
    '_controller' => 'peopleEdit',
]));

return $routes;