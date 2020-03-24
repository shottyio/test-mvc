<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->view->render('home/index');
    }

    public function show()
    {
        $this->view->render('home/show');
    }
}