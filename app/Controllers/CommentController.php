<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    private $commentModel;

    public function __construct()
    {
        parent::__construct();
        $this->commentModel = new Comment();
    }

    public function storeForNews($news_id)
    {
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
