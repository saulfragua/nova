<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function error404(): void
    {
        http_response_code(404);

        $this->view('errors/404');
    }

    public function error403(): void
    {
        http_response_code(403);

        $this->view('errors/403');
    }

    public function error401(): void
    {
        http_response_code(401);

        $this->view('errors/401');
    }

    public function error500(): void
    {
        http_response_code(500);

        $this->view('errors/500');
    }
}