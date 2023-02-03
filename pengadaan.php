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

  <title>UniBookStore | Pengadaan</title>
</head>

<body>

  <nav class="navbar navbar-light text-light justify-content-center fs-1 mb-5" style="background-color: #00788C;">
    UNIBOOKSTORE
  </nav>

  <div class="container">
    <table class="table table-hover text-center mb-5" id="tabelBuku">
      <thead class="table-dark">
        <h3 class="text-center">Daftar Pengadaan Buku</h3>
        <hr>
        <tr>
          <th scope="col">Nama Buku</th>
          <th scope="col">Stok</th>
          <th scope="col">Penerbit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db_conn.php';

        $sqlBuku = "SELECT * FROM `buku` ORDER BY stok ASC";
        $hasilBuku = mysqli_query($conn, $sqlBuku);
        while ($row = mysqli_fetch_assoc($hasilBuku)) {
        ?>
          <tr>
            <td><?php echo $row['nama_buku'] ?></td>
            <td><?php echo $row['stok'] ?></td>
            <td><?php echo $row['penerbit'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-dark mb-3">Home</a>
  </div>


  <!-- boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>