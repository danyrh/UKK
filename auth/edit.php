<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM tb_konter WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $warna = htmlspecialchars($_POST['warna']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);

    $sql_update = "UPDATE tb_konter SET 
                    nama='$nama', 
                    warna='$warna', 
                    deskripsi='$deskripsi', 
                    harga='$harga' 
                    WHERE id='$id'";

    if (mysqli_query($koneksi, $sql_update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Data</title>

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
          <a class="nav-link active" href="create.php">Data</a>
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
    <div class="form-edit mt-5 row justify-content-center">
        <h2 align="center">Edit Data Handphone</h2>
        <form method="POST" class="col-lg-4 mt-3">
            <table class="table-edit mb-3">
                <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required>
                </div>
                <div>               
                <label for="warna" class="form-label">Warna:</label>
                <input type="text" class="form-control" name="warna" id="warna" value="<?php echo $data['warna']; ?>" required>
                </div>
                <div>
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
                </div>
                <div>
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $data['harga']; ?>" required>
                </div>

                <div class="button-group mt-3 mb-5">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-danger">Batal</a>
                </div>
        </table>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>