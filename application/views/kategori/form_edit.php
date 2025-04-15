<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="text-center text-warning mb-4">✏️ Edit Kategori</h3>

            <form action="<?= site_url('kategori/update') ?>" method="post">
                <div class="mb-3">
                    <label for="id_kategori" class="form-label">ID Kategori</label>
                    <input type="text" name="id_kategori" id="id_kategori" class="form-control" value="<?= $kategori->id_kategori ?>" readonly>
                </div>

                <div class="mb-4">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('kategori') ?>" class="btn btn-secondary">🔙 Batal</a>
                    <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
