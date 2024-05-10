// Fungsi untuk menghitung dan menampilkan total harga
  function hitungTotal() {
    var durasi = document.getElementById('durasiSewa').value;
    var hargaPerHari = 350000; // Harga sewa mobil per hari
    var totalHarga = durasi * hargaPerHari;

    // Memeriksa apakah opsi "Sewa Supir" dipilih
    var sewaSupir = document.getElementById('SewaSupir');
    if (sewaSupir.checked) {
      totalHarga += 200000; // Biaya tambahan untuk sewa supir
    }

    // Menampilkan total harga langsung
    document.getElementById('totalHargaContainer').innerHTML = "<p>Total Harga: Rp " + totalHarga.toLocaleString() + "</p>";
  }

  // Event listener untuk menghitung total harga saat tombol "SEWA" ditekan
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('sewaButton').addEventListener('click', function() {
      hitungTotal();
      // Mengarahkan ke halaman data.html setelah tombol "SEWA" diklik
      window.location.href = 'data.html'; // Mengarahkan ke halaman data.html
    });

    // Juga menghitung total harga saat ada perubahan pada input durasi sewa atau checkbox sewa supir
    document.getElementById('durasiSewa').addEventListener('input', function() {
      hitungTotal();
    });

    document.getElementById('SewaSupir').addEventListener('change', function() {
      hitungTotal();
    });
  });