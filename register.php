<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            
        }

        body{
            font-family: 'Poppins';
            font-size: 14px;
        }
        .card-container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #121315;
            flex-direction: column;
            color: #FFFFFF;
        }
        .card-body {
            margin: 0 5px;
        }
        .card{
            border-radius: 20px;
            background-color: #1E1E1E;
            color: #FFFFFF;
        }

        .login-input{
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
            margin: 0 5px 0 0;
        }
        .img-card{
            border-radius: 20px;
        }
        .header-form {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .daftar {
            padding: 1px 15px;
            background-color: #FB5877;
            text-decoration: none;
            border-radius: 50px;
            color: white;
        }
        .masuk {
            padding: 1px 15px;
            color: #FB5877;
            text-decoration: none;
        }
        .form {
            padding: 40px 0;
        }
        .login-button {
            color: white;
            background-color: #FB5877;
            width: 100%;
            padding: 5px 0;
            border-radius: 50px;
            border: none;
            margin: 10px 0;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="card-container ">
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
                        <form action="index.php" method="POST" class="form">
                            <label for="">Username*</label><br>
                            <input class="login-input" type="text" name="username" placeholder="Masukkan username Anda" required><br>
                            <label for="">Email*</label><br>
                            <input class="login-input" type="text" name="email" placeholder="Masukkan email Anda" required><br>
                            <label for="">Password*</label><br>
                            <input class="login-input" type="text" name="password" placeholder="Masukkan password Anda" required><br>
                            <button class="login-button" type="submit">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>