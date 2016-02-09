<?php

/**
 * Debug function
 *
 * @param $var
 */
function dd($var)
{
    var_dump($var);
    die();
}

/**
 * Get array of people from JSON file
 *
 * @param $file
 * @return mixed
 */
function getPeopleFromJsonFile($file)
{
    $jsonData = file_get_contents($file);
    return json_decode($jsonData, true);
}

/**
 * Set JSON data from POST array
 *
 * @param $data
 * @param $file
 */
function setPeopleFromFormInput($data, $file)
{
    $jsonData = json_encode($data);
    file_put_contents($file, $jsonData);
}