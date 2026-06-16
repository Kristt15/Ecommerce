<?php
require_once __DIR__ . '/config/session.php';

$error_code = isset($_GET['code']) ? htmlspecialchars($_GET['code']) : '500';
$message    = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'Terjadi kesalahan pada sistem.';

$titles = [
    '403' => 'Akses Ditolak',
    '404' => 'Halaman Tidak Ditemukan',
    '500' => 'Error Server',
];
$title = $titles[$error_code] ?? 'Terjadi Error';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $error_code ?> | Penjualan Online</title>
    <link rel="stylesheet" href="assets/css/error.css">
</head>
<body class="page-error">
    <div class="error-card">
        <div class="error-code"><?= $error_code ?></div>
        <h1 class="error-title"><?= $title ?></h1>
        <p class="error-message"><?= $message ?></p>

        <?php if ($flash = getFlash()): ?>
            <div style="padding:10px;margin-bottom:1rem;border-radius:6px;
                background:#fef2f2;color:#b91c1c;border:1px solid #fecaca;">
                <?= htmlspecialchars($flash['message']) ?>
            </div>
        <?php endif; ?>

        <div class="error-buttons">
            <a href="index.php" class="btn-home">Kembali ke Beranda</a>
            <a href="javascript:history.back()" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>