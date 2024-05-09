// Contoh kode JavaScript untuk mengubah teks pada halaman
document.addEventListener('DOMContentLoaded', function() {
    // Mengubah teks pada elemen dengan ID 'greeting'
    var greetingElement = document.getElementById('greeting');
    if (greetingElement) {
        greetingElement.textContent = 'Selamat datang di RENTO!';
    }
});
