<?php

require_once __DIR__.'/../vendor/autoload.php';

define('APP_PATH', dirname(dirname(__FILE__)) . '/');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

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

$map = array(
    '/' => APP_PATH . '/app/pages/form.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {

    ob_start();

    require_once('../app/pages/templates/header.php');
    require $map[$path];
    require_once('../app/pages/templates/footer.php');

    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');
$response->send();