<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']); // pastikan di database pakai md5

    $query = "SELECT * FROM users WHERE username='$username' AND password_hash='$password'";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // arahkan ke dashboard.php untuk semua user
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: url('https://k.top4top.io/p_3545igma31.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #d4af37;
            margin-bottom: 25px;
            font-size: 2rem;
            text-shadow: 1px 1px 4px rgba(212,175,55,0.4);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #d4af37;
            border-radius: 8px;
            background: #fffbe0;
            transition: 0.3s;
            font-size: 1rem;
        }

        input:focus {
            border-color: #ffd700;
            outline: none;
            box-shadow: 0 0 8px rgba(212,175,55,0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg,#ffd700,#daa520);
            color: #1a1a1a;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 1rem;
        }

        button:hover {
            background: linear-gradient(135deg,#ffec8b,#e6be2d);
            transform: translateY(-2px);
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #d4af37;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            text-shadow: 1px 1px 3px rgba(212,175,55,0.5);
        }

        p.error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <a href="register.php">Register Pelamar</a>
</div>
</body>
</html>
