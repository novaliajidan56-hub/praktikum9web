<?php
$hargaAsli = 250000;
$hargaDiskon = hitungDiskon($hargaAsli, 15);
$deskripsi = "Aplikasi ini dibangun menggunakan konsep PHP Modular dengan pemisahan template, library function, router whitelist, dan integrasi CRUD database.";
?>
<section>
    <h2>Halaman Home (Dashboard)</h2>
    <p><?= e(ringkasTeks($deskripsi, 95)) ?></p>

    <h3>Demo Library Function</h3>
    <ul>
        <li>Harga Awal: <strong><?= formatRupiah($hargaAsli) ?></strong></li>
        <li>Harga Setelah Diskon 15%: <strong><?= formatRupiah($hargaDiskon) ?></strong></li>
    </ul>
</section>