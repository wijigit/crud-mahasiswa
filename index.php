<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" style="padding: 10px 15px; background-color:rgb(217, 52, 232); color: white; border-radius: 5px; text-decoration: none;">+ Tambah Data</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM mahasiswa ORDER BY id ASC";
            $result = $conn->query($sql);
            $no = 1;

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['nim']); ?></td>
                <td><?= htmlspecialchars($row['kelas']); ?></td>
                <td>
                    <a href="edit.php?id=<?= htmlspecialchars($row['id']); ?>">Edit</a> |
                    <a href="hapus.php?id=<?= htmlspecialchars($row['id']); ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>Tidak ada data mahasiswa.</td></tr>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </tbody>
            </table>
</body>
</html>