<?php
$hostname = "localhost";
$port = 3306;
$username = "root";
$password = "";
$database = "db_streaming";

try {
    $connection =new mysqli($hostname, $username, $password, $database);
} catch (Exception $e) {
    echo "Koneksi Gagal";
}

?>