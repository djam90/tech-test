<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class PeopleController {

    public function indexAction(Request $request)
    {
        $viewName = 'people/dashboard';
        return render($request, compact('viewName'));
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

        return render($request, compact('people'));
    }
}