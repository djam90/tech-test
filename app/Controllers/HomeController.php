<?php

namespace App\Controllers;

use App\View\View;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    /**
     * @var View
     */
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function indexAction(Request $request)
    {
        return $this->view->render($request, compact('home'));
    }
}