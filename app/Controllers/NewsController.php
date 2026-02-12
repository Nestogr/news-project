<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Comment;

class NewsController extends Controller
{
    private $newsModel;
    private $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->newsModel = new News();
        $this->userModel = new User();
    }

    public function index()
    {
        $news = $this->newsModel->getAllWithCommentCount();
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $this->userModel->findByUsername($_SESSION['user']);
        }
        $this->render('news/index', ['news' => $news, 'user' => $user]);
    }

    public function show($id)
    {
        $newsItem = $this->newsModel->getById($id);
        if (!$newsItem) {
            http_response_code(404);
            echo '404 Not Found';
            exit;
        }
        $user = null;
        if (isset($_SESSION['user'])) {
            $user = $this->userModel->findByUsername($_SESSION['user']);
        }
        $commentModel = new Comment();
        $comments = $commentModel->getByNewsId($id);
        $this->render('news/show', [
            'newsItem' => $newsItem,
            'user' => $user,
            'comments' => $comments,
        ]);
    }

    public function create()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $user = $this->userModel->findByUsername($_SESSION['user']);
        if (!$this->userModel->isAdmin($user)) {
            http_response_code(403);
            echo 'Forbidden';
            exit;
        }
        $this->render('news/create', ['user' => $user]);
    }

    public function store()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $user = $this->userModel->findByUsername($_SESSION['user']);
        if (!$this->userModel->isAdmin($user)) {
            http_response_code(403);
            echo 'Forbidden';
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            if ($title && $content) {
                $this->newsModel->create($title, $content, $user['id']);
                header('Location: /news');
                exit;
            } else {
                $error = 'Title and content are required.';
                $this->render('news/create', ['user' => $user, 'error' => $error]);
                return;
            }
        }
        header('Location: /news/create');
        exit;
    }


}
