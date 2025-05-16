<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Data</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">RPL CELL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container">
        <div class="form-tambah mt-5 row justify-content-center">

    <?php
include 'koneksi.php';

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nama = $_POST['nama'];
$warna = $_POST['warna'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];


$sql = "INSERT INTO tb_konter (nama, warna, deskripsi, harga) VALUES ('$nama', '$warna', '$deskripsi', '$harga')";
        $hasil=mysqli_query($koneksi,$sql);
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "Data Gagal disimpan.";

        }

    }
?>

        <h3 align="center">Tambah Data Baru<br>
        Konter XI RPL 1</h3>
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="col-lg-4 mt-3">
            <table class="table-tambah mb-3"> 
                <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Merk" required>
                </div>
                <div class="mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukan Warna HP">
                </div>
                <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
                </div>
                <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga">
                </div>
            </table>
            
            <div class="button-group mt-3 mb-5">
                <button type="submit" class="btn btn-success" value="submit">Tambah</button>
                <a href="index.php" role="button" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>