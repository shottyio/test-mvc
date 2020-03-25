<?php

namespace App\Models;

use App\Model;
use App\Property;

class User extends Model
{
    use Property;

    private $email;

    private $password;

    public function table()
    {
        return 'users';
    }
}