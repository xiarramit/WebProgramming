<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'] ?? '';

    if (!empty($nama)) {
        $stmt = $koneksi->prepare("INSERT INTO users (nama) VALUES (?)");
        $stmt->bind_param("s", $nama);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "User ditambahkan"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal menambahkan user"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Nama tidak boleh kosong"]);
    }
}
?>