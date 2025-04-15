<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Inventaris dan Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">📦 Selamat Datang di Sistem Inventaris dan Peminjaman Barang</h2>

                <p class="text-center">Halo, <strong><?= $this->session->userdata('username') ?></strong>! Anda login sebagai <strong><?= $this->session->userdata('role') ?></strong>.</p>

                <div class="list-group">
                    <a href="<?= site_url('kategori') ?>" class="list-group-item list-group-item-action">📂 Kelola Kategori</a>
                    <a href="<?= site_url('barang') ?>" class="list-group-item list-group-item-action">📦 Kelola Barang</a>
                    <a href="<?= site_url('peminjaman') ?>" class="list-group-item list-group-item-action">📤 Peminjaman Barang</a>
                    <a href="<?= site_url('laporan') ?>" class="list-group-item list-group-item-action">📄 Laporan Peminjaman</a>
                    <a href="<?= site_url('auth/logout') ?>" class="list-group-item list-group-item-action text-danger">🚪 Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
