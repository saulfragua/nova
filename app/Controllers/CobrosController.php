<?php

namespace App\Controllers;

use App\Core\Controller;

class CobrosController extends Controller
{
    public function index(): void
    {
        $this->view('cobros/index');

        
    }
}
