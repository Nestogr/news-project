<?php
$pageTitle = 'Create News';
$error = $error ?? null;
$user = $user ?? null;
ob_start();
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="fw-bold mb-4"><i class="bi bi-plus-circle me-2"></i>Create News</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
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
