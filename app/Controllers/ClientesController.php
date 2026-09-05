<?php

namespace App\Controllers;

use App\Core\Controller;

class ClientesController extends Controller
{
    public function index(): void
    {
        $this->view('clientes/index');

        
    }
}
