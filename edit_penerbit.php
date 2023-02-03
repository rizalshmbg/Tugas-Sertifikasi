<?php

include 'db_conn.php';

// initial variabel global
$id = $_GET['id_penerbit'];

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
      <h3>Ubah Penerbit</h3>
      <p class="text-muted">Klik data dibawah untuk mengubah Penerbit!</p>
    </div>

    <?php
    $sqlPenerbit = "SELECT * FROM `penerbit` WHERE id_penerbit = '$id'";
    $hasilPenerbit = mysqli_query($conn, $sqlPenerbit);
    $row = mysqli_fetch_assoc($hasilPenerbit);
    ?>

    <div class="container d-flex justify-content-center">
      <form method="post" action="admin.php" style="width: 50vw; min-width: 300px;">
        <div class="row mb-3">

          <!-- id penerbit -->
          <div class="col">
            <label for="id_penerbit" class="form-label">ID Penerbit : </label>
            <input type="text" class="form-control" name="id_penerbit" id="id_penerbit" placeholder="SP10" maxlength="4" value="<?php echo $row['id_penerbit'] ?>" disabled readonly>
          </div>
        </div>

        <!-- nama penerbit -->
        <div class="row mb-3">
          <div class="col">
            <label for="nama" class="form-label">Nama Penerbit : </label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Penerbit Informatika" maxlength="50" value="<?php echo $row['nama'] ?>">
          </div>
        </div>

        <!-- alamat -->
        <div class="row mb-3">
          <div class="col">
            <label for="alamat" class="form-label">Alamat : </label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Dipatiukur No. 16" maxlength="50" value="<?php echo $row['alamat'] ?>">
          </div>
        </div>

        <!-- kota -->
        <div class="row mb-3">
          <div class="col">
            <label for="kota" class="form-label">Kota : </label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Bandung" maxlength="50" value="<?php echo $row['kota'] ?>">
          </div>
        </div>

        <!-- telepon -->
        <div class="row mb-3">
          <div class="col">
            <label for="telepon" class="form-label">Telepon : </label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="0811-2077-722" maxlength="20" value="<?php echo $row['telepon'] ?>">
          </div>
        </div>

        <!-- button -->
        <input type="hidden" name="id_pen" value="<?php echo $row['id_penerbit'] ?>">
        <div class="row mb-3">
          <div class="col">
            <button type="submit" class="btn btn-success" name="submitEditPenerbit">Ubah</button>
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