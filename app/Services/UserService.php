<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function login()
    {

    }

    public function register($data)
    {
        if (!empty($data)) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
            $user = new User();
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->save();
        }
    }
}