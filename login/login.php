<?php

    session_start();

    require 'function/functions.php';

    if( isset($_POST["login"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = mysqli_query($conn, "SELECT * FROM user WHERE name_user = '$username'");
        $admin = mysqli_query($conn, "SELECT * FROM admin WHERE name_admin = '$username'");

        if( mysqli_num_rows($user) === 1 ){
            $row = mysqli_fetch_assoc($user);

            if( password_verify($password, $row["pass_user"]) ){
                $_SESSION["user"] = true;

                $_SESSION["login"] = true;

                header("Location: ../halaman-menu");
                exit;
            }
        } else if( mysqli_num_rows($admin) === 1 ) {
            $row = mysqli_fetch_assoc($admin);

            if( password_verify($password, $row["pass_admin"]) ){
                $_SESSION["admin"] = true;

                $_SESSION["login"] = true;

                header("Location: ../halaman-menu");
                exit;
            }
        }
        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Silahkan Login</h1>

    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style : italic;">username / password salah</p>
    <?php endif ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username : </label>
                </td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password">Password : </label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
        </table>
        <button type="submit" name="login">Login!</button>
    </form>

</body>
</html>