<?php

namespace App\Core;

class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../../views/' . $view . '.php';
    }
}
