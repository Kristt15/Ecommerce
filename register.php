<?php
require_once __DIR__ . '/config/session.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Penjualan Online</title>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="page-auth">
<main class="section">
    <div class="container">
        <div class="auth-card">
            <h1 class="auth-title">Buat Akun</h1>

            <?php if ($flash = getFlash()): ?>
                <div style="padding:10px;margin-bottom:1rem;border-radius:6px;
                    background:#fef2f2;color:#b91c1c;border:1px solid #fecaca;">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="proses/proses_register.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" style="width:100%;padding:0.75rem;background:#2563eb;
                    color:#fff;border:none;border-radius:8px;font-size:1rem;
                    font-weight:600;cursor:pointer;">Register</button>
            </form>

            <p class="auth-footer">Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
        </div>
    </div>
</main>
</body>
</html>