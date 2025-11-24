<?php
include "connection.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// cek duplikat email atau username
$stmt = $connection->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
$stmt->bind_param("ss", $email, $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "<script>alert('Email atau username sudah digunakan'); window.location='register.php';</script>";
    exit;
}

// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// insert user baru
$stmt2 = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $username, $email, $hash);
if ($stmt2->execute()) {
    echo "<script>alert('Registrasi berhasil! Silakan login'); window.location='login.php';</script>";
} else {
    echo "<script>alert('Registrasi gagal'); window.location='register.php';</script>";
}