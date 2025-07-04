<?php
    $host = 'database-wj.cbi4ckuweuxr.ap-southeast-2.rds.amazonaws.com';
    $user = 'admin';
    $pass = 'wjDB46xz';
    $dbname = 'metadatata';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
