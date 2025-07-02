<?php
include 'db.php';

// Validasi parameter
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid atau tidak dikirim.");
}

$id = (int) $_GET['id'];

// Cek apakah ID ada di database
$cek = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$cek->bind_param("i", $id);
$cek->execute();
$cekResult = $cek->get_result();

if ($cekResult->num_rows === 0) {
    die("Data dengan ID $id tidak ditemukan.");
}

// Jika ada, hapus
$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menghapus data: " . $conn->error;
}
?>