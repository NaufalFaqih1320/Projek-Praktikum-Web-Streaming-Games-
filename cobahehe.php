<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Navbar Example</title>
  <link href="https://unpkg.com/feather-icons" rel="stylesheet" />
  <style>
    body {
    margin: 0;
    background-color: #1e1e1e;
    font-family: Arial, sans-serif;
    color: #fff;
    }

    .navbar {
    background-color: #121212;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 24px;
    gap: 20px;
    }

    /* Logo */
    .logo {
    display: flex;
    align-items: center;
    font-weight: normal;
    font-size: 18px;
    color: #ccc;
    gap: 5px;
    }

    .logo-home {
    font-size: 22px;
    }

    .logo-name {
    font-weight: 600;
    font-size: 22px;
    color: #fff;
    }

    /* Search bar */
    .search-bar {
    flex: 1;
    max-width: 400px;
    }

    .search-input-wrapper {
    background-color: #2d2d2d;
    padding: 6px 10px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    }

    .icon-search {
    stroke: #8a8a8a;
    width: 18px;
    height: 18px;
    }

    .search-input {
    background: none;
    border: none;
    outline: none;
    color: #ccc;
    flex: 1;
    font-size: 14px;
    }

    .search-input::placeholder {
    color: #666;
    }

    .btn-search {
    background-color: #3a3a3a;
    border: none;
    border-radius: 16px;
    color: white;
    font-weight: 600;
    padding: 6px 14px;
    cursor: pointer;
    }

    /* Button Stream */
    .btn-stream {
    display: flex;
    align-items: center;
    gap: 12px;
    background-color: #6a54f8;
    border: none;
    border-radius: 28px;
    padding: 6px 18px;
    color: white;
    font-weight: 600;
    cursor: pointer;
    }

    .icon-video-bg {
    background-color: #a28fff;
    border-radius: 50%;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .icon-video-bg i {
    stroke: white;
    width: 18px;
    height: 18px;
    }

    /* Setting and Notification icons */
    .settings-notif {
    display: flex;
    gap: 22px;
    color: #ccc;
    cursor: pointer;
    }

    .settings-notif i {
    stroke-width: 1.8;
    width: 22px;
    height: 22px;
    }

    /* Profile */
    .profile {
    background-color: #2d2d2d;
    border-radius: 28px;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 6px 16px;
    cursor: pointer;
    }

    .profile-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    }

    .profile-info {
    display: flex;
    flex-direction: column;
    color: #fff;
    }

    .profile-name {
    font-weight: 600;
    font-size: 16px;
    }

    .profile-status {
    font-size: 12px;
    color: #74da52;
    margin-top: 2px;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <!-- Logo -->
    <div class="logo">
      <span class="logo-home">🏠</span> Rumah <span class="logo-name">Gamink</span>
    </div>

    <!-- Search bar -->
    <div class="search-bar">
      <div class="search-input-wrapper">
        <i data-feather="search" class="icon-search"></i>
        <input type="text" placeholder="Search" class="search-input" />
        <button class="btn-search">Search</button>
      </div>
    </div>

    <!-- Button Stream -->
    <button class="btn-stream">
      <div class="icon-video-bg">
        <i data-feather="video"></i>
      </div>
      <span>Start Stream</span>
    </button>

    <!-- Setting and Notification icons -->
    <div class="settings-notif">
      <i data-feather="settings" class="icon-settings"></i>
      <i data-feather="bell" class="icon-bell"></i>
    </div>

    <!-- Profile -->
    <div class="profile">
      <img src="https://i.pravatar.cc/40" alt="Profile" class="profile-img" />
      <div class="profile-info">
        <div class="profile-name">Albertus</div>
        <div class="profile-status">Online</div>
      </div>
    </div>
  </nav>

  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace();
  </script>
</body>
</html>