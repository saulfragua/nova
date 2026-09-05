<?php

namespace App\Controllers;

use App\Core\Controller;

class RutasController extends Controller
{
    public function index(): void
    {
        $this->view('rutas/index');

        
    }
}
