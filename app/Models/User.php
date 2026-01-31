<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($username, $email, $password, $role = 'user')
    {
        $stmt = $this->db->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT), $role]);
    }

    public function isAdmin($user)
    {
        return isset($user['role']) && $user['role'] === 'admin';
    }
}
