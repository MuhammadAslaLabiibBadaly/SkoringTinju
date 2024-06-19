<?php
require_once('koneksi.php');

// Mengecek apakah ID dikirim melalui POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Menyiapkan pernyataan SQL untuk mengambil data berdasarkan ID
    $query = "SELECT * FROM ranking WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil
    if ($result) {
        // Memeriksa apakah ada data yang ditemukan
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Data tidak ditemukan.";
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Edit Data</a>
        </div>
    </nav>
    <div class="container" style="padding: 50px 50px 50px 50px; margin-top: 50px; margin-bottom: 50px; border: 1px solid black;">
        <h2 align="center">Edit Data</h2>
        <form action="update_data.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="skor" class="form-label">Skor</label>
                <input type="number" class="form-control" id="skor" name="skor" value="<?php echo $row['skor']; ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>