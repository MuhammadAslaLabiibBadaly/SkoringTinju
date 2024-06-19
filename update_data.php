<?php
require_once('koneksi.php');

// Mengecek apakah data dikirim melalui POST
if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['skor'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $skor = $_POST['skor'];

    // Menyiapkan pernyataan SQL untuk memperbarui data berdasarkan ID
    $query = "UPDATE ranking SET nama = ?, skor = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $nama, $skor, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error memperbarui data: " . $stmt->error;
    }

    // Mengarahkan kembali ke halaman utama setelah pembaruan
    header("Location: index.php");
    exit();
} else {
    echo "Data tidak lengkap.";
}
