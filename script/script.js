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

document.addEventListener("DOMContentLoaded", () => {
  ambilUser();

  document.getElementById("formUser").addEventListener("submit", function (e) {
    e.preventDefault();
    const nama = document.getElementById("nama").value;

    fetch("https://web-project-be.great-site.net/api/tambah_user.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `nama=${encodeURIComponent(nama)}`
    })
    .then(res => res.json())
    .then(data => {
      alert(data.message);
      if (data.status === "success") {
        document.getElementById("formUser").reset();
        ambilUser();
      }
    });
  });
});

function ambilUser() {
  fetch("https://web-project-be.great-site.net/api/ambil_user.php")
    .then(res => res.json())
    .then(users => {
      const tbody = document.querySelector("#tabelUser tbody");
      tbody.innerHTML = "";
      users.forEach(user => {
        const row = `<tr><td>${user.id}</td><td>${user.nama}</td></tr>`;
        tbody.insertAdjacentHTML("beforeend", row);
      });
    });
}