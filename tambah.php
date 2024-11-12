<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Barang</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Barang</h2>
        <form action="tambah_aksi.php" method="post">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <input type="text" name="kategori" id="kategori" class="form-control">
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control">
            </div>

            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" id="stok" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" class="form-control" oninput="formatHarga(this)" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <script>
        // Fungsi untuk format harga ke Rupiah
        function formatHarga(input) {
            var value = input.value.replace(/[^\d]/g, ''); // Menghapus karakter non-digit
            input.value = 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Menambahkan titik setiap 3 digit
        }
    </script>

</body>
</html>