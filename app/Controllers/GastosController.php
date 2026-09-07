<?php

namespace App\Controllers;

use App\Core\Controller;

class GastosController extends Controller
{
    public function index(): void
    {
        $this->view('gastos/index');

        
    }
}
