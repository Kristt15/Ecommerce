<?php
declare(strict_types=1);

// ── Bootstrap ──────────────────────────────────────────
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/config/database.php';

// ── Data ───────────────────────────────────────────────
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header('Location: /ta2/index.php');
    exit;
}

$stmt = $conn->prepare('SELECT id, nama, harga, stok, deskripsi, gambar FROM produk WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$produk = $stmt->get_result()->fetch_assoc();

if (!$produk) {
    header('Location: /ta2/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($produk['nama'], ENT_QUOTES, 'UTF-8') ?> | Penjualan Online</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ta2/assets/css/style.css">
    <link rel="stylesheet" href="/ta2/assets/css/detail.css">
    <!-- we dont have deatil.cc -->
</head>
<body>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<main class="section">
    <div class="container">
        <?php require __DIR__ . '/includes/alert.php'; ?>

        <div class="detail-grid">
            <div class="detail-image">
                <?php
                $imgPath = 'assets/img/produk/' . basename($produk['gambar'] ?? '');
                if (!empty($produk['gambar']) && file_exists(__DIR__ . '/' . $imgPath)): ?>
                    <img src="/ta2/<?= htmlspecialchars($imgPath, ENT_QUOTES, 'UTF-8') ?>"
                         alt="<?= htmlspecialchars($produk['nama'], ENT_QUOTES, 'UTF-8') ?>">
                <?php else: ?>
                    <div class="detail-image-placeholder">📦</div>
                <?php endif; ?>
            </div>

            <div class="detail-body">
                <h1><?= htmlspecialchars($produk['nama'], ENT_QUOTES, 'UTF-8') ?></h1>
                <div class="product-price">Rp <?= number_format((float) $produk['harga'], 0, ',', '.') ?></div>
                <p class="product-stock">Stok: <?= (int) $produk['stok'] ?></p>
                <p><?= nl2br(htmlspecialchars($produk['deskripsi'] ?? '', ENT_QUOTES, 'UTF-8')) ?></p>

                <?php if ($produk['stok'] > 0): ?>
                    <form action="proses/proses_cart.php" method="post">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="produk_id" value="<?= (int) $produk['id'] ?>">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah"
                                min="1" max="<?= (int) $produk['stok'] ?>" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                <?php else: ?>
                    <p class="product-stock">Stok habis.</p>
                <?php endif; ?>

                <a href="index.php" class="btn btn-outline" style="margin-top:1rem;">← Kembali ke Katalog</a>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>