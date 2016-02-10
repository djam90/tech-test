<?php

namespace App\Tests;

use App\TechTest\Framework;
use App\Modules\People\PeopleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class PeopleRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPeopleJson()
    {
        define('APP_PATH', dirname(dirname(dirname(__FILE__))) . '/');
        $filePath = APP_PATH . 'people.json';

        $repository = new PeopleRepository();
        $jsonData = $repository->getPeopleJsonFromFile();

        $this->assertJsonStringEqualsJsonFile($filePath, $jsonData);
    }

    public function testGetPeople()
    {
        $filePath = APP_PATH . 'people.json';
        $actualJson = file_get_contents($filePath);
        $actualArray = json_decode($actualJson, true);

        $repository = new PeopleRepository();
        $arrayData = $repository->getPeople();

        $this->assertEquals($actualArray, $arrayData);
    }

    public function testSetPeople()
    {
        $tempFilePath = APP_PATH . 'test_people.json';
        $repository = new PeopleRepository();
        $repository->setFilepath($tempFilePath);

        $data = [
            [
                'firstname' => 'Daniel',
                'surname' => 'Twigg'
            ],
            [
                'firstname' => 'Foo',
                'surname' => 'Bar'
            ]
        ];

        $repository->setPeople($data);

        $this->assertJsonStringEqualsJsonFile($tempFilePath, json_encode($data));

        unlink($tempFilePath);
    }
}