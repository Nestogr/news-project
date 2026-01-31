<?php
$pageTitle = 'News Detail';
$newsItem = $newsItem ?? ['title' => '', 'content' => '', 'id' => 0];
$comments = $comments ?? [];
$user = $user ?? null;
ob_start();
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="fw-bold mb-0">News Detail</h2>
                    </div>
                    <h3 class="mb-3"><?php echo htmlspecialchars($newsItem['title']); ?></h3>
                    <p class="mb-4"><?php echo nl2br(htmlspecialchars($newsItem['content'])); ?></p>
                    <a href="/news" class="btn btn-outline-secondary">Back to News</a>
                </div>
            </div>
            <!-- Comments Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="mb-3"><i class="bi bi-chat-dots me-2"></i>Comments (<?php echo count($comments); ?>)</h4>
                    <?php if (empty($comments)): ?>
                        <div class="alert alert-info">No comments yet. Be the first to comment!</div>
                    <?php else: ?>
                        <ul class="list-group mb-4">
                            <?php foreach ($comments as $comment): ?>
                                <li class="list-group-item">
                                    <b><?php echo htmlspecialchars($comment['username']); ?>:</b>
                                    <span><?php echo nl2br(htmlspecialchars($comment['content'])); ?></span>
                                    <span class="text-muted small float-end"><?php echo date('Y-m-d H:i', strtotime($comment['created_at'])); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (isset($user)): ?>
                    <form method="post" action="/news/<?php echo $newsItem['id']; ?>/comment">
                        <div class="mb-3">
                            <label for="commentContent" class="form-label">Add a comment</label>
                            <textarea class="form-control" id="commentContent" name="content" rows="3" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="bi bi-send"></i> Post Comment</button>
                    </form>
                    <?php else: ?>
                        <div class="alert alert-warning mt-3">You must <a href="/login">login</a> to comment.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
