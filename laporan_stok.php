<?php
include 'config.php';

// Mendapatkan kata kunci pencarian dari form
$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
}

// Query untuk mengambil data barang dengan pencarian
$query = "SELECT * FROM stok_barang WHERE nama_barang LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Laporan Stok</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h4 class="sidebar-heading">Inventory barang</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="laporan_stok.php">Laporan Stok</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manajemen Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manajemen Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manajemen Lokasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Transaksi Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Laporan</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="my-4">Laporan Stok Barang</h2>

                <!-- Form Pencarian -->
                <form method="post" class="form-inline mb-3">
                    <input type="text" name="search" class="form-control mr-2" value="<?php echo $keyword; ?>" placeholder="Cari barang...">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                <!-- Tambah Barang Button -->
                <a href="tambah.php" class="btn btn-success mb-3">Tambah Barang</a>

                <!-- Tabel Data Barang -->
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td><?php echo $row['kategori']; ?></td>
                                <td><?php echo $row['lokasi']; ?></td>
                                <td><?php echo $row['stok']; ?></td>
                                <td><?php echo 'Rp ' . number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
