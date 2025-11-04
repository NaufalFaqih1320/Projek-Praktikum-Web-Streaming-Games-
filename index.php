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
            font-family: 'Poppins';
        }
        .navbar {
            display: flex;
            background-color: #121315;
            justify-content: center;
            align-items: center;
        }
        .navbar-logo {
            margin: 5px 5px 5px 10px;
        }
        .navbar-search {
            display: flex;
            border-radius: 100px;
            justify-content: center;
            align-items: center;
            background-color: #212224;
            padding: 4px;
            width: 420px;
        }
        .search-toogle {
            padding: 0 20px;
        }
        .search-placeholder input {
            margin: 0 50px 0 10px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: white;
        }
        .search-button button {
            color: white;
            text-decoration: none;
            padding: 7px 35px;
            background-color: #2F3032;
            border-radius: 100px;
            margin: 0 0 0 10px;
            border: none;
        }
        .navbar-stream {
            display: flex;
            background-color: #251D36;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <!-- Navbar Start -->
    <nav>
        <div class="navbar">
            <div class="navbar-logo">
                <a href="#"><img src="asset/Group 20.png" alt="" width="100px"></a>
            </div>
            <div class="navbar-search">
                <div class="search-toggle"><i data-feather="search" style="color: #2F3032; margin: 0 0 0 20px;"></i></div>
                <div class="search-placeholder"><input type="text" placeholder="Search" class="input-search"></div>
                <div class="search-button"><button type="submit">Search</button></div>
            </div>
            <div class="navbar-stream">
                <div><i data-feather="video"></i></div>Start Stream
            </div>
            <div class="navbar-setting">
                <i data-feather="settings" style="color: white;"></i>
            </div>
            <div class="navbar-notif">
                <i data-feather="bell" style="color: white;"></i>   
            </div>
            <div class="navbar-profile">
                profil
            </div>
        </div>
    </nav> 
    <!-- Navbar End -->

    <!-- Feather Icon -->
    <script>
        feather.replace();
    </script>
</body>
</html>