<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-person-circle"></i> Profil Mahasiswa</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">NPM</div>
                    <div class="col-md-8"><?= esc($npm) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Nama Lengkap</div>
                    <div class="col-md-8"><?= esc($nama) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Program Studi</div>
                    <div class="col-md-8"><?= esc($prodi) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Angkatan</div>
                    <div class="col-md-8"><?= esc($angkatan) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">IPK</div>
                    <div class="col-md-8">
                        <?php
                        $warna = $ipk >= 3.5 ? 'success' : ($ipk >= 3.0 ? 'warning' : 'danger');
                        ?>
                        <span class="badge bg-<?= $warna ?>"><?= esc($ipk) ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 fw-bold">Mata Kuliah</div>
                    <div class="col-md-8">
                        <ul class="mb-0">
                            <?php foreach ($matkul as $mk): ?>
                                <li><?= esc($mk) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>