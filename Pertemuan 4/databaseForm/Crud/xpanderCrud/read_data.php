<?php
require_once('koneksi.php');

// Query untuk mendapatkan data dari database
$query_sql = "SELECT * FROM xpanderdb"; // Ubah sesuai dengan nama tabel yang diinginkan
$result = mysqli_query($koneksidb, $query_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data Avanza</title>
    <link rel="stylesheet" href="crud.css"> <!-- Sesuaikan dengan path CSS Anda -->
</head>
<body>
    <h1>Data Penyewaan Avanza</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Tanggal Peminjaman</th>
                <th>Foto KTP</th>
                <th>Foto SIM</th>
                <th>Supir</th>
                <th>Durasi Sewa</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['nomor_hp']; ?></td>
                    <td><?= $row['tanggal_peminjaman']; ?></td>
                    <td><img src="uploads/<?= $row['foto_ktp']; ?>" alt="Foto KTP" width="100"></td>
                    <td><img src="uploads/<?= $row['foto_sim']; ?>" alt="Foto SIM" width="100"></td>
                    <td><?= $row['supir'] ? 'Ya' : 'Tidak'; ?></td>
                    <td><?= $row['durasi_sewa']; ?></td>
                    <td><?= $row['total_harga']; ?></td>
                    <td>
                        <a href="update_data.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="delete_data.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
