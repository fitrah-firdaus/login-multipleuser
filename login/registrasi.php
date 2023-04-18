<?php

    require 'function/functions.php';

    // cek apakah tombol submit sudah ditekan
    if( isset($_POST["register"]) ){

        if( register($_POST) > 0 ){
            echo "<script>
                    alert('User baru berhasil ditambahkan');
                    document.location.href = '../halaman-menu/index.php';
                </script>";
        } else {
            echo mysqli_error($conn);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Registrasi</h1>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username : </label>
                </td>
                <td>
                    <input type="text" name="username" id="username" placeholder="Masukkan username baru">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password">Password : </label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="Buat password">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="cpassword">Konfirmasi password : </label>
                </td>
                <td>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Masukkan lagi passwordnya">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="radio" name="pilihan" id="admin" value="admin">
                </td>
                <td>
                    <label for="admin">Admin</label>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="radio" name="pilihan" id="user" value="user">
                </td>
                <td>
                    <label for="user">User</label>
                </td>
            </tr>
        </table>
        <button type="submit" name="register">Sign in</button>
    </form>

</body>
</html>