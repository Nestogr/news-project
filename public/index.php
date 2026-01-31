<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\NewsController;
use App\Controllers\AuthController;
use App\Controllers\CommentController;
use FastRoute\RouteCollector;

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', [NewsController::class, 'index']);
    $r->addRoute('GET', '/news', [NewsController::class, 'index']);
    $r->addRoute('GET', '/news/create', [NewsController::class, 'create']);
    $r->addRoute('POST', '/news/create', [NewsController::class, 'store']);
    $r->addRoute('GET', '/news/{id:\d+}', [NewsController::class, 'show']);
    $r->addRoute('POST', '/news/{id:\d+}/comment', [CommentController::class, 'storeForNews']);

    $r->addRoute(['GET', 'POST'], '/login', [AuthController::class, 'login']);
    $r->addRoute(['GET', 'POST'], '/register', [AuthController::class, 'register']);
    $r->addRoute('GET', '/logout', [AuthController::class, 'logout']);

    $r->addRoute('GET', '/api/comments', [CommentController::class, 'index']);
    $r->addRoute('POST', '/api/comments', [CommentController::class, 'store']);
    $r->addRoute('POST', '/api/comments/delete', [CommentController::class, 'delete']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$class, $method] = $handler;
        (new $class())->$method(...array_values($vars));
        break;
}
