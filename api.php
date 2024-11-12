<?php
include 'config.php';

// Mengatur header untuk respon JSON
header('Content-Type: application/json');

// Mendapatkan method HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Fungsi untuk mengubah harga menjadi format rupiah
function formatRupiah($harga) {
    return 'Rp ' . number_format($harga, 0, ',', '.');
}

// Fungsi untuk menangani GET (ambil data)
function handleGET($conn) {
    if (isset($_GET['id'])) {
        // Mendapatkan data barang berdasarkan ID
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM stok_barang WHERE id='$id'");
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // Mendapatkan semua data barang
        $result = $conn->query("SELECT * FROM stok_barang");
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $row['harga'] = formatRupiah($row['harga']);
            $items[] = $row;
        }
        echo json_encode($items);
    }
}

// Fungsi untuk menangani POST (tambah data)
function handlePOST($conn) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menghilangkan simbol 'Rp' dan titik dari harga
    $harga = str_replace(['Rp', '.'], '', $harga);

    $sql = "INSERT INTO stok_barang (nama_barang, kategori, lokasi, stok, harga) 
            VALUES ('$nama_barang', '$kategori', '$lokasi', '$stok', '$harga')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Barang berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}

// Fungsi untuk menangani PUT (update data)
function handlePUT($conn) {
    parse_str(file_get_contents("php://input"), $put_vars);  // Mengambil data PUT request
    $id = $put_vars['id'];
    $nama_barang = $put_vars['nama_barang'];
    $kategori = $put_vars['kategori'];
    $lokasi = $put_vars['lokasi'];
    $stok = $put_vars['stok'];
    $harga = $put_vars['harga'];

    // Menghilangkan simbol 'Rp' dan titik dari harga
    $harga = str_replace(['Rp', '.'], '', $harga);

    $sql = "UPDATE stok_barang SET nama_barang='$nama_barang', kategori='$kategori', lokasi='$lokasi', stok='$stok', harga='$harga' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Barang berhasil diperbarui"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}

// Fungsi untuk menangani DELETE (hapus data)
function handleDELETE($conn) {
    $id = $_GET['id'];
    $sql = "DELETE FROM stok_barang WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Barang berhasil dihapus"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}

// Menangani request API berdasarkan method
switch ($method) {
    case 'GET':
        handleGET($conn);
        break;

    case 'POST':
        handlePOST($conn);
        break;

    case 'PUT':
        handlePUT($conn);
        break;

    case 'DELETE':
        handleDELETE($conn);
        break;

    default:
        echo json_encode(["message" => "Method not allowed"]);
        break;
}
?>
