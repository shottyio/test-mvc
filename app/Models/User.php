<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    public $email;

    public $password;

    public function table()
    {
        return 'users';
    }
}