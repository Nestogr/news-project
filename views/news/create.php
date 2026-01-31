<?php
$pageTitle = 'Create News';
$error = $error ?? null;
$user = $user ?? null;
ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/news">
            <i class="bi bi-newspaper me-2"></i> News Portal
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (isset($user) && isset($user['role']) && $user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <span class="nav-link"><i class="bi bi-person-circle me-1"></i>Hello, <b><?php echo htmlspecialchars($user['username']); ?></b> (admin)</span>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="btn btn-outline-danger ms-2"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php
$navbar = ob_get_clean();
ob_start();
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="fw-bold mb-4"><i class="bi bi-plus-circle me-2"></i>Create News</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="post" action="/news/create">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" id="title" name="title" type="text" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg" type="submit"><i class="bi bi-check-circle me-1"></i>Save News</button>
                            <a href="/news" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to News</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
