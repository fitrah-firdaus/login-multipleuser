<?php

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
        <tr>
            <td>Zaki Andriansa</td>
            <td>10 PPLG 1</td>
            <td>42</td>
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
    </table>
</body>

</html>