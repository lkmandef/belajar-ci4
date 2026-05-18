<?php

/**
 * Partial view untuk menampilkan pesan alert
 * Usage di view: <?= view('partials/alert', ['type' => 'success', 'msg' =>
'Berhasil!']) ?>
 *
 * @var string|null $type
 * @var string|null $msg
 */
?>
<?php if (!empty($msg)): ?>
    <div class='alert alert-<?= esc((string) ($type ?? 'info')) ?> alert-dismissible fade show'
        role='alert'>
        <i class='bi bi-<?= $type === 'success' ? 'check-circle' : ($type === 'danger' ?
                            'x-circle' : 'info-circle') ?>'></i>
        <?= esc((string) $msg) ?>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    </div>
<?php endif; ?>