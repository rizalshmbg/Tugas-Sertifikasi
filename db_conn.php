<?php

// initial variabel yg akan dikoneksikan dengan database
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'unibookstore';

// menghubungkan ke database
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

// validasi koneksi ke database
if (!$conn) {
  die('Koneksi gagal ' . mysqli_connect_error());
}
// echo 'Koneksi berhasil';
