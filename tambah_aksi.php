<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menghilangkan simbol 'Rp' dan titik, lalu mengkonversinya ke angka
    $harga = str_replace(['Rp', '.'], '', $harga);

    // Menyimpan data ke database
    $sql = "INSERT INTO stok_barang (nama_barang, kategori, lokasi, stok, harga) 
            VALUES ('$nama_barang', '$kategori', '$lokasi', '$stok', '$harga')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect ke laporan_stok.php setelah sukses menambahkan barang
        header("Location: laporan_stok.php");
        exit();  // Pastikan script berhenti setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
