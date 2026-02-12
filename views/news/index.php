<?php
$pageTitle = 'News List';
$news = $news ?? [];
$user = $user ?? null;
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
