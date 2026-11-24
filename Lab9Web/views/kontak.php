<?php
$pesanStatus = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailInput = trim($_POST['email'] ?? '');
    if (validasiEmail($emailInput)) {
        $pesanStatus = '<div class="alert">Email <strong>' . e($emailInput) . '</strong> valid dan pesan berhasil diterima!</div>';
    } else {
        $pesanStatus = '<div class="alert alert-error">Format email tidak valid!</div>';
    }
}
?>
<section>
    <h2>Halaman Kontak</h2>
    <?= $pesanStatus ?>
    <form method="post" action="index.php?page=kontak">
        <div class="form-group">
            <label>Email Anda</label>
            <input type="text" name="email" placeholder="contoh@email.com" required>
        </div>
        <button type="submit" class="btn">Uji Validasi Email</button>
    </form>
</section>