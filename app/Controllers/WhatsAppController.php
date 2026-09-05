<?php

namespace App\Controllers;

use App\Core\Controller;

class WhatsAppController extends Controller
{
    public function index(): void
    {
        $this->view('whatsapp/index');

        
    }
}
