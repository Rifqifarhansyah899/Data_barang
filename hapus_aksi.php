<?php
include 'config.php';

$id = $_POST['id'];
$sql = "DELETE FROM stok_barang WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Barang berhasil dihapus.";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: laporan_stok.php"); // Redirect kembali ke halaman laporan stok
exit;
?>
