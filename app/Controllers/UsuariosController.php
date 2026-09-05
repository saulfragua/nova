<?php

namespace App\Controllers;

use App\Core\Controller;

class UsuariosController extends Controller
{
    public function index(): void
    {
        $this->view('usuarios/index');

        
    }
}
