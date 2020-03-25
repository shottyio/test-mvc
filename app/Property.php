<?php

namespace App;

trait Property
{
    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}