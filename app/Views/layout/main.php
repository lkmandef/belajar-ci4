<!DOCTYPE html>
<html lang='id'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= isset($title) ? esc($title) . ' - MyApp' : 'MyApp' ?></title>
    <!-- Bootstrap 5 CSS -->
    <link
        href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
        rel='stylesheet'>
    <!-- Bootstrap Icons -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css'
        rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel='stylesheet' href='<?= base_url('assets/css/custom.css') ?>'>
</head>

<body>
    <!-- NAVBAR -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary shadow-sm'>
        <div class='container'>
            <a class='navbar-brand' href='<?= base_url('/') ?>'>
                <i class='bi bi-book'></i> PerpustakaanKu
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navMenu'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navMenu'>
                <ul class='navbar-nav me-auto'>
                    <li class='nav-item'>
                        <a class='nav-link <?= (current_url() == base_url('/')) ?
                                                'active' : '' ?>'
                            href='<?= base_url('/') ?>'>
                            <i class='bi bi-house'></i> Beranda
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?= str_contains(current_url(), '/buku') ?
                                                'active' : '' ?>'
                            href='<?= base_url('buku') ?>'>
                            <i class='bi bi-journals'></i> Buku
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='<?= base_url('tentang') ?>'>
                            <i class='bi bi-info-circle'></i> Tentang
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?= str_contains(current_url(), '/profil') ? 'active' : '' ?>'
                            href='<?= base_url('profil') ?>'>
                            <i class='bi bi-person'></i> Profil
                        </a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link <?= str_contains(current_url(), '/galeri') ? 'active' : '' ?>'
                            href='<?= base_url('galeri') ?>'>
                            <i class='bi bi-images'></i> Galeri
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?= str_contains(current_url(), '/kategori') ? 'active' : '' ?>'
                            href='<?= base_url('kategori') ?>'>
                            <i class='bi bi-tags'></i> Kategori
                        </a>
                    </li>
                    <?php if (session()->get('role') === 'admin'): ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle <?= str_contains(current_url(), '/admin') ? 'active' : '' ?>' href='#' id='adminDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='bi bi-shield-lock'></i> Admin Area
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='adminDropdown'>
                                <li><a class='dropdown-item' href='<?= base_url('admin') ?>'><i class='bi bi-speedometer2 me-2'></i>Dashboard</a></li>
                                <li><a class='dropdown-item' href='<?= base_url('admin/pengguna') ?>'><i class='bi bi-people me-2'></i>Manajemen Pengguna</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class='navbar-nav align-items-center'>
                    <?php if (session()->get('logged_in')): ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle d-flex align-items-center gap-1 text-light' href='#' id='userDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='bi bi-person-circle fs-5'></i>
                                <span><?= esc(session()->get('nama')) ?></span>
                            </a>
                            <ul class='dropdown-menu dropdown-menu-end shadow-sm' aria-labelledby='userDropdown'>
                                <li><a class='dropdown-item' href='<?= base_url('profil') ?>'><i class='bi bi-person me-2'></i>Profil Saya</a></li>
                                <li><a class='dropdown-item' href='<?= base_url('akun/ganti-password') ?>'><i class='bi bi-key me-2'></i>Ganti Password</a></li>
                                <li>
                                    <hr class='dropdown-divider'>
                                </li>
                                <li><a class='dropdown-item text-danger' href='<?= base_url('logout') ?>'><i class='bi bi-box-arrow-right me-2'></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class='nav-item'>
                            <a class='btn btn-outline-light btn-sm ms-2' href='<?= base_url('login') ?>'>
                                <i class='bi bi-box-arrow-in-right'></i> Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- BREADCRUMB (jika tersedia) -->
    <?php if (isset($breadcrumb)): ?>
        <div class='bg-white border-bottom py-2'>
            <div class='container'>
                <nav aria-label='breadcrumb'>
                    <ol class='breadcrumb mb-0'>
                        <li class='breadcrumb-item'>
                            <a href='<?= base_url('/') ?>'>Beranda</a>
                        </li>
                        <?php $totalCrumb = count($breadcrumb); ?>
                        <?php foreach ($breadcrumb as $index => $crumb): ?>
                            <?php if ($index === $totalCrumb - 1): ?>
                                <li class='breadcrumb-item active'><?=
                                                                    esc($crumb['label']) ?></li>
                            <?php else: ?>
                                <li class='breadcrumb-item'>
                                    <a href='<?= esc($crumb['url']) ?>'><?=
                                                                        esc($crumb['label']) ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </nav>
            </div>
        </div>
    <?php endif; ?>
    <!-- KONTEN UTAMA -->
    <main class='container py-4'>
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('sukses')): ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <i class='bi bi-check-circle-fill me-2'></i>
                <?= esc(session()->getFlashdata('sukses')) ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <i class='bi bi-exclamation-triangle-fill me-2'></i>
                <?= esc(session()->getFlashdata('error')) ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('info')): ?>
            <div class='alert alert-info alert-dismissible fade show' role='alert'>
                <i class='bi bi-info-circle-fill me-2'></i>
                <?= esc(session()->getFlashdata('info')) ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
        <?php endif; ?>
        <!-- SECTION KONTEN HALAMAN -->
        <?= $this->renderSection('content') ?>
    </main>
    <!-- END KONTEN UTAMA -->
    <!-- FOOTER -->
    <footer class='py-4 mt-5 bg-dark text-light'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-6'>
                    <h5><i class='bi bi-book'></i> PerpustakaanKu</h5>
                    <p class='text-muted'>Sistem Informasi Perpustakaan Digital</p>
                </div>
                <div class='col-md-6 text-md-end'>
                    <p class='text-muted mb-1'>Dibangun dengan CodeIgniter 4</p>
                    <p class='text-muted'>&copy; <?= date('Y') ?> Praktikum Pemrograman
                        Web 2</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- Bootstrap 5 JS -->
    <script
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'>
    </script>
    <!-- Page-specific Scripts Section -->
    <?= $this->renderSection('scripts') ?>

</body>

</html>