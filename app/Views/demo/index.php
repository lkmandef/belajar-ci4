<?php

/**
 * @var \CodeIgniter\View\View $this
 * @var string $judul
 * @var string|int $tahun
 * @var array $warna
 * @var array $user
 * @var array $produk
 * @var bool $show_footer
 * @var string|null $promo
 */
?>
<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<h1><?= esc((string) $judul) ?></h1>
<p>Tahun: <?= $tahun ?></p>
<!-- Array flat dengan foreach -->
<h3>Daftar Warna:</h3>
<ul>
    <?php foreach ($warna as $w): ?>
        <li><?= esc((string) $w) ?></li>
    <?php endforeach; ?>
</ul>
<!-- Array asosiatif -->
<p>Nama: <?= esc((string) $user['nama']) ?> | Email: <?= esc((string) $user['email']) ?></p>
<!-- Array of array sebagai tabel -->
<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= esc((string) $p['nama']) ?></td>
                <td><?= format_rupiah($p['harga']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Conditional rendering -->
<?php if ($show_footer): ?>
    <p class='text-muted'>Dibuat tahun <?= $tahun ?></p>
<?php endif; ?>
<!-- Optional data -->
<?php if (!is_null($promo)): ?>
    <div class='alert alert-warning'><?= esc((string) $promo) ?></div>
<?php endif; ?>
<?php $this->endSection() ?>