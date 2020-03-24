<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    public function fetchAll()
    {
        return $this->query("SELECT * FROM `users`");
    }
}