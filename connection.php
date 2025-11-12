<?php

$hostname = "localhost";
$port = 3306;
$username = "";
$password = "";
$database = "stream_game";

try {
    $connection =new mysqli($hostname, $username, $password, $database);
} catch (Exception $e) {
    echo "Koneksi Gagal";
}

?>