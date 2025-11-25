<?php
session_start();

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Streaming</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #121315 !important;
            font-family: 'Poppins';
        }
        .navbar {
            display: flex;
            background-color: #121315;
            justify-content: center;
            align-items: center;
            position: fixed;
            box-shadow: 0px 4px 10px black;
        }
        .navbar-logo {
            margin: 5px 5px 5px 30px;
        } 
        .navbar-search {
            display: flex;
            border-radius: 100px;
            justify-content: center;
            align-items: center;
            background-color: #212224;
            padding: 4px;
            width: 418px;
        } 
        .search-toogle {
            padding: 0 20px;
        }
        .search-placeholder input {
            margin: 0 80px 0 10px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 14px;
            color: white;
        }
        .search-button button {
            color: white;
            text-decoration: none;
            padding: 0 30px 5px 30px;
            background-color: #2F3032;
            border-radius: 100px;
            margin: 0 0 0 10px;
            border: none;
            transition: 0.3s;
        }
        .search-button button:hover {
            background-color: #FB5877;
        }
        .search-button span {
            font-size: 14px;
        }
        .navbar-stream {
            display: flex;  
            color: white;
            align-items: center;
            background-color: #251D36;
            padding: 5px 5px;
            border-radius: 100px;
        }
        .navbar-stream span {
            margin: 0 8px 2px 10px;
            font-size: 14px;
        }
        .logo-stream {
            padding: 0 4px;
            background-color: #925AFB;
            width: 30px;
            height: 30px;
            border-radius: 100px;
        }
        .navbar-profile {
            display: flex;
            background-color: #212224;
            margin: 0 30px;
            align-items: center;
            padding: 3px 5px;
            border-radius: 100px;
        }
        .profile-info {
            display: grid;
            margin: 0 15px;
        }
        .profile-picture img {
            width:40px;
            height: 40px;
        }
        .profile-name {
            color: white;
            font-size: 14px;
        }
        .profile-status {
            color: #7BAF54;
            font-size: 12px;
        }
        .logo-setting:hover {
            stroke: #FB5877;
        }
        .logo-notif:hover {
            stroke: #FB5877;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <!-- Navbar Start -->
    <?php include "navbar.php"; ?>
    <!-- Navbar End -->

    <!-- Toast Login Berhasil -->
    <?php if (isset($_GET['toast']) && $_GET['toast'] === 'login_success'): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast align-items-center text-bg-success border-0 shadow-lg" role="alert" id="welcomeToast">
            <div class="d-flex">
                <div class="toast-body text-white">
                    <strong>Selamat datang kembali, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Gamer'); ?>!</strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- Bootstrap JS (untuk toast) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Auto-show toast kalau ada -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.getElementById('welcomeToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
                toast.show();
            }
        });
    </script>
</body>
</html>