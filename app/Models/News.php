<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class News
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllWithCommentCount()
    {
        $stmt = $this->db->query('SELECT n.*, (SELECT COUNT(*) FROM comments c WHERE c.news_id = n.id) as comment_count FROM news n ORDER BY n.created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM news WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $user_id)
    {
        $stmt = $this->db->prepare('INSERT INTO news (title, content, user_id, created_at) VALUES (?, ?, ?, NOW())');
        return $stmt->execute([$title, $content, $user_id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM news WHERE id = ?');
        return $stmt->execute([$id]);
    }

}
