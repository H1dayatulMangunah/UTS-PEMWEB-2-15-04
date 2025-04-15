<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h3 class="mb-4 text-center text-primary">📦 Data Barang</h3>

            <!-- Tombol dashboard dan tambah -->
            <div class="d-flex justify-content-between mb-3">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary">
                    🔙 Kembali ke Dashboard
                </a>
                <a href="<?= site_url('barang/tambah') ?>" class="btn btn-success">
                    ➕ Tambah Barang
                </a>
            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $b): ?>
                        <tr>
                            <td><?= $b->id_barang ?></td>
                            <td><?= $b->nama_barang ?></td>
                            <td><?= $b->stok ?></td>
                            <td><?= $b->nama_kategori ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('barang/edit/'.$b->id_barang) ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <a href="<?= site_url('barang/hapus/'.$b->id_barang) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
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
