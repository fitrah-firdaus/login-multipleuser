<?php

    $user = "user";

    if($user == "user"){
        $ghost = "ghost";
    } if($user == "admin"){
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
        .ghost{
            display: none;
        }

        tr, th, td{
            border: 1px black solid;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No Absen</th>
            <th class=<?= $ghost ?>>Aksi</th>
        </tr>
        <tr>
            <td>Zaki Andriansa</td>
            <td>10 PPLG 1</td>
            <td>42</td>
            <td class=<?= $ghost ?>>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
            </td>
        </tr>
    </table>
</body>
</html>