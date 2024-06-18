<?php
session_start();
require 'includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($password && $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            echo "Redirecting to admin page...";
            header('Location: admin/index.php');
        } else {
            echo "Redirecting to user page...";
            header('Location: user/index.php');
        }
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
    body {
            margin: 0;
            padding: 0;
            background: url('aset/fotokelas.jpeg');
            background-size: 1370px; 
            justify-content: center;
            align-items: center;
            display: flex; 
            height: 100vh; 
            

        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5); //Ubah opasitas menjadi 50%
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }

        .alert {
            margin-top: 10px;
        }
        </style>
    <div class="container">
        <h2>Login</h2>
        <?php if ($error) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div><br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div><br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
