<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    private $email;

    private $password;

    public function table()
    {
        return 'users';
    }
}