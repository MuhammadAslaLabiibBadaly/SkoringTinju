<?php
// Mengimpor file koneksi
require_once('koneksi.php');

// Mengecek apakah ID dikirim melalui POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Menyiapkan pernyataan SQL untuk menghapus data berdasarkan ID
    $query = "DELETE FROM ranking WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error menghapus data: " . mysqli_error($conn);
    }

    // Mengarahkan kembali ke halaman utama setelah penghapusan
    header("Location: index.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
}
