<?php
require('koneksi.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>kayıt sayfası</title>
    </head>

    <body>        
        <form method="post">
            <table align="center">
                <tr>
                    <td colspan="2" align="center">
                        <h3>kayıt User</h3>
                    </td>                    
                </tr>
                <tr>
                    <td>Ad</td>
                    <td><input type="text" name="adi"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="pasword" name="password"></td>
                </tr>
                <tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit">kayıt yap</button>
                            <a href="login.php">Login</a>
                        </td>
                    </tr>
                </tr>                
            </table>
        </form>
    </body>
</html>