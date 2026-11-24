<?php
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role  = trim($_POST['role'] ?? 'Mahasiswa');

    if ($nama === '' || !validasiEmail($email)) {
        $error = 'Nama wajib diisi dan format email harus valid.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, role) VALUES (?, ?, ?)");
        $stmt->execute([$nama, $email, $role]);
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
    <h2>Tambah Pengguna</h2>
    <?php if ($error): ?>
        <div class="alert alert-error"><?= e($error) ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=user/add">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn">Simpan</button>
        <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
    </form>
</section>