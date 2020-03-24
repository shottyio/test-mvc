<?php

namespace App;

class View
{
    public function render($view, array $data = [])
    {
        if(!empty($data))  extract($data);

        include __DIR__ . '/../views/' . $view . '.php';
    }
}