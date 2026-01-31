<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentController
{
    private $commentModel;
    private const JSON_HEADER = 'Content-Type: application/json';

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function index()
    {
        $comments = $this->commentModel->getAll();
        header(self::JSON_HEADER);
        echo json_encode($comments);
    }

    public function store()
    {
        $user_id = $_POST['user_id'] ?? null;
        $news_id = $_POST['news_id'] ?? null;
        $content = $_POST['content'] ?? '';
        $result = $this->commentModel->create($user_id, $news_id, $content);
        header(self::JSON_HEADER);
        echo json_encode(['success' => $result]);
    }

    public function delete()
    {
        $id = $_POST['id'] ?? null;
        $result = $this->commentModel->delete($id);
        header(self::JSON_HEADER);
        echo json_encode(['success' => $result]);
    }

    public function storeForNews($news_id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $content = $_POST['content'] ?? '';
        if (!$content) {
            header('Location: /news/' . $news_id);
            exit;
        }
        $username = $_SESSION['user'];
        $userModel = new \App\Models\User();
        $user = $userModel->findByUsername($username);
        if (!$user) {
            header('Location: /login');
            exit;
        }
        $this->commentModel->create($news_id, $user['id'], $content);
        header('Location: /news/' . $news_id);
        exit;
    }
}
