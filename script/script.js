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

setInterval(tampilkanWaktu, 1000);

window.addEventListener("DOMContentLoaded", () => {
  tampilkanWaktu();
  const toggleButton = document.getElementById("darkModeToggle");
  const isDark = document.body.classList.contains("dark-mode");
  toggleButton.textContent = isDark ? "🌞" : "🌙";
});

document.addEventListener("DOMContentLoaded", () => {
  ambilUser();

  document.getElementById("formUser").addEventListener("submit", function (e) {
    e.preventDefault();
    const nama = document.getElementById("nama").value;

    const endpoint = "https://corsproxy.io/?" + encodeURIComponent("https://web-project-be.great-site.net/api/tambah_user.php");

    fetch(endpoint, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `nama=${encodeURIComponent(nama)}`
    })
    .then(res => {
      if (!res.ok) throw new Error("Gagal mengirim data");
      return res.json();
    })
    .then(data => {
      alert(data.message);
      if (data.status === "success") {
        document.getElementById("formUser").reset();
        ambilUser();
      }
    })
    .catch(err => {
      alert("Gagal menambahkan user: " + err.message);
      console.error("Error kirim:", err);
    });
  });
});

function ambilUser() {
  const endpoint = "https://corsproxy.io/?" + encodeURIComponent("https://web-project-be.great-site.net/api/ambil_user.php");

  fetch(endpoint)
    .then(res => {
      if (!res.ok) throw new Error("Gagal ambil data dari server");
      return res.json();
    })
    .then(users => {
      const tbody = document.querySelector("#tabelUser tbody");
      tbody.innerHTML = "";
      users.forEach(user => {
        const row = `<tr><td>${user.id}</td><td>${user.nama}</td></tr>`;
        tbody.insertAdjacentHTML("beforeend", row);
      });
    })
    .catch(err => {
      alert("Gagal mengambil data: " + err.message);
      console.error("Fetch error:", err);
    });
}