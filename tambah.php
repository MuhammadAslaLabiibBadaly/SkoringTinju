<?php
include('koneksi.php');
$nama = $_POST['nama'];
$skor = $_POST['skor'];

$query = ("INSERT INTO ranking (nama, skor) VALUES('$nama','$skor')");

if ($host->query($query)) {

    //redirect ke halaman index.php 
    header("location:index.php");
} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
}
