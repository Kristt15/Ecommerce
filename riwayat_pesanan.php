<?php
declare(strict_types=1);

// ── Bootstrap ──────────────────────────────────────────
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/config/database.php';
requireLogin();

// ── Data ───────────────────────────────────────────────
$stmt = $conn->prepare('SELECT id, total, status, created_at FROM pesanan WHERE user_id = ? ORDER BY created_at DESC');
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$orders = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan | Penjualan Online</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ta2/assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<main class="section">
    <div class="container">
        <div class="section-head">
            <h1>Riwayat Pesanan</h1>
        </div>

        <?php require __DIR__ . '/includes/alert.php'; ?>

        <?php if ($orders === []): ?>
            <div class="empty-state">
                <p>Belum ada pesanan.</p>
                <a href="index.php#produk" class="btn btn-primary">Mulai Belanja</a>
            </div>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <article class="feature-card" style="margin-bottom:1rem;">
                    <h3>Pesanan #<?= (int) $order['id'] ?></h3>
                    <p>Status: <?= htmlspecialchars($order['status'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>Total: Rp <?= number_format((float) $order['total'], 0, ',', '.') ?></p>
                    <small><?= htmlspecialchars($order['created_at'], ENT_QUOTES, 'UTF-8') ?></small>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>