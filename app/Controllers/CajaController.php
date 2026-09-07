<?php

namespace App\Controllers;

use App\Core\Controller;

class CajaController extends Controller
{
    public function index(): void
    {
        $this->view('caja/index');

        
    }
}
