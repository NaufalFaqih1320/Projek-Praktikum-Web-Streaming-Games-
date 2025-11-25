<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #0e0e10;
            padding: 0.5rem 1rem;
            height: 60px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }
        .nav-link {
            color: #efeff1;
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        .nav-link:hover {
            background-color: #FB5877;
            color: white;
        }
        .search-input {
            background-color: #2d2d30;
            border: none;
            border-radius: 8px;
            color: #efeff1;
            padding-left: 2.5rem;
            height: 40px;
        }
        .search-input:focus {
            background-color: #3a3a3f;
            box-shadow: none;
            color: #efeff1;
        }
        .search-container {
            position: relative;
            max-width: 400px;
            width: 100%;
        }
        .search-container i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #8e8e93;
            z-index: 10;
        }
        .icon-btn {
            color: #efeff1;
            font-size: 1.4rem;
            padding: 0.5rem;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        .icon-btn:hover {
            background-color: #FB5877;
            color: white;
        }
        .profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }
        .dropdown-menu {
            background-color: #1f1f23;
            border: 1px solid #38383d;
        }
        .dropdown-item {
            color: #efeff1;
        }
        .dropdown-item:hover {
            background-color: #FB5877;
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark navbar-custom">
        <div class="container-fluid">

            <!-- Logo + Menu -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand me-4" href="#">
                    <img src="asset/Group 20.png" alt="Logo" width="80">
                </a>
                <ul class="navbar-nav me-auto d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Following</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="#">Browse</a>
                    </li>
                </ul>
            </div>

            <!-- Search -->
            <div class="search-container mx-4 flex-grow-1">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control search-input" placeholder="Search">
            </div>

            <!-- Right Icons + Profile -->
            <div class="d-flex align-items-center gap-3">

                <button class="btn icon-btn position-relative">
                    <i class="bi bi-bell"></i>
                </button>

                <!-- Dropdown Profile -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center text-decoration-none" href="#" 
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="asset/Mask group.png" alt="Profile" class="profile-img">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <!-- PENTING: Bootstrap JS harus di bawah sini -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>