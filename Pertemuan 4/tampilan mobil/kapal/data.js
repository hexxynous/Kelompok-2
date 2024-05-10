// Fungsi untuk menghitung dan menampilkan total harga
function hitungTotal() {
    var durasi = document.getElementById('durasiSewa').value;
    var hargaPerHari = 200000; // Harga sewa mobil per hari
    var totalHarga = durasi * hargaPerHari;

    // Memeriksa apakah opsi "Sewa Supir" dipilih
    var sewaSupir = document.getElementById('SewaSupir');
    if (sewaSupir.checked) {
      totalHarga += 200000; // Biaya tambahan untuk sewa supir
    }

    // Menampilkan total harga langsung
    document.getElementById('totalHargaContainer').innerHTML = "<p>Total Harga: Rp " + totalHarga.toLocaleString() + "</p>";
  }

    // Juga menghitung total harga saat ada perubahan pada input durasi sewa atau checkbox sewa supir
    document.getElementById('durasiSewa').addEventListener('input', function() {
      hitungTotal();
    });

    document.getElementById('SewaSupir').addEventListener('change', function() {
      hitungTotal();
    });

// Mengambil tombol yang akan diatur perilakunya
const tombol = document.getElementById('tombol');

// Menambahkan event listener untuk tombol
tombol.addEventListener('click', function() {
  // Mengambil nilai input dari form
  const nama = document.getElementById('nama').value;
  const alamat = document.getElementById('alamat').value;
  const email = document.getElementById('email').value;
  const nomorHP = document.getElementById('nomor-hp').value;
  const tanggalPeminjaman = document.getElementById('tanggal-peminjaman').value;
  const durasiSewa = document.getElementById('durasiSewa').value;

  // Pengecekan apakah semua input telah diisi
  if (nama === '' || alamat === '' || email === '' || nomorHP === '' || tanggalPeminjaman === '' || durasiSewa === '') {
    // Memberi peringatan kepada pengguna untuk mengisi semua input
    alert('                 !!😡ISI DENGAN BENAR, PERIKSA KEMBALI😡!!');
  } else {
    // Semua input telah diisi, maka akan mengarahkan ke mana kek
    window.location.href = 'https://wa.link/6ysyhu'; 
  }
});

