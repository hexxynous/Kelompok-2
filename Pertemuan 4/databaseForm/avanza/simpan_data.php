<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $foto_ktp = $_FILES['foto_ktp']['name'];
    $foto_sim = $_FILES['foto_sim']['name'];
    $durasi_sewa = $_POST['durasi_sewa'];
    $supir = isset($_POST['supir']) ? 1 : 0;

    // Proses upload foto KTP dan SIM
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file_ktp = $target_dir . basename($foto_ktp);
    $target_file_sim = $target_dir . basename($foto_sim);
    if (move_uploaded_file($_FILES["foto_ktp"]["tmp_name"], $target_file_ktp) && move_uploaded_file($_FILES["foto_sim"]["tmp_name"], $target_file_sim)) {
        // Hitung total harga berdasarkan durasi sewa dan sewa supir
        $total_harga = $durasi_sewa * 350000;
        if ($supir == 1) {
            $total_harga += 200000;
        }

        // Query untuk menyimpan data ke dalam tabel pemesanan
        $query_sql = "INSERT INTO avanzadb (nama, alamat, email, nomor_hp, tanggal_peminjaman, foto_ktp, foto_sim, supir, durasi_sewa, total_harga)
                      VALUES ('$nama', '$alamat', '$email', '$nomor_hp', '$tanggal_peminjaman', '$foto_ktp', '$foto_sim', $supir, $durasi_sewa, $total_harga)";
        if (mysqli_query($koneksidb, $query_sql)) {
            echo "<script>alert('Berhasil simpan Registrasi.')</script>";
            echo "<script>window.location.href='simpan_data.php'</script>";
        } else {
            echo "Error: " . $query_sql . "<br>" . mysqli_error($koneksidb);
        }
    } else {
        echo "Error uploading files.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Mobil Avanza</title>
  <link rel="stylesheet" href="data.css">
</head>
<body>
  
  <!-- navbar -->
  <nav>
    <div class="container1">
        <a href="../../menu utama/menu.html"class="logo">
          <img src="../../ICON GAMBAR/mobil.png" alt="Logo RENTO">
        RENTO</a>
        <ul class="menu">
            <li><a href="../../menu utama/menu.html">HOME</a></li>
            <li><a href="../../menu utama/menu.html">SEWA</a></li>
            <li><a href="../../menu utama/menu.html">KONTAK KAMI</a></li>
        </ul>
    </div>
</nav>

  <!-- gambar mobil -->
  <div class="container clearfix">
    <div class="gambar-mobil">
        <h1>Avanza all New</h1>
        <img src="../../ICON GAMBAR/avanza.png" alt="Gambar Mobil beat" style="width: 100%;">
        <p>2 KURSI / matic</p>
    </div>
    
 <!-- informasi pemesanan -->
 <div class="content-container">
  <div class="form-container">
    <div class="estimasi-harga">

    
<!-- Form Data Diri -->
<form id="form-pemesanan" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="nomor-hp">Nomor HP:</label>
        <input type="tel" id="nomor-hp" name="nomor_hp" required>
    </div>
    <div class="form-group">
        <label for="tanggal-peminjaman">Tanggal Peminjaman:</label>
        <input type="date" id="tanggal-peminjaman" name="tanggal_peminjaman" required>
    </div>
    <div class="form-group">
        <label for="foto-ktp">Foto KTP:</label>
        <input type="file" id="foto-ktp" name="foto_ktp" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="foto-sim">Foto SIM:</label>
        <input type="file" id="foto-sim" name="foto_sim" accept="image/*" required>
    </div>

    <!-- chekbox pemesanan -->
   <ul>
        <li>
            <input type="checkbox" id="SewaSupir" name="supir" value="1">
            <label for="SewaSupir">Sewa Supir</label>
            <span>Rp 200.000</span>
        </li>
    </ul>

<!-- textbox pemesanan -->
<div class="lama-sewa">
        <label for="durasiSewa">Berapa Hari:</label>
        <input type="number" id="durasiSewa" name="durasi_sewa" min="1" placeholder="Masukkan jumlah hari" required>
    </div>
    <div id="totalHargaContainer" class="total-harga"></div>
    <button type="submit" id="tombol" name="btnsimpan">SEWA SEKARANG</button>
</form>

<!-- JavaScript -->
<script src="data.js"></script>

</body>
</html>
