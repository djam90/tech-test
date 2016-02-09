<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class PeopleController {

    public function editAction(Request $request)
    {
        // Get people from storage
        $people = getPeopleFromJsonFile(PEOPLE_FILENAME);

        return render($request, compact('people'));
    }
}