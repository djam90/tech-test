<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

require_once __DIR__.'/../vendor/autoload.php';

define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('PEOPLE_FILENAME', APP_PATH . 'people.json');

$request = Request::createFromGlobals();
$routes = include APP_PATH . 'app/routing.php';

// Common functions
require_once(APP_PATH . 'functions.php');

$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);
$resolver = new ControllerResolver();

$framework = new App\TechTest\Framework($matcher, $resolver);
$response = $framework->handle($request);

$response->send();