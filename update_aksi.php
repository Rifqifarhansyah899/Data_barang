<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menghilangkan simbol 'Rp' dan titik, lalu mengkonversinya ke angka
    $harga = str_replace(['Rp', '.'], '', $harga);

    // Update data ke database
    $sql = "UPDATE stok_barang 
            SET nama_barang='$nama_barang', kategori='$kategori', lokasi='$lokasi', stok='$stok', harga='$harga' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke laporan_stok.php setelah sukses memperbarui barang
        header("Location: laporan_stok.php");
        exit();  // Pastikan script berhenti setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
