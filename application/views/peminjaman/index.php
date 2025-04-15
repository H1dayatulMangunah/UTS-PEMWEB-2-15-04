<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h3 class="text-center text-primary mb-4">📤 Data Peminjaman</h3>

            <!-- Tombol Dashboard dan Tambah -->
            <div class="d-flex justify-content-between mb-3">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary">🔙 Kembali ke Dashboard</a>
                <a href="<?= site_url('peminjaman/tambah') ?>" class="btn btn-success">➕ Tambah</a>
            </div>

            <!-- Flashdata Notifikasi -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <!-- Tabel Peminjaman -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-light">
                    <tr>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peminjaman as $p): ?>
                    <tr>
                        <td><?= $p->nama_peminjam ?></td>
                        <td><?= $p->nama_barang ?></td>
                        <td><?= $p->jumlah ?></td>
                        <td><?= $p->tanggal_pinjam ?></td>
                        <td><?= $p->tanggal_kembali ?: '-' ?></td>
                        <td>
                            <?php if ($p->status == 'dipinjam'): ?>
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                            <?php else: ?>
                                <span class="badge bg-success">Dikembalikan</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($p->status == 'dipinjam'): ?>
                                <a href="<?= site_url('peminjaman/kembali/'.$p->id_peminjaman) ?>" class="btn btn-sm btn-primary">
                                    🔁 Kembalikan
                                </a>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
