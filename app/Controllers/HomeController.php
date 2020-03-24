<?php

namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User();

        $users = $user->all();

        $user->email = 'shotty@gmail.com';

        $user->password = 'tekken131';

        $user->save();

        $this->view->render('home/index', ['users' => $users]);
    }

    public function show()
    {
        $this->view->render('home/show');
    }
}