<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM comments ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNewsId($news_id)
    {
        $stmt = $this->db->prepare('SELECT c.*, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.news_id = ? ORDER BY c.created_at ASC');
        $stmt->execute([$news_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($news_id, $user_id, $content)
    {
        $stmt = $this->db->prepare('INSERT INTO comments (news_id, user_id, content, created_at) VALUES (?, ?, ?, NOW())');
        return $stmt->execute([$news_id, $user_id, $content]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
