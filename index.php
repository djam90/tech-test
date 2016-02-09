<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$peopleFilename = 'people.json';

// Common functions
require_once('functions.php');

// Update the JSON data with the new data
if (!empty($request->get('people'))) {
    $data = $request->get('people');
    setPeopleFromFormInput($data, $peopleFilename);
}

// Get people from storage
$people = getPeopleFromJsonFile($peopleFilename);

require_once('views/header.php');

// Include the HTML page
require_once('form.php');

require_once('views/footer.php');