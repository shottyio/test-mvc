<?php

namespace App\Controllers;

use App\Services\UserService as User;

class AuthController extends Controller
{
    public function login()
    {
       $this->view->render('auth/login');
    }

    public function register()
    {
        $user = new User();

        $user->register($_POST);

        $this->view->render('auth/register');
    }
}