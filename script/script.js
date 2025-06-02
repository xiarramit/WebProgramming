function tampilkanPesan() {
  alert("Pinjam 1 M!🔫😡");
}

function toggleDarkMode() {
  document.body.classList.toggle("dark-mode");

  const toggleButton = document.getElementById("darkModeToggle");
  const isDark = document.body.classList.contains("dark-mode");
  toggleButton.textContent = isDark ? "🌞" : "🌙";
}

function tampilkanWaktu() {
  const waktuElement = document.getElementById("waktu-sekarang");
  const sekarang = new Date();
  const jam = sekarang.getHours().toString().padStart(2, '0');
  const menit = sekarang.getMinutes().toString().padStart(2, '0');
  const detik = sekarang.getSeconds().toString().padStart(2, '0');
  waktuElement.textContent = `${jam}:${menit}:${detik}`;
}

// Perbarui waktu setiap detik
setInterval(tampilkanWaktu, 1000);
window.addEventListener("DOMContentLoaded", () => {
  tampilkanWaktu();
  // Set ikon sesuai mode awal
  const toggleButton = document.getElementById("darkModeToggle");
  const isDark = document.body.classList.contains("dark-mode");
  toggleButton.textContent = isDark ? "🌞" : "🌙";
});
