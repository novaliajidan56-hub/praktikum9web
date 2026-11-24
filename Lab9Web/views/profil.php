<?php
$bio = "Mahasiswa kelas I252A dengan NIM 312510177 yang sedang menyelesaikan praktikum pemrograman web berbasis PHP Modular.";
?>
<section>
    <h2>Halaman Profil</h2>
    <p><strong>Nama:</strong> Nauvali Ajidan Pratama Putra</p>
    <p><strong>NIM:</strong> 312510177</p>
    <p><strong>Kelas:</strong> I252A</p>
    <p><strong>Ringkasan Bio:</strong> <?= e(ringkasTeks($bio, 80)) ?></p>
</section>