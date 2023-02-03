<?php
include "db_conn.php";

$id = $_GET['id_penerbit'];
$sqlPenerbit = "DELETE FROM `penerbit` WHERE id_penerbit = '$id'";
$hasilPenerbit = mysqli_query($conn, $sqlPenerbit);

if ($hasilPenerbit) {
  header("Location: index.php?msg=Berhasil menghapus data penerbit");
} else {
  echo "Gagal menghapus data penerbit " . mysqli_error($conn);
}
