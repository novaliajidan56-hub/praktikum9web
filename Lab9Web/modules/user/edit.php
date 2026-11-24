<?php
$id = (int) ($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo '<div class="alert alert-error">Data tidak ditemukan.</div>';
    echo '<a href="index.php?page=user/list" class="btn">Kembali</a>';
    return;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role  = trim($_POST['role'] ?? 'Mahasiswa');

    if ($nama === '' || !validasiEmail($email)) {
        $error = 'Nama wajib diisi dan format email harus valid.';
    } else {
        $update = $pdo->prepare("UPDATE users SET nama = ?, email = ?, role = ? WHERE id = ?");
        $update->execute([$nama, $email, $role, $id]);
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
    <h2>Edit Pengguna</h2>
    <?php if ($error): ?>
        <div class="alert alert-error"><?= e($error) ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=user/edit&id=<?= $user['id'] ?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= e($user['nama']) ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= e($user['email']) ?>" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="Mahasiswa" <?= $user['role'] === 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                <option value="Admin" <?= $user['role'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn">Update</button>
        <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
    </form>
</section>