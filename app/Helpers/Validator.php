<?php


namespace App\Helpers;


class Validator
{
    public function clean($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function length($value, $min, $max)
    {
        return !(mb_strlen($value) < $min || mb_strlen($value) > $max);
    }

    public function fields($data)
    {
        $fields = [];

        foreach ($data as $key => $value) {
            $fields[$key] = $this->clean($value);
        }
        return $fields;
    }
}