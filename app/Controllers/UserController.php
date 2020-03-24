<?php

namespace App\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            'User1' => 1,
            'User2' => 2,
            'User3' => 3,
        ];
        $this->view->render('users/index', ['users' => $users]);
    }

    public function show()
    {
        $this->view->render('users/show');
    }

}