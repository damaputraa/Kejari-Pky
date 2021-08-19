<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kejari2';
$koneksi = mysqli_connect($host, $user, $pass, $db);

if ($koneksi->connect_errno) {
    echo "koneksi gagal ke db:" . $koneksi->connect_error;
    exit();
}
