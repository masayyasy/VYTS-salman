<?php
session_start();

if(!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>VYTS</title>
    </head> 

    <body>
        <h1>administrator sayfası</h1>
        <a href="index.php">ana sayfa</a>
        <a href="logout.php">çıkış</a>
        <hr>
        <h3>hoş geldin, user adı</h3>
        bu sayfa giriş sonraki göşterillecektir
    </body>
</html>