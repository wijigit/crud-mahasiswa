<?php
    $host = 'database-2025.cbi4ckuweuxr.ap-southeast-2.rds.amazonaws.com';
    $user = 'admin';
    $pass = 'wjDB45xz';
    $dbname = 'metadata';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>