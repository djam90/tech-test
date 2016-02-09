<?php

require_once __DIR__.'/../vendor/autoload.php';

define('APP_PATH', dirname(dirname(__FILE__)) . '/');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$request = Request::createFromGlobals();
$routes = include APP_PATH . 'app/routing.php';

$peopleFilename = APP_PATH . 'people.json';

// Common functions
require_once(APP_PATH . 'functions.php');

// Update the JSON data with the new data
if (!empty($request->get('people'))) {
    $data = $request->get('people');
    setPeopleFromFormInput($data, $peopleFilename);
}

// Get people from storage
$people = getPeopleFromJsonFile($peopleFilename);

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);

    ob_start();

    require_once(APP_PATH . 'app/pages/templates/header.php');
    include sprintf(APP_PATH . 'app/pages/%s.php', $_route);
    require_once(APP_PATH . 'app/pages/templates/footer.php');

    $response = new Response(ob_get_clean());

} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');
$response->send();