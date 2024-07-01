<?php
require_once('koneksi.php');

$id = $_GET['id'];
$query_delete = "DELETE FROM xeniadb WHERE id = $id";

if (mysqli_query($koneksidb, $query_delete)) {
    echo "<script>alert('Data berhasil dihapus.');</script>";
    echo "<script>window.location.href='read_data.php'</script>";
} else {
    echo "Error: " . $query_delete . "<br>" . mysqli_error($koneksidb);
}
?>
