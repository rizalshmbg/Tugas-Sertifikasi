<?php
include "db_conn.php";

$id = $_GET['id_buku'];
$sqlBuku = "DELETE FROM `buku` WHERE id_buku = '$id'";
$hasilBuku = mysqli_query($conn, $sqlBuku);

if ($hasilBuku) {
  header("Location: index.php?msg=Berhasil menghapus data buku");
} else {
  echo "Gagal menghapus data buku " . mysqli_error($conn);
}
