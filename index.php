<?php
session_start();
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background-color: #121315 !important;
            font-family: 'Poppins', sans-serif;
            padding-top: 80px;
        }

        /* ==================== NAVBAR ==================== */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 70px;
            background-color: #121315;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.6);
            z-index: 1000;
        }

        /* Kiri: Logo + Search */
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .navbar-logo img { width: 80px; }

        /* Search */
        .navbar-search {
            display: flex;
            align-items: center;
            background-color: #212224;
            border-radius: 100px;
            padding: 4px 8px;
            margin: 0 24px;
            width: 420px;
            height: 44px;
        }
        .navbar-search i { color: #777; margin-left: 12px; }
        .search-placeholder input {
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 14px;
            flex: 1;
            margin: 0 12px;
        }
        .search-button button {
            background-color: #2F3032;
            color: white;
            border: none;
            border-radius: 100px;
            height: 36px;
            padding: 0 32px;
            margin: 0 0 0 76px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .search-button button:hover {
            background-color: #FB5877;
            box-shadow: 0 5px 18px rgba(251, 88, 119, 0.45);
        }

        /* ==================== TENGAH: ACTION BUTTONS (DENGAN GAP BESAR & ANTI-GESER) ==================== */
        .navbar-center {
            display: flex;
            align-items: center;
            gap: 28px; /* ← INI YANG KAMU MAU: JARAK LEBIH LEGA & ENAK DILIHAT */
        }

        .nav-action {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 48px;
            height: 48px;
            padding: 0 14px;
            border-radius: 50px;
            background: transparent;
            color: white;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            gap: 10px;
        }
        .nav-action i {
            color: #925AFB;
            transition: color 0.35s ease;
            flex-shrink: 0;
        }
        .nav-action span {
            opacity: 0;
            transform: translateX(-8px);
            transition: all 0.35s ease;
            max-width: 0;
            overflow: hidden;
        }

        .nav-action:hover {
            background: #FB5877;
            padding: 0 22px;
            box-shadow: 0 5px 18px rgba(251, 88, 119, 0.45);
        }
        .nav-action:hover i { color: white; }
        .nav-action:hover span {
            opacity: 1;
            transform: translateX(0);
            max-width: 140px;
        }

        /* Kanan: Profile */
        .navbar-profile {
            display: flex;
            align-items: center;
            background-color: #212224;
            padding: 6px 14px;
            border-radius: 100px;
            gap: 12px;
        }
        .profile-picture img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .profile-name { color: white; font-size: 14px; font-weight: 500; }
        .profile-status { color: #7BAF54; font-size: 12px; }
        .profile-info { display: grid; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <!-- Kiri -->
        <div class="navbar-left">
            <div class="navbar-logo">
                <a href="#"><img src="asset/Group 20.png" alt="Logo"></a>
            </div>
            <div class="navbar-search">
                <i data-feather="search"></i>
                <div class="search-placeholder">
                    <input type="text" placeholder="Search">
                </div>
                <div class="search-button">
                    <button type="submit">Search</button>
                </div>
            </div>
        </div>

        <!-- Tengah: Start Stream, Notification, Settings (dengan gap besar) -->
        <div class="navbar-center">
            <div class="nav-action">
                <i data-feather="video"></i>
                <span>Start Stream</span>
            </div>
            <div class="nav-action">
                <i data-feather="bell"></i>
                <span>Notification</span>
            </div>
            <div class="nav-action">
                <i data-feather="settings"></i>
                <span>Settings</span>
            </div>
        </div>

        <!-- Kanan -->
        <div class="navbar-profile">
            <div class="profile-picture">
                <img src="asset/Mask group.png" alt="Profile">
            </div>
            <div class="profile-info">
                <span class="profile-name">Albertus</span>
                <span class="profile-status">Online</span>
            </div>
        </div>
    </nav>

    <!-- Toast Login -->
    <?php if (isset($_GET['toast']) && $_GET['toast'] === 'success'): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast align-items-center text-bg-success border-0" role="alert" id="welcomeToast">
            <div class="d-flex">
                <div class="toast-body text-white">
                    <strong>Selamat datang kembali, <?= htmlspecialchars($_SESSION['username'] ?? 'Gamers') ?>!</strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.getElementById('welcomeToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
                toast.show();
            }
        });
    </script>
</body>
</html>