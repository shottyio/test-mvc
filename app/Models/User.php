<?php

namespace App\Models;

use App\Model;
use App\Property;

class User extends Model
{
    use Property;

    protected $id;

    protected $email;

    protected $password;

    public function table()
    {
        return 'users';
    }
}