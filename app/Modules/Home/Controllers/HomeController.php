<?php

namespace App\Modules\Home\Controllers;

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
        $viewName = 'Modules/Home/Views/home';
        return $this->view->render($request, compact('home', 'viewName'));
    }
}