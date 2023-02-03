<?php

include 'db_conn.php';

// fungsi tambah buku baru
if (isset($_POST['submitBuku'])) {
  $id_buku = $_POST['id_buku'];
  $kategori = $_POST['kategori'];
  $nama_buku = $_POST['nama_buku'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $penerbit = $_POST['penerbit'];

  $sqlBuku = "INSERT INTO `buku`(`id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `penerbit`)
          VALUES ('$id_buku','$kategori','$nama_buku','$harga','$stok','$penerbit')";

  $hasilBuku = mysqli_query($conn, $sqlBuku);

  if ($hasilBuku) {
    header("Location: index.php?msg=Berhasil menambahkan data buku.");
  } else {
    echo 'Gagal menambahkan buku baru: ' . mysqli_error($conn);
  }
}


// fungsi edit buku baru
if (isset($_POST['submitEditBuku'])) {
  $id_buku = $_POST['id_buku'];
  $kategori = $_POST['kategori'];
  $nama_buku = $_POST['nama_buku'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $id_book = $_POST['id_book'];
  $penerbit = $_POST['penerbit'];

  $sqlBuku = "UPDATE `buku`
          SET `id_buku`='$id_book',`kategori`='$kategori',`nama_buku`='$nama_buku',`harga`='$harga',`stok`='$stok',`penerbit`='$penerbit'
          WHERE id_buku='$id_book'";

  $hasilBuku = mysqli_query($conn, $sqlBuku);

  if ($hasilBuku) {
    header("Location: index.php?msg=Berhasil mengubah data buku.");
  } else {
    echo 'Gagal mengubah data buku: ' . mysqli_error($conn);
  }
}


// fungsi tambah penerbit buku
if (isset($_POST['submitPenerbit'])) {
  $id_penerbit = $_POST['id_penerbit'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $telepon = $_POST['telepon'];

  $sqlPenerbit = "INSERT INTO `penerbit`(`id_penerbit`, `nama`, `alamat`, `kota`, `telepon`)
                  VALUES ('$id_penerbit','$nama','$alamat','$kota','$telepon')";

  $hasilPenerbit = mysqli_query($conn, $sqlPenerbit);

  if ($hasilPenerbit) {
    header("Location: index.php?msg=Berhasil menambahkan data penerbit.");
  } else {
    echo 'Gagal menambahkan data penerbit baru: ' . mysqli_error($conn);
  }
}

// fungsi edit penerbit buku
if (isset($_POST['submitEditPenerbit'])) {
  $id_penerbit = $_POST['id_penerbit'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $id_pen = $_POST['id_pen'];
  $telepon = $_POST['telepon'];

  $sqlPenerbit = "UPDATE `penerbit`
          SET `id_penerbit`='$id_pen',`nama`='$nama',`alamat`='$alamat',`kota`='$kota',`telepon`='$telepon'
          WHERE id_penerbit='$id_pen'";

  $hasilPenerbit = mysqli_query($conn, $sqlPenerbit);

  if ($hasilPenerbit) {
    header("Location: index.php?msg=Berhasil mengubah data penerbit.");
  } else {
    echo 'Gagal mengubah data penerbit: ' . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- style css -->
  <style>

  </style>

  <title>UniBookStore | Admin</title>
</head>

<body>

  <nav class="navbar navbar-light text-light justify-content-center fs-1 mb-3" style="background-color: #00788C;">
    UNIBOOKSTORE
  </nav>

  <!-- Buku -->
  <div class="container">
    <div class="text-center">
      <h3>Tambah Buku Baru</h3>
      <p class="text-muted">Lengkapi data dibawah untuk menambahkan buku baru!</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form method="post" style="width: 50vw; min-width: 300px;">
        <div class="row mb-3">

          <!-- id buku -->
          <div class="col">
            <label for="id_buku" class="form-label">ID Buku : </label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="K1234" maxlength="5">
          </div>
        </div>

        <!-- kategori buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="kategori" class="form-label">Kategori Buku : </label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Keilmuan" maxlength="50">
          </div>
        </div>

        <!-- nama buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="nama_buku" class="form-label">Nama Buku : </label>
            <input type="text" class="form-control" name="nama_buku" id="nama_buku" placeholder="Pemrograman Web Dasar" maxlength="50">
          </div>
        </div>

        <!-- harga buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="harga" class="form-label">Harga Buku : </label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="50000">
          </div>
        </div>

        <!-- stok buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="stok" class="form-label">Stok Buku : </label>
            <input type="number" class="form-control" name="stok" id="stok" placeholder="10" max="999">
          </div>
        </div>

        <!-- penerbit buku -->
        <div class="row mb-4">
          <div class="col">
            <label for="penerbit" class="form-label">Penerbit Buku : </label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit Informatika" maxlength="50">
          </div>
        </div>

        <!-- button -->
        <div class="row mb-5">
          <div class="col">
            <button type="submit" class="btn btn-success" name="submitBuku">Tambah</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
          </div>
        </div>

      </form>
    </div>
  </div>


  <!-- Penerbit -->
  <div class="container mt-5">
    <div class="text-center">
      <h3>Tambah Penerbit Baru</h3>
      <p class="text-muted">Lengkapi data dibawah untuk menambahkan penerbit baru!</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form method="post" style="width: 50vw; min-width: 300px;">
        <div class="row mb-3">

          <!-- id penerbit -->
          <div class="col">
            <label for="id_penerbit" class="form-label">ID Penerbit : </label>
            <input type="text" class="form-control" name="id_penerbit" id="id_penerbit" placeholder="SP10" maxlength="4">
          </div>
        </div>

        <!-- nama penerbit -->
        <div class="row mb-3">
          <div class="col">
            <label for="nama" class="form-label">Nama : </label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Penerbit Informatika" maxlength="50">
          </div>
        </div>

        <!-- alamat penerbit -->
        <div class="row mb-3">
          <div class="col">
            <label for="alamat" class="form-label">Alamat : </label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Dipatiukur No. 112-116" maxlength="50">
          </div>
        </div>

        <!-- kota penerbit -->
        <div class="row mb-3">
          <div class="col">
            <label for="kota" class="form-label">Kota : </label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Bandung">
          </div>
        </div>

        <!-- Telepon penerbit -->
        <div class="row mb-3">
          <div class="col">
            <label for="telepon" class="form-label">Telepon : </label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="0811-2077-722">
          </div>
        </div>

        <!-- button -->
        <div class="row mb-3">
          <div class="col">
            <button type="submit" class="btn btn-success" name="submitPenerbit">Tambah</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
          </div>
        </div>

      </form>
    </div>
  </div>


  <!-- boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>