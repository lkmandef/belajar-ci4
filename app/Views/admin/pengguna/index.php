<?php

/**
 * @var \CodeIgniter\View\View $this
 * @var string $title
 * @var array $users
 */
?>
<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2><i class="bi bi-people"></i> Manajemen Pengguna</h2>
        <p class="text-muted mb-0">Total: <?= count($users) ?> pengguna terdaftar</p>
    </div>
</div>

<?php if (empty($users)): ?>
    <div class="text-center py-5">
        <i class="bi bi-inbox display-1 text-muted"></i>
        <h4 class="mt-3 text-muted">Tidak ada pengguna ditemukan</h4>
    </div>
<?php else: ?>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th width="60">No.</th>
                            <th>Pengguna</th>
                            <th width="220">Role</th>
                            <th width="200">Status Akun</th>
                            <th width="180">Login Terakhir</th>
                            <th width="150">Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $i => $u): ?>
                            <?php $isSelf = ($u['id'] === (int) session()->get('user_id')); ?>
                            <tr>
                                <td class="text-center"><?= $i + 1 ?></td>
                                <td>
                                    <strong><?= esc((string) $u['nama_lengkap']) ?></strong>
                                    <?php if ($isSelf): ?>
                                        <span class="badge bg-primary ms-1">Anda</span>
                                    <?php endif; ?>
                                    <br>
                                    <small class="text-muted">
                                        <i class="bi bi-person"></i> <?= esc((string) $u['username']) ?> | 
                                        <i class="bi bi-envelope"></i> <?= esc((string) $u['email']) ?>
                                    </small>
                                </td>
                                <td>
                                    <?php if ($isSelf): ?>
                                        <span class="badge bg-dark fs-6"><?= ucfirst(esc((string) $u['role'])) ?></span>
                                        <small class="d-block text-muted mt-1">Tidak dapat diubah sendiri</small>
                                    <?php else: ?>
                                        <form action="<?= base_url('admin/pengguna/ubah-role/' . $u['id']) ?>" method="POST" class="d-flex align-items-center gap-1">
                                            <select name="role" class="form-select form-select-sm">
                                                <option value="admin" <?= $u['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                                <option value="petugas" <?= $u['role'] === 'petugas' ? 'selected' : '' ?>>Petugas</option>
                                                <option value="anggota" <?= $u['role'] === 'anggota' ? 'selected' : '' ?>>Anggota</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary" title="Simpan Perubahan Role" onclick="return confirm('Yakin ingin mengubah role <?= esc((string) $u['username'], 'js') ?>?')">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <?= status_badge($u['aktif'] ? 'aktif' : 'nonaktif') ?>
                                        <?php if ($isSelf): ?>
                                            <button class="btn btn-sm btn-outline-secondary" disabled title="Tidak dapat menonaktifkan akun sendiri">
                                                <i class="bi bi-shield-lock"></i> Permanen
                                            </button>
                                        <?php else: ?>
                                            <form action="<?= base_url('admin/pengguna/toggle-aktif/' . $u['id']) ?>" method="POST" class="d-inline">
                                                <button type="submit" class="btn btn-sm <?= $u['aktif'] ? 'btn-outline-danger' : 'btn-outline-success' ?>" title="<?= $u['aktif'] ? 'Nonaktifkan Akun' : 'Aktifkan Akun' ?>" onclick="return confirm('Yakin ingin <?= $u['aktif'] ? 'menonaktifkan' : 'mengaktifkan' ?> akun <?= esc((string) $u['username'], 'js') ?>?')">
                                                    <i class="bi bi-power"></i> <?= $u['aktif'] ? 'Nonaktifkan' : 'Aktifkan' ?>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if (!empty($u['last_login'])): ?>
                                        <small><?= format_tanggal($u['last_login']) ?><br><span class="text-muted"><?= date('H:i:s', strtotime($u['last_login'])) ?> WIB</span></small>
                                    <?php else: ?>
                                        <span class="text-muted small">Belum pernah</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <small><?= format_tanggal($u['created_at']) ?></small>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>
