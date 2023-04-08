<?php

    require 'function.php';
    $query = query("SELECT * FROM kopi");

    $user = "admin";

    if ($user == "user") {
        $ghost = "ghost";
    }
    if ($user == "admin") {
        $ghost = "";
    }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>

<body>
    <h1 style="text-align: center; margin: 50px auto 0;">Daftar Menu Kedai Kopi Kyefa</h1>
    <a href="form-menu.php">Tambah Menu</a>
    <table border="1" cellpadding="10" cellspacing="0" width="80%" style="text-align: center; margin: 50px auto;">
        <tr>
            <th>No.</th>

            <?php
            if ($ghost == "") {
                echo "<th>Aksi</th>";
            } else {
                echo "";
            }
            ?>

            <th>Kopi</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>

        <?php $no = 1 ?>
        <?php foreach( $query as $q ) : ?>
        <tr>
            <td><?= $no++ ?></td>

            <?php
            if ($ghost == "") {
                echo "<td>
                    <a href=\"#\">Edit</a> |
                    <a href=\"#\">Hapus</a>
                </td>";
            } else {
                echo "";
            }
            ?>

            <td><?= $q["nama_kopi"] ?></td>
            <td>IDR <?= $q["harga"] ?>K</td>
            <td><img src="img/menu/<?= $q["gambar"] ?>" alt="menu kopi" width="200"></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>

</html>