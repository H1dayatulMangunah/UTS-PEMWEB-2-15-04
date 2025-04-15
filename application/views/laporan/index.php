<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h3 class="text-center text-primary mb-4">📄 Laporan Peminjaman Barang</h3>

            <!-- Tombol kembali -->
            <div class="d-flex justify-content-start mb-3">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-secondary">🔙 Kembali ke Dashboard</a>
            </div>

            <!-- Form Filter -->
            <form method="get" class="row g-3 mb-4">
                <div class="col-md-5">
                    <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                    <input type="date" id="tanggal_awal" name="tanggal_awal" value="<?= set_value('tanggal_awal') ?>" class="form-control">
                </div>
                <div class="col-md-5">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                    <input type="date" id="tanggal_akhir" name="tanggal_akhir" value="<?= set_value('tanggal_akhir') ?>" class="form-control">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">🔎 Filter</button>
                </div>
            </form>

            <!-- Tabel Laporan -->
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark text-light">
                    <tr>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($laporan)): ?>
                        <?php foreach ($laporan as $row): ?>
                            <tr>
                                <td><?= $row->nama_peminjam ?></td>
                                <td><?= $row->nama_barang ?></td>
                                <td><?= $row->jumlah ?></td>
                                <td><?= $row->tanggal_pinjam ?></td>
                                <td><?= $row->tanggal_kembali ?: '-' ?></td>
                                <td>
                                    <?php if ($row->status == 'dipinjam'): ?>
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Dikembalikan</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">Tidak ada data ditemukan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
