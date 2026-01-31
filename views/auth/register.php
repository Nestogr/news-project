<?php
$pageTitle = 'Register';
$hideNavbar = true;
ob_start();
?>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Create account</h3>
                    </div>
                    <?php if (isset($error) && $error): ?>
                        <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <form method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" id="username" name="username" type="text" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" id="email" name="email" type="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" id="password" name="password" type="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg" type="submit">Register</button>
                            <a class="btn btn-outline-secondary" href="/login">Already have an account?</a>
                            <a class="btn btn-link mt-2" href="/">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
