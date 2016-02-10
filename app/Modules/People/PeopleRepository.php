<?php

namespace App\Modules\People;

class PeopleRepository
{
    protected $filePath = APP_PATH . 'people.json';

    public function getPeople()
    {
        $jsonData = $this->getPeopleJsonFromFile();
        return json_decode($jsonData, true);
    }

    public function setPeople($data)
    {
        $jsonData = json_encode($data);
        file_put_contents($this->filePath, $jsonData);
    }

    public function getPeopleJsonFromFile()
    {
        return file_get_contents($this->filePath);
    }

    public function setFilepath($filePath)
    {
        $this->filePath = $filePath;
    }
}