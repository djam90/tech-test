<?php

require_once __DIR__.'/../vendor/autoload.php';

define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('PEOPLE_FILENAME', APP_PATH . 'people.json');


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel;

$request = Request::createFromGlobals();
$routes = include APP_PATH . 'app/routing.php';

// Common functions
require_once(APP_PATH . 'functions.php');

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $resolver = new HttpKernel\Controller\ControllerResolver();
    $controller = $resolver->getController($request);
    $arguments = $resolver->getArguments($request, $controller);
    $response = call_user_func_array($controller, $arguments);

} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');
$response->send();

function render_template($request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();

    require_once(APP_PATH . 'app/pages/templates/header.php');
    include sprintf(APP_PATH . 'app/pages/%s.php', $_route);
    require_once(APP_PATH . 'app/pages/templates/footer.php');

    return new Response(ob_get_clean());
}

function render($request, $data = []){
    extract($request->attributes->all(), EXTR_SKIP);
    extract($data);

    if(isset($viewName)) {
        $view = $viewName;
    } else {
        $view = $_route;
    }

    ob_start();

    require_once(APP_PATH . 'app/pages/templates/header.php');
    include sprintf(APP_PATH . 'app/pages/%s.php', $view);
    require_once(APP_PATH . 'app/pages/templates/footer.php');

    return new Response(ob_get_clean());
}