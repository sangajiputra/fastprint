<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Data Produk</a>
        <div class="ml-auto">
            <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container">
        <h2>Data Produk</h2>

        <?php if (session()->getFlashData('message')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashData('message') ?></div>
        <?php endif; ?>
        <!-- Tombol Tambah -->
        <a href="<?= site_url('create') ?>" class="btn btn-primary">Tambah Produk</a><br><br>

        <!-- Tabel Data Produk -->
        <table id="productTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product['id_produk'] ?></td>
                        <td><?= $product['nama_produk'] ?></td>
                        <td>Rp. <?= number_format($product['harga']) ?></td>
                        <td><?= $product['kategori'] ?></td>
                        <td><?= $product['status'] ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="<?= config('App')->baseURL ?>/edit/<?= $product['no_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <a href="<?= config('App')->baseURL ?>/delete/<?= $product['no_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript DataTables -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
          // Inisialisasi DataTables
          var table = $('#productTable').DataTable();

          // Menambahkan filter status
          var statusFilter = $('<label for="statusFilter">Filter Status:</label><select id="statusFilter"><option value="">Semua</option><option value="bisa dijual">Bisa Dijual</option><option value="tidak bisa dijual">Tidak Bisa Dijual</option></select>')
            .appendTo('#productTable_filter')
            .addClass('form-control form-control-sm ml-2')
            .attr('style', 'width: 150px;')
            .on('change', function() {
              table.column(4).search($(this).val()).draw();
            });
        });
    </script>
</body>
</html>
