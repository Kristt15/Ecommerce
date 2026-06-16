<?php
declare(strict_types=1);

// ── Bootstrap ──────────────────────────────────────────
require_once __DIR__ . '/config/session.php';

// ── Data ───────────────────────────────────────────────
$cart  = $_SESSION['cart'] ?? [];
$total = 0.0;

foreach ($cart as $item) {
    $total += (float) $item['harga'] * (int) $item['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | Penjualan Online</title>
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
            <h1>Keranjang Belanja</h1>
        </div>

        <?php require __DIR__ . '/includes/alert.php'; ?>

        <?php if ($cart === []): ?>
            <div class="empty-state">
                <p>Keranjang masih kosong.</p>
                <a class="btn btn-primary" href="index.php#produk">Belanja Sekarang</a>
            </div>
        <?php else: ?>
            <?php foreach ($cart as $item): ?>
                <article class="feature-card" style="margin-bottom:1rem;">
                    <h3><?= htmlspecialchars($item['nama_produk'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p>Rp <?= number_format((float) $item['harga'], 0, ',', '.') ?></p>
                    <form action="proses/proses_cart.php" method="post" class="product-actions">
                        <input type="hidden" name="produk_id" value="<?= (int) $item['produk_id'] ?>">
                        <input type="number" name="jumlah" min="1" value="<?= (int) $item['jumlah'] ?>">
                        <button class="btn btn-outline" name="action" value="update">Perbarui</button>
                        <button class="btn btn-outline" name="action" value="remove">Hapus</button>
                    </form>
                </article>
            <?php endforeach; ?>

            <h2>Total: Rp <?= number_format($total, 0, ',', '.') ?></h2>

            <div class="product-actions" style="margin-top:1rem;">
                <form action="proses/proses_cart.php" method="post">
                    <button class="btn btn-outline" name="action" value="clear">Kosongkan</button>
                </form>
                <a class="btn btn-primary" href="checkout.php">Lanjut Checkout</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>