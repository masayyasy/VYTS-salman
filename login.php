<?php
require('koneksi.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("location: afterlogin.html");
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
    </head>

    <body>        
        <form method="post">
            <table align="center">
                <tr>
                    <td colspan="2" align="center">
                        <h3>Login User</h3>
                    </td>                    
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit">Giriş</button>
                            <a href="kayit.php">Kayıt</a>
                        </td>
                    </tr>
                </tr>                
            </table>
        </form>
    </body>
</html>