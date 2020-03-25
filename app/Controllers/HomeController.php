<?php

namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User();

        $users = $user->all();

        $this->view->render('home/index', ['users' => $users]);
    }

    public function show()
    {
        $this->view->render('home/show');
    }
}