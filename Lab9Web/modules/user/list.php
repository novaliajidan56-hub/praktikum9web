<?php
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <h2>Data Pengguna</h2>
    <a href="index.php?page=user/add" class="btn">+ Tambah Pengguna</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)): ?>
                <tr><td colspan="5">Belum ada data pengguna.</td></tr>
            <?php else: ?>
                <?php foreach ($users as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= e($row['nama']) ?></td>
                    <td><?= e($row['email']) ?></td>
                    <td><?= e($row['role']) ?></td>
                    <td>
                        <a href="index.php?page=user/edit&id=<?= $row['id'] ?>" class="btn btn-secondary">Edit</a>
                        <form method="post" action="index.php?page=user/delete" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?');">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>