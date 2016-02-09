<?php

$peopleFilename = 'people.json';
require_once('functions.php');

// Update the JSON data with the new data
if (isset($_POST['people'])) {
    $data = $_POST['people'];
    setPeopleFromFormInput($data, $peopleFilename);
}

$people = getPeopleFromJsonFile($peopleFilename);

require_once('form.php');