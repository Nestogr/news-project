<?php
$pageTitle = 'News List';
$news = $news ?? [];
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
                        <a href="/news/create" class="btn btn-success me-3"><i class="bi bi-plus-circle me-1"></i>Create News</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <span class="nav-link"><i class="bi bi-person-circle me-1"></i>Hello, <b><?php echo htmlspecialchars($_SESSION['user']); ?></b></span>
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
<?php
$navbar = ob_get_clean();
ob_start();
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-journal-text display-5 me-3 text-primary"></i>
                    <h2 class="fw-bold mb-0">News</h2>
                </div>
                <?php if (empty($news)): ?>
                    <div class="alert alert-info text-center"><i class="bi bi-info-circle me-1"></i>No news available yet.</div>
                <?php else: ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($news as $item): ?>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-file-earmark-text me-2 text-secondary"></i>
                                        <a href="/news/<?php echo $item['id']; ?>" class="fw-semibold text-decoration-none">
                                            <?php echo htmlspecialchars($item['title']); ?>
                                        </a>
                                        <div class="text-muted small mt-1">
                                            <?php echo htmlspecialchars(mb_strimwidth(strip_tags($item['content']), 0, 120, '...')); ?>
                                        </div>
                                    </div>
                                    <span class="badge bg-secondary"><i class="bi bi-chat-dots me-1"></i> <?php echo $item['comment_count']; ?> comments</span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
