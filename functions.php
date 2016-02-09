<?php

function dd($var)
{
    var_dump($var);
    die();
}

function getPeopleFromJsonFile($file)
{
    return json_decode(file_get_contents($file), true);
}

function setPeopleFromFormInput($data, $file)
{
    $jsonData = json_encode($data);
    file_put_contents($file, $jsonData);
}