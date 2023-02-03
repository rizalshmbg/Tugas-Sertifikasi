<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- style css -->
  <style>

  </style>

  <title>UniBookStore | Home</title>
</head>

<body>

  <nav class="navbar navbar-light text-light justify-content-center fs-1 mb-3" style="background-color: #00788C;">
    UNIBOOKSTORE
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Menu</h3>
      <a href="index.php" class="btn btn-dark">Home</a>
      <a href="admin.php" class="btn btn-dark">Admin</a>
      <a href="pengadaan.php" class="btn btn-dark">Pengadaan</a>
      <hr>
    </div>

    <!-- buku -->
    <table class="table table-hover text-center mb-5" id="tabelBuku">
      <thead class="table-dark">

        <!-- cari buku -->
        <h3 class="text-center">Cari Buku Berdasarkan Nama Buku</h3>
        <div class="container justify-content-center">
          <form>
            <div class="row mb-5">
              <div class="col">
                <input class="form-control" type="text" id="inputCari" onkeyup="cariBuku()" placeholder="Cari nama buku...">
              </div>
            </div>
          </form>
        </div>

        <!-- notifikasi -->
        <?php
        if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];
          echo '<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
              ' . $msg . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>

        <h3 class="text-center">Daftar Buku</h3>
        <hr>
        <tr>
          <th scope="col">ID Buku</th>
          <th scope="col">Kategori</th>
          <th scope="col">Nama Buku</th>
          <th scope="col">Harga</th>
          <th scope="col">Stok</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db_conn.php';

        $sqlBuku = "SELECT * FROM `buku`";
        $hasilBuku = mysqli_query($conn, $sqlBuku);
        while ($row = mysqli_fetch_assoc($hasilBuku)) {
        ?>
          <tr>
            <td><?php echo $row['id_buku'] ?></td>
            <td><?php echo $row['kategori'] ?></td>
            <td><?php echo $row['nama_buku'] ?></td>
            <td><?php echo $row['harga'] ?></td>
            <td><?php echo $row['stok'] ?></td>
            <td><?php echo $row['penerbit'] ?></td>
            <td>
              <a href="edit_buku.php?id_buku=<?php echo $row['id_buku'] ?>" class="link-dark"><i class="bi bi-pencil-square fs-5 me-3"></i></a>
              <a href="delete_buku.php?id_buku=<?php echo $row['id_buku'] ?>" class="link-dark"><i class="bi bi-trash-fill fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>


    <!-- penerbit -->
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <h3 class="text-center">Daftar Penerbit</h3>
        <hr>
        <tr>
          <th scope="col">ID Penerbit</th>
          <th scope="col">Nama Penerbit</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kota</th>
          <th scope="col">Telepon</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db_conn.php';

        $sqlPenerbit = "SELECT * FROM `penerbit`";
        $hasilPenerbit = mysqli_query($conn, $sqlPenerbit);
        while ($row = mysqli_fetch_assoc($hasilPenerbit)) {
        ?>
          <tr>
            <td><?php echo $row['id_penerbit'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td><?php echo $row['kota'] ?></td>
            <td><?php echo $row['telepon'] ?></td>
            <td>
              <a href="edit_penerbit.php?id_penerbit=<?php echo $row['id_penerbit'] ?>" class="link-dark"><i class="bi bi-pencil-square fs-5 me-3"></i></a>
              <a href="delete_penerbit.php?id_penerbit=<?php echo $row['id_penerbit'] ?>" class="link-dark"><i class="bi bi-trash-fill fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


  <!-- boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <!-- fungsi cari buku -->
  <script>
    function cariBuku() {
      // deklarasi variable
      let input, filter, table, tr, td, i, txtValue;
      input = document.getElementById('inputCari');
      filter = input.value.toUpperCase();
      table = document.getElementById('tabelBuku')
      tr = document.getElementsByTagName("tr");

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
</body>

</html>