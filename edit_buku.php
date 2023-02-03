<?php

include 'db_conn.php';

// initial variabel global
$id = $_GET['id_buku'];


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

  <title>UniBookStore | Admin Edit</title>
</head>

<body>

  <nav class="navbar navbar-light text-light justify-content-center fs-1 mb-5" style="background-color: #00788C;">
    UNIBOOKSTORE
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Ubah Buku</h3>
      <p class="text-muted">Klik data dibawah untuk mengubah buku!</p>
    </div>

    <?php
    $sqlBuku = "SELECT * FROM `buku` WHERE id_buku = '$id'";
    $hasilBuku = mysqli_query($conn, $sqlBuku);
    $row = mysqli_fetch_assoc($hasilBuku);
    ?>

    <div class="container d-flex justify-content-center">
      <form method="post" action="admin.php" style="width: 50vw; min-width: 300px;">
        <div class="row mb-3">

          <!-- id buku -->
          <div class="col">
            <label for="id_buku" class="form-label">ID Buku : </label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="K1234" maxlength="5" value="<?php echo $row['id_buku'] ?>" readonly disabled>
          </div>
        </div>

        <!-- kategori buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="kategori" class="form-label">Kategori Buku : </label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Keilmuan" maxlength="50" value="<?php echo $row['kategori'] ?>">
          </div>
        </div>

        <!-- nama buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="nama_buku" class="form-label">Nama Buku : </label>
            <input type="text" class="form-control" name="nama_buku" id="nama_buku" placeholder="Pemrograman Web Dasar" maxlength="50" value="<?php echo $row['nama_buku'] ?>">
          </div>
        </div>

        <!-- harga buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="harga" class="form-label">Harga Buku : </label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="50000" value="<?php echo $row['harga'] ?>">
          </div>
        </div>

        <!-- stok buku -->
        <div class="row mb-3">
          <div class="col">
            <label for="stok" class="form-label">Stok Buku : </label>
            <input type="number" class="form-control" name="stok" id="stok" placeholder="10" max="999" value="<?php echo $row['stok'] ?>">
          </div>
        </div>

        <!-- penerbit buku -->
        <div class="row mb-4">
          <div class="col">
            <label for="penerbit" class="form-label">Penerbit Buku : </label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit Informatika" maxlength="50" value="<?php echo $row['penerbit'] ?>">
          </div>
        </div>


        <!-- button -->
        <input type="hidden" name="id_book" value="<?php echo $row['id_buku'] ?>">
        <div class="row mb-3">
          <div class="col">
            <button type="submit" class="btn btn-success" name="submitEditBuku">Ubah</button>
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