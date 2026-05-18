<?php

/**
 * @var \CodeIgniter\View\View $this
 * @var string $title
 * @var array $galeri
 * @var array $kategori_unik
 * @var string $kategori_aktif
 */
?>
<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>

<div class='container'>
    <h1 class='mb-4'><i class='bi bi-images'></i> Galeri</h1>

    <!-- Filter Kategori -->
    <div class='mb-4'>
        <h5>Filter Kategori:</h5>
        <div class='d-flex flex-wrap gap-2'>
            <a href='<?= base_url('galeri') ?>' class='btn btn-outline-primary btn-sm <?= $kategori_aktif === 'semua' ? 'active' : '' ?>'>
                Semua
            </a>
            <?php foreach ($kategori_unik as $kat): ?>
                <a href='<?= base_url('galeri?kategori=' . esc((string) $kat)) ?>' class='btn btn-outline-secondary btn-sm <?= $kategori_aktif === $kat ? 'active' : '' ?>'>
                    <?= esc(ucfirst((string) $kat)) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Grid Galeri -->
    <div class='row g-4'>
        <?php foreach ($galeri as $item): ?>
            <div class='col-md-4'>
                <div class='card h-100'>
                    <img src='<?= esc((string) $item['url_gambar']) ?>' class='card-img-top' alt='<?= esc((string) $item['judul']) ?>'>
                    <div class='card-body'>
                        <h5 class='card-title'><?= esc((string) $item['judul']) ?></h5>
                        <p class='card-text'><?= esc(truncate_text((string) $item['deskripsi'], 100)) ?></p>
                        <span class='badge bg-info'><?= esc(ucfirst((string) $item['kategori'])) ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($galeri)): ?>
        <div class='alert alert-info'>
            <i class='bi bi-info-circle'></i> Tidak ada gambar dalam kategori ini.
        </div>
    <?php endif; ?>
</div>

<?php $this->endSection() ?>

<!-- Page-specific scripts for Galeri -->
<?php $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Galeri page loaded successfully');

        // Example: Add click handler to gallery cards
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('click', function() {
                console.log('Card clicked:', this.querySelector('.card-title').textContent);
            });
        });
    });
</script>
<?php $this->endSection() ?>