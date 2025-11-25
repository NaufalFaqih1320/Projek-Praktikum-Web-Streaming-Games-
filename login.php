<?php
// === BAGIAN PHP PALING ATAS ===
$saved_email = '';
$saved_pass = '';
$checked = '';

if (isset($_COOKIE['saved_email'])) {
    $saved_email = htmlspecialchars($_COOKIE['saved_email']);
}
if (isset($_COOKIE['saved_password'])) {
    $saved_pass = htmlspecialchars($_COOKIE['saved_password']);
}
if ($saved_email !== '' || $saved_pass !== '') {
    $checked = 'checked';
}

// === TOAST MESSAGE ===
$toast_message = '';
$toast_type = 'success';

if (isset($_GET['toast'])) {
    switch ($_GET['toast']) {
        case 'login_success':
            $toast_message = 'Login berhasil! Selamat datang kembali!';
            $toast_type = 'success';
            break;
        case 'error_password':
            $toast_message = 'Password yang kamu masukkan salah!';
            $toast_type = 'danger';
            break;
        case 'error_email':
            $toast_message = 'Email tidak terdaftar!';
            $toast_type = 'danger';
            break;
        case 'logout':
            $toast_message = 'Kamu telah logout.';
            $toast_type = 'info';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins';
            font-size: 14px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #121315;
            flex-direction: column;
            color: #FFFFFF;
        }

        .card {
            border-radius: 20px;
            background-color: #1E1E1E;
            color: #FFFFFF;
        }

        .card-body {
            margin: 0 5px;
        }

        .login-input {
            padding: 5px;
            color: white;
            border: 1px solid #2F3032;
            border-radius: 15px;
            padding-left: 20px;
            width: 100%;
            background-color: #2F3032;
            margin: 5px 0;
        }

        .ingat {
            margin: 7px 0;
        }

        .button-ingat {
            margin-right: 5px;
        }

        .img-card {
            border-radius: 20px;
        }

        .header-form {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .masuk,
        .daftar {
            padding: 6px 15px;
            border-radius: 50px;
            text-decoration: none;
        }

        .masuk {
            background-color: #FB5877;
            color: white;
        }

        .daftar {
            color: #FB5877;
        }

        .form {
            padding: 40px 0;
        }

        .login-button {
            color: white;
            background-color: #FB5877;
            width: 100%;
            padding: 7px 0;
            border-radius: 50px;
            border: none;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="card-container">
        <h1>Halo, Gamers!</h1>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="asset/image 8.png" class="img-fluid img-card" alt="halo">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="header-form">
                            <h5 class="card-img"><a href="#"><img src="asset/Group 20.png" alt="" width="90px"></a></h5>
                            <a href="login.php" class="masuk">Masuk</a>
                            <a href="register.php" class="daftar">Daftar</a>
                        </div>

                        <form action="proses_login.php" method="post" class="form">
                            <label>Email</label><br>
                            <input class="login-input" type="email" name="email" placeholder="Masukkan email Anda"
                                value="<?php echo $saved_email; ?>" required><br>

                            <label>Password</label><br>
                            <input class="login-input" type="password" name="password"
                                placeholder="Masukkan password Anda" value="<?php echo $saved_pass; ?>" required><br>

                            <label class="ingat">
                                <input class="button-ingat" type="checkbox" name="ingat" <?php echo $checked; ?>> Ingat
                                Saya
                            </label><br>
                            <button class="login-button" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <?php if ($toast_message !== ''): ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast align-items-center text-bg-<?php echo $toast_type; ?> border-0" role="alert" id="liveToast">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong><?php echo $toast_message; ?></strong>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.getElementById('liveToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
                toast.show();
            }
        });
    </script>
</body>

</html>