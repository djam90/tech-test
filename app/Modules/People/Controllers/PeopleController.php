<?php

namespace App\Modules\People\Controllers;

use App\View\View;
use Symfony\Component\HttpFoundation\Request;

class PeopleController {

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
        $viewName = 'Modules/People/Views/dashboard';
        return $this->view->render($request, compact('viewName'));
    }

    public function editAction(Request $request)
    {
        // Update the JSON data with the new data
        if (!empty($request->get('people'))) {
            $data = $request->get('people');
            setPeopleFromFormInput($data, PEOPLE_FILENAME);
        }

        // Get people from storage
        $people = getPeopleFromJsonFile(PEOPLE_FILENAME);

        $viewName = 'Modules/People/Views/edit';

        return $this->view->render($request, compact('people', 'viewName'));
    }
}