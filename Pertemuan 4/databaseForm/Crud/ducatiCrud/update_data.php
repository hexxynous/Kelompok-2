<?php
require_once('koneksi.php');

// Mendapatkan data dari URL
$id = $_GET['id'];
$query_sql = "SELECT * FROM ducatidb WHERE id = $id";
$result = mysqli_query($koneksidb, $query_sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['btnupdate'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $durasi_sewa = $_POST['durasi_sewa'];
    $supir = isset($_POST['supir']) ? 1 : 0;
    $total_harga = $durasi_sewa * 350000;
    if ($supir == 1) {
        $total_harga += 200000;
    }

    // Query untuk memperbarui data di database
    $query_update = "UPDATE avanzadb SET nama='$nama', alamat='$alamat', email='$email', nomor_hp='$nomor_hp', tanggal_peminjaman='$tanggal_peminjaman', supir=$supir, durasi_sewa=$durasi_sewa, total_harga=$total_harga WHERE id=$id";
    if (mysqli_query($koneksidb, $query_update)) {
        echo "<script>alert('Data berhasil diperbarui.');</script>";
        echo "<script>window.location.href='read_data.php'</script>";
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($koneksidb);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Avanza</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <h1>Update Data Penyewaan Avanza</h1>
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $row['nama']; ?>" required>
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= $row['alamat']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $row['email']; ?>" required>
        <br>
        <label for="nomor_hp">Nomor HP:</label>
        <input type="tel" id="nomor_hp" name="nomor_hp" value="<?= $row['nomor_hp']; ?>" required>
        <br>
        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
        <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?= $row['tanggal_peminjaman']; ?>" required>
        <br>
        <label for="durasi_sewa">Durasi Sewa:</label>
        <input type="number" id="durasi_sewa" name="durasi_sewa" value="<?= $row['durasi_sewa']; ?>" required>
        <br>
        <label for="supir">Sewa Supir:</label>
        <input type="checkbox" id="supir" name="supir" <?= $row['supir'] ? 'checked' : ''; ?>>
        <br>
        <button type="submit" name="btnupdate">Update Data</button>
    </form>
</body>
</html>
