<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if($stmt->rowCount() > 0){
        $_SESSION['user'] = $username;
        header("Location: Dashboard.php");
        exit();
    }else{
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            height: 100vh;
        }
    </style>
</head>

<body>
<h2>Hans Christian M. Paler</h2>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
</body>
</html>