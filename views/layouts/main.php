<?php
if (!isset($pageTitle)) {
    $pageTitle = 'News Portal';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.js"></script>
</head>
<body>
<?php if (empty($hideNavbar)): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/news">
            <i class="bi bi-newspaper me-2"></i> News Portal
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (isset($user) && isset($user['role']) && $user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a href="/news/create" class="btn btn-success me-3"><i class="bi bi-plus-circle me-1"></i>Create News</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($user) && isset($user['username'])): ?>
                    <li class="nav-item">
                        <span class="nav-link"><i class="bi bi-person-circle me-1"></i>Hello, <b><?= htmlspecialchars($user['username']) ?></b><?= ($user['role'] === 'admin') ? ' (admin)' : '' ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="btn btn-outline-danger ms-2"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-primary me-2"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i>Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>
    <main class="container py-5">
        <?php if (isset($content)) {
            echo $content;
        } ?>
    </main>
</body>
</html>
