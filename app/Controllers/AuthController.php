<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $userModel;
    private const LOGIN_LOCATION = 'Location: /login';

    public function __construct()
    {
        $this->userModel = new User();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['username'];
                header('Location: /news');
                exit;
            } else {
                $error = 'Invalid credentials';
            }
        }
        $this->render('auth/login', ['error' => $error]);
    }

    public function register()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            if ($this->userModel->findByUsername($username)) {
                $error = 'Username already taken.';
            } elseif ($this->userModel->findByEmail($email)) {
                $error = 'Email already registered.';
            } else {
                $this->userModel->create($username, $email, $password);
                header(self::LOGIN_LOCATION);
                exit;
            }
        }
        $this->render('auth/register', ['error' => $error]);
    }

    public function logout()
    {
        session_destroy();
        header(self::LOGIN_LOCATION);
        exit;
    }

    private function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../../views/' . $view . '.php';
    }
}
