<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Produk</h2>
        <!-- Menampilkan pesan error -->
        <?php if (session()->getFlashData('errors')) : ?>
            <div class="alert alert-danger">
                <h4>Error</h4>
                <?php foreach (session()->getFlashData('errors') as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <!-- Form Tambah Produk -->
        <form action="<?= config('App')->baseURL ?>/store" method="post">
            <div class="form-group">
                <label for="no_produk">No Produk:</label>
                <input type="text" class="form-control" id="no_produk" name="no_produk" required>
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="bisa dijual">Bisa Dijual</option>
                    <option value="tidak bisa dijual">Tidak Bisa Dijual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
