<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Barang</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Apakah Anda yakin ingin menghapus barang ini?</h3>
        <form action="hapus_aksi.php" method="post" class="text-center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Tombol untuk konfirmasi hapus -->
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>

            <!-- Tombol batal yang mengarahkan ke halaman laporan_stok.php -->
            <a href="laporan_stok.php" class="btn btn-secondary ml-3">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
