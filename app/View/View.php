<?php

namespace App\View;

use Symfony\Component\HttpFoundation\Response;

class View
{
    public function render($request, $data = [])
    {
        extract($request->attributes->all(), EXTR_SKIP);
        extract($data);

        if(isset($viewName)) {
            $view = $viewName;
        } else {
            $view = $_route;
        }

        ob_start();

        require_once(APP_PATH . 'app/pages/templates/header.php');
        include sprintf(APP_PATH . 'app/pages/%s.php', $view);
        require_once(APP_PATH . 'app/pages/templates/footer.php');

        return new Response(ob_get_clean());
    }
}