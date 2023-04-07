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
    <style>
        th,
        td {
            border: 1px black solid;
            text-align: center;
            box-sizing: border-box;
            padding: 5% 4%;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No Absen</th>
            <?php
            if ($ghost == "") {
                echo "<th>Aksi</th>";
            } else {
                echo "";
            }
            ?>

        </tr>

        <?php foreach( $query as $q ) : ?>
        <tr>
            <td><?= $q["nama_kopi"] ?></td>
            <td><?= $q["harga"] ?></td>
            <td><img src="img/menu/<?= $q["gambar"] ?>" alt="menu kopi"></td>
            <?php
            if ($ghost == "") {
                echo "<td>
                    <a href=\"#\">Edit</a>
                    <a href=\"#\">Hapus</a>
                </td>";
            } else {
                echo "";
            }
            ?>
        </tr>
        <?php endforeach ?>
    </table>
</body>

</html>