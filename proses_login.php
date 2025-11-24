<?php
session_start();
include "connection.php"; // sambungkan ke koneksi database milikmu

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // login sukses
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Password salah'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Email tidak terdaftar'); window.location='login.php';</script>";
}