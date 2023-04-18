<?php

    require 'function/functions.php';
    $customers = query("SELECT * FROM pelanggan");

    if( isset($_POST["cari"]) ){
        $customers = cari( $_POST["keyword"] );
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Daftar Nama Pelanggan Tetap Kedai Kopi Kyefa</h1>
    <a href="form.php?aksi=tambah">Tambah Pelanggan</a>

    <form action="" method="post">
        <input type="text" class="cari" name="keyword" autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Gambar</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach( $customers as $customer ) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <a href="form.php?id_pelanggan=<?= $customer["id_pelanggan"] ?>&aksi=ubah">Ubah</a> | 
                <a href="hapus.php?id_pelanggan=<?= $customer["id_pelanggan"] ?>" onclick="return confirm('Apa kamu yakin ingin menghapus?')">Hapus</a> 
            </td>
            <td><?= $customer["nama_pelanggan"]; ?></td>
            <td><?= $customer["email"]; ?></td>
            <td><?= $customer["no_tlp"]; ?></td>
            <td><img src="img/<?= $customer["gambar"]; ?>" alt="customer-kopi" width="250"></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>