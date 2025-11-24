<?php
session_start();
include "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // === LOGIN BERHASIL ===
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        // Simpan cookie "Ingat Saya"
        if (isset($_POST['ingat'])) {
            setcookie('saved_email', $_POST['email'], time() + (86400 * 30), "/");
            setcookie('saved_password', $_POST['password'], time() + (86400 * 30), "/");
        } else {
            setcookie('saved_email', '', time() - 3600, "/");
            setcookie('saved_password', '', time() - 3600, "/");
        }

        // Toast sukses → redirect dengan parameter
        header("Location: index.php?toast=login_success");
        exit;
    } else {
        // Password salah
        header("Location: login.php?toast=error_password");
        exit;
    }
} else {
    // Email tidak ditemukan
    header("Location: login.php?toast=error_email");
    exit;
}
?>