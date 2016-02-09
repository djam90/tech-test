<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function indexAction(Request $request)
    {
        return render($request, compact('home'));
    }
}