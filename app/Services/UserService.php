<?php

namespace App\Services;

use App\Models\User;
use App\Helpers\Validator;

class UserService
{
    public function login()
    {

    }

    public function register($data)
    {
        $validate = new Validator();

        $fields = $validate->fields($data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($validate->empty($fields)) {
                echo 'Все поля очищенны и не пустые';
            } else echo 'Поля пустые';
//            var_dump($validate->length($fields['password'], 5, 10));
////            echo '<pre>';
////            print_r($_POST);
////            echo '</pre>';
//            $user = new User();
//            $user->email = $fields['email'];
//            $user->password = $fields['password'];
//            $user->save();
        }
    }
}