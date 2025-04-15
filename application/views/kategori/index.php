<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h3 class="mb-4 text-center text-primary">
                📁 Data Kategori
            </h3>

            <!-- Tombol ke dashboard & tambah -->
            <div class="d-flex justify-content-between mb-3">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary">
                    🔙 Kembali ke Dashboard
                </a>
                <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-success">
                    ➕ Tambah Kategori
                </a>
            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $k): ?>
                        <tr>
                            <td><?= $k->id_kategori ?></td>
                            <td><?= $k->nama_kategori ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('kategori/edit/'.$k->id_kategori) ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <a href="<?= site_url('kategori/hapus/'.$k->id_kategori) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
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
