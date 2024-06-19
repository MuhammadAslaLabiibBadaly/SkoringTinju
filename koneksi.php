<!-- <?php
        // isi nama host, username mysql, dan password mysql anda
        $host = mysqli_connect("localhost", "root", "");

        // if($host){
        // 	echo "koneksi host berhasil.<br/>";
        // }else{
        // 	echo "koneksi gagal.<br/>";
        // }
        // isikan dengan nama database yang akan di hubungkan
        $db = mysqli_select_db($host, "skoring");

        // if($db){
        // 	echo "koneksi database berhasil.";
        // }else{
        // 	echo "koneksi database gagal.";
        // }
        ?> -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "skoring";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>