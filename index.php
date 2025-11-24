<?php
session_start();

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// === DETEKSI TOAST DARI URL (hanya untuk success) ===
$show_toast = false;
$toast_message = '';

if (isset($_GET['toast']) && $_GET['toast'] === 'login_success') {
    $show_toast = true;
    $toast_message = 'Selamat datang kembali, <strong>' . htmlspecialchars($_SESSION['username']) . '</strong>! Semoga harimu seru!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Streaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #121315 !important; font-family: 'Poppins', sans-serif; color: #fff; }
        .navbar {
            display: flex; background-color: #121315; justify-content: space-between;
            align-items: center; position: fixed; top: 0; width: 100%; z-index: 1000;
            padding: 10px 20px; box-shadow: 0px 4px 10px rgba(0,0,0,0.6);
        }
        .navbar-logo a img { width: 80px; }
        .navbar-search {
            display: flex; border-radius: 100px; background-color: #212224;
            padding: 4px; width: 418px; align-items: center;
        }
        .search-toggle i { color: #666; margin: 0 10px; }
        .search-placeholder input {
            background: transparent; border: none; outline: none; color: white;
            font-size: 14px; width: 100%; padding: 8px 0;
        }
        .search-button button {
            background-color: #2F3032; color: white; border: none;
            padding: 8px 25px; border-radius: 100px; transition: 0.3s;
        }
        .search-button button:hover { background-color: #FB5877; }
        .navbar-stream {
            display: flex; align-items: center; background-color: #251D36;
            padding: 8px 15px; border-radius: 100px; color: white; font-size: 14px;
        }
        .logo-stream { background-color: #925AFB; padding: 6px; border-radius: 50%; margin-right: 8px; }
        .navbar-profile {
            display: flex; align-items: center; background-color: #212224;
            padding: 5px 10px; border-radius: 100px; margin-left: 20px;
        }
        .profile-picture img { width: 40px; height: 40px; border-radius: 50%; }
        .profile-info { margin-left: 10px; }
        .profile-name { font-weight: 600; }
        .profile-status { color: #7BAF54; font-size: 12px; }
        .navbar-setting, .navbar-notif { margin: 0 15px; cursor: pointer; }
        .navbar-setting i, .navbar-notif i { color: #9F9F9F; transition: 0.3s; }
        .navbar-setting:hover i, .navbar-notif:hover i { color: #FB5877; }

        /* Agar konten tidak tertutup navbar */
        body { padding-top: 80px; }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="#"><img src="asset/Group 20.png" alt="Logo"></a>
        </div>

        <div class="navbar-search">
            <div class="search-toggle"><i data-feather="search"></i></div>
            <div class="search-placeholder"><input type="text" placeholder="Search"></div>
            <div class="search-button"><button type="submit">Search</button></div>
        </div>

        <div style="display: flex; align-items: center; gap: 20px;">
            <div class="navbar-stream">
                <div class="logo-stream"><i data-feather="video" style="color: white; width: 18px;"></i></div>
                <span>Start Stream</span>
            </div>

            <div class="navbar-setting"><i data-feather="settings" class="logo-setting"></i></div>
            <div class="navbar-notif"><i data-feather="bell" class="logo-notif"></i></div>

            <div class="navbar-profile">
                <div class="profile-picture">
                    <img src="asset/Mask group.png" alt="Profile">
                </div>
                <div class="profile-info">
                    <div class="profile-name"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                    <div class="profile-status">Online</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten utama (kosongkan dulu atau isi nanti) -->
    <div class="container mt-5">
        <h2>Selamat datang di dashboard streaming!</h2>
        <p>Kamu sudah login sebagai <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
    </div>

    <!-- Toast hanya muncul saat login sukses -->
    <?php if ($show_toast): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast align-items-center text-bg-success border-0 shadow-lg" role="alert" id="welcomeToast">
            <div class="d-flex">
                <div class="toast-body">
                    <strong><?php echo $toast_message; ?></strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Bootstrap JS + Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        feather.replace();

        // Tampilkan toast otomatis kalau ada
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