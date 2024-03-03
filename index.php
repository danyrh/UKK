<?php
//nomor 1
	function hitung_total_beli($harga, $jumlah){ //fungsi menghitung tagihan awal dengan parameter harga dan jumlah
		$total_bayar = $harga * $jumlah; // nilai tagihan awal di dapat dari harga di kali jumlah
		return $total_bayar; //untuk mengembalikan nilai tagihan awal
	}
//nomor 2
    $daftar_sparepart = array(
        array("Kode" => "SPNR", "sparepart" => "Spion Racing Sepasang", "harga" => 150000),
        array("Kode" => "LMHP", "sparepart" => "Lampu Head Projie", "harga" => 200000),
        array("Kode" => "SENM", "sparepart" => "Lampu Sein Motor", "harga" => 55000),
        array("Kode" => "JOKR", "sparepart" => "Jok MBTech Racing", "harga" => 270000),
        array("Kode" => "BAND", "sparepart" => "Ban Racing Depan", "harga" => 150000),
        array("Kode" => "KLPR", "sparepart" => "Knalpot Racing Dunlop", "harga" => 850000)
    );
//nomor 3
    sort($daftar_sparepart);
//nomor 4
    $kode_alat = array("SPNR","LMHP","SENM","JOKR","BAND","KLPR");
    $nama_alat = array("Spion Racing Sepasang","Lampu Head Projie","Lampu Sein Motor","Jok MBTech Racing","Ban Racing Depan","Knalpot Racing Dunlop");
    $harga_alat = array(150000,200000,55000,270000,150000,850000);

?>    

<!DOCTYPE html>
<html>

<head>
    <title>Form Pemesanan Nasi Kotak</title>
    <!--nomor 5-->
	<link rel="stylesheet" type= "text/css "href="./css/style.css"> <!-- menghubungkan halaman web ke file library css -->
</head>
    <body>
    <div class="container">
        <!-- Menampilkan judul halaman -->
        <h1>Form Pembelian Sparepart</h1>
        <!-- nomor 6-->
		<img src="./img/logo.png" alt="logo"> <!-- menambahkan logo ke file gambar -->
        <body style="background-color: #f2f2f2;">
    <!-- Konten halaman -->
    <style>
    .container {
        background-color: #f2f2f2;
        /* tambahkan properti lain sesuai kebutuhan */
    }
</style>
</body>

        <!-- Nomor 7 -->
        <form action="index.php" method="POST" id="formPemesanan">
            <div class="row">
                <div class="col-lg-2"><label for="tipe">Sparepart</label></div>
                <div class="col-lg-2">
                    <select id="sparepart" name="sparepart">
                        <option value="">- Pilih Sparepart -</option>
                        <?php
						foreach ($nama_alat as $sparepart){
							echo '<option value ="',$sparepart,'">',$sparepart,"</option>";}//menampilkan isi array pada form pemesanan												
					?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"><label for="tipe">Harga</label></div>
                <div class="col-lg-2">
                    <select id="harga" name="harga">
                        <option value="">- Harga Sparepart -</option>
                        <?php
						foreach ($harga_alat as $harga){
							echo '<option value ="',$harga,'">',$harga,"</option>";}//menampilkan isi array pada form pemesanan												
					?>
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- Masukan data nama pelanggan. Tipe data text. -->
                <div class="col-lg-2"><label for="nama">Nama Pelanggan</label></div>
                <div class="col-lg-2"><input type="text" id="nama" name="nama"></div>
            </div>
            <div class="row">
                <!-- Masukan data jumlah kotak pesanan. Tipe data number. -->
                <div class="col-lg-2"><label for="nomor">Jumlah Sparepart</label></div>
                <div class="col-lg-2"><input type="number" id="jumlahPesanan" name="jumlahPesanan" maxlength="10"></div>
            </div>
            <div class="row">
                <!-- Tombol Submit -->
                <div class="col-lg-2"><button class="btn" type="submit" form="formPemesanan" value="Pesan"
                        name="Pesan">Beli</button></div>
                <div class="col-lg-2"></div>
            </div>
        </form>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // nomor 9
    $errors = array();

    if (empty($_POST['sparepart'])) {
        $errors[] = "Pilih sparepart terlebih dahulu.";
    }

    if (empty($_POST['harga'])) {
        $errors[] = "Isi harga sparepart.";
    }

    if (empty($_POST['nama'])) {
        $errors[] = "Isi nama konsumen.";
    }

    if (empty($_POST['jumlahPesanan']) || $_POST['jumlahPesanan'] < 1) {
        $errors[] = "Jumlah pesanan tidak valid.";
    }
    if (empty($errors)) {
        //nomor 8
        $data_pembelian = array(
            'sparepart' => $_POST['sparepart'],
            'harga' => $_POST['harga'],
            'nama' => $_POST['nama'],
            'jumlahPesanan' => $_POST['jumlahPesanan']
        );

        // nomor 10
        $berkas = "data/data.json";

        $dataJson = json_decode(file_get_contents($berkas), true);

        // nomor 12
        if (!is_array($dataJson)) {
            $dataJson = array();
        }

        $dataJson[] = $data_pembelian;

        file_put_contents($berkas, json_encode($dataJson, JSON_PRETTY_PRINT));

        // ... (lanjutan kode)                                                                                                                                                                                                                                                                

        // nomor 11
        echo '<div class="informasi-pembelian">';
        echo "Informasi Pembelian: <br>";
        echo "Informasi Pembelian: <br>";
        echo "Nama Konsumen: " . $data_pembelian['nama'] . "<br>";
        echo "Nama Sparepart: " . $data_pembelian['sparepart'] . "<br>";
        echo "Harga Satuan: Rp" . number_format($data_pembelian['harga'], 0, ".", ".") . ",-<br>";
        echo "Jumlah Dibeli: " . $data_pembelian['jumlahPesanan'] . " pcs<br>";

        // nomor 13
        $totalPembelian = $data_pembelian['harga'] * $data_pembelian['jumlahPesanan'];
        echo "Total Pembelian: Rp" . number_format($totalPembelian, 0, ".", ".") . ",-<br>";
        echo '</div>';
    } else {
        // Tampilkan pesan error
        foreach ($errors as $error) {
            echo '<div class="alert-warning"><b>' . $error . '</div>';
        }
    }
}
	?>
    <footer>
        <p>&copy; 2024 motor jaya pringsewu. Muzakki rahman hakim.</p>
    </footer>        
</body>
</html>
			
