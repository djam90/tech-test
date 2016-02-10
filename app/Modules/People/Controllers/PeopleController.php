<?php

namespace App\Modules\People\Controllers;

use App\Modules\People\PeopleRepository;
use App\View\View;
use Exception;
use Symfony\Component\HttpFoundation\Request;

class PeopleController
{
    /**
     * @var View
     */
    private $view;

    /**
     * @var PeopleRepository
     */
    private $peopleRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->peopleRepository = new PeopleRepository();
    }

    public function indexAction(Request $request)
    {
        $viewName = 'Modules/People/Views/dashboard';
        return $this->view->render($request, compact('viewName'));
    }

    public function editAction(Request $request)
    {
        $csrfToken = $request->getSession()->get('csrf_token');

        // Update the JSON data with the new data
        if (!empty($request->get('people'))) {

            // Check CSRF vulnerability
            if (!$request->get('csrf_token')) {
                throw new Exception("No Token Found");
            } else {
                if ($request->get('csrf_token') !== $csrfToken) {
                    throw new Exception('Token Mismatch');
                }
            }

            $data = $request->get('people');
            $this->peopleRepository->setPeople($data);
        }

        // Get people from storage
        $people = $this->peopleRepository->getPeople();

        $viewName = 'Modules/People/Views/edit';

        return $this->view->render($request, compact('people', 'viewName', 'csrfToken'));
    }
}