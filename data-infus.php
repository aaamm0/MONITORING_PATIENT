<?php
// Konfigurasi database
include 'konek.php'; // Pastikan koneksi database sudah benar
// Cek apakah data POST tersedia
if (isset($_POST['berat']) && isset($_POST['status'])) {
    $berat = $_POST['berat'];
    $status = $_POST['status'];

    // Koneksi ke database
    $conn = new mysqli($host, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Simpan data
    $sql = "INSERT INTO infus_tbl (berat, status) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $berat, $status);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data!";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Data tidak lengkap.";
}
?>
