<?php

/**
 * @var \CodeIgniter\View\View $this
 * @var string $npm
 * @var string $nama
 * @var string $prodi
 * @var string $angkatan
 * @var float $ipk
 * @var array $matkul
 */
?>
<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-person-circle"></i> Profil Mahasiswa</h4>
            </div>
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <!-- Bagian Kiri: Informasi Mahasiswa -->
                    <div class="col-md-8 order-2 order-md-1 mt-4 mt-md-0">
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">NPM</div>
                            <div class="col-sm-8"><?= esc((string) $npm) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Nama Lengkap</div>
                            <div class="col-sm-8"><?= esc((string) $nama) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Program Studi</div>
                            <div class="col-sm-8"><?= esc((string) $prodi) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Angkatan</div>
                            <div class="col-sm-8"><?= esc((string) $angkatan) ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">IPK</div>
                            <div class="col-sm-8">
                                <?php
                                $warna = $ipk >= 3.5 ? 'success' : ($ipk >= 3.0 ? 'warning' : 'danger');
                                ?>
                                <span class="badge bg-<?= $warna ?>"><?= esc((string) number_format($ipk, 2)) ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 fw-bold">Mata Kuliah</div>
                            <div class="col-sm-8">
                                <ul class="mb-0 ps-3">
                                    <?php foreach ($matkul as $mk): ?>
                                        <li><?= esc((string) $mk) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Kanan: Foto Profil -->
                    <div class="col-md-4 order-1 order-md-2 text-center">
                        <div class="p-3 border rounded bg-light shadow-sm">
                            <div class="mb-3">
                                <img src="<?= base_url('assets/css/img/profil.jpg') ?>"
                                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name=<?= urlencode($nama) ?>&amp;size=200&amp;background=0d6efd&amp;color=fff';"
                                    alt="Foto Profil <?= esc((string) $nama) ?>"
                                    class="img-fluid rounded-circle shadow"
                                    style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;">
                            </div>
                            <h6 class="fw-bold mb-1"><?= esc((string) $nama) ?></h6>
                            <span class="badge bg-primary mb-2"><?= esc((string) $npm) ?></span>
                            <p class="text-muted small mb-0"><i class="bi bi-person-badge"></i> Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>