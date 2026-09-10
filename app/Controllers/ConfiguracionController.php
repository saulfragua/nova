<?php

namespace App\Controllers;

use App\Core\Controller;

class ConfiguracionController extends Controller
{
    public function index(): void
    {
        $this->view('configuracion/index');

        
    }
}
