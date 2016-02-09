<?php

$peopleFilename = 'people.json';

// Common functions
require_once('functions.php');

// Update the JSON data with the new data
if (isset($_POST['people'])) {
    $data = $_POST['people'];
    setPeopleFromFormInput($data, $peopleFilename);
}

// Get people from storage
$people = getPeopleFromJsonFile($peopleFilename);

require_once('views/header.php');

// Include the HTML page
require_once('form.php');

require_once('views/footer.php');