<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid");
}

$id = (int) $_GET['id'];

// Ambil data lama
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $kelas = htmlspecialchars($_POST['kelas']);

    $update = $conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, kelas = ? WHERE id = ?");
    $update->bind_param("sssi", $nama, $nim, $kelas, $id);

    if ($update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal update data: " . $conn->error;
    }
}
?>

<!-- Form edit -->
<form method="POST">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>"><br>
    Posisi: <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>"><br>
    Nomor Punggung: <input type="text" name="kelas" value="<?= htmlspecialchars($data['kelas']) ?>"><br>
    <button type="submit">Simpan</button>
</form>
