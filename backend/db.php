<?php
$host = "127.0.0.1";
$nama_db = "pengelolaan_data_mhs";
$username = "root";
$password = "";
$dsn = "mysql:host=". $host.";dbname=".$nama_db.";charset=utf8";
try {
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo "Koneksi gagal: ".$e->getMessage();
}