<?php
session_start();
id(!isset($_SESSION['user'])){
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Welcome, <?php echo $_SESSION['user']?> </h2>
</body>
</html>