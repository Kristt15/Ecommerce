<?php
declare(strict_types=1);

// ── Bootstrap ──────────────────────────────────────────
require_once __DIR__ . '/config/session.php';
requireLogin();

// ── Guard ──────────────────────────────────────────────
if (empty($_SESSION['cart'])) {
    setFlash('warning', 'Keranjang belanja kosong.');
    header('Location: /ta2/cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Penjualan Online</title>
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
            <h1>Checkout</h1>
            <p>Lengkapi data penerima dan pembayaran.</p>
        </div>

        <?php require __DIR__ . '/includes/alert.php'; ?>

        <form action="proses/proses_checkout.php" method="post" class="feature-card">
            <p>
                <label>Nama Penerima<br>
                    <input type="text" name="nama_penerima" required>
                </label>
            </p>
            <p>
                <label>Alamat<br>
                    <textarea name="alamat" rows="4" required></textarea>
                </label>
            </p>
            <p>
                <label>Nomor Telepon<br>
                    <input type="tel" name="telepon" placeholder="081234567890" required>
                </label>
            </p>
            <p>
                <label>Metode Pembayaran<br>
                    <select name="metode_pembayaran" required>
                        <option value="">Pilih</option>
                        <option value="transfer">Transfer</option>
                        <option value="cod">COD</option>
                        <option value="kartu_kredit">Kartu Kredit</option>
                    </select>
                </label>
            </p>
            <p>
                <label>Catatan<br>
                    <textarea name="catatan" rows="2"></textarea>
                </label>
            </p>
            <button class="btn btn-primary" type="submit">Buat Pesanan</button>
        </form>
    </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>