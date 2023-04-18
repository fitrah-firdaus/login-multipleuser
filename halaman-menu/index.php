<?php

    session_start();

    if( !isset($_SESSION["login"]) ){
        header("Location: login.php");
        exit;
    }

    if(isset($_SESSION["admin"])){
        $admin = true;
    } else {
        $admin = false;
    }

    require 'function/functions.php';
    $menus = query("SELECT * FROM kopi");

    if( isset($_POST["cari"]) ){
        $menus = cari( $_POST["keyword"] );
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>

    <h1>Daftar Menu Kedai Kopi Kyefa</h1>
    <a href="form.php?aksi=tambah">Tambah Menu</a>

    <form action="" method="post">
        <input type="text" class="cari" name="keyword" autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table>
        <tr>
            <th>No.</th>
            <?php if( $admin ) {
                echo "<th>Aksi</th>";
            } else {
                echo "";
            } ?>
            <th>Menu Kopi</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach( $menus as $menu ) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <?php if( $admin ) {
                echo "<td>
                <a href=\"form.php?id_kopi=<?= \$menu['id_kopi'] ?>&aksi=ubah\">Ubah</a> | 
                <a href=\"hapus.php?id_kopi=<?= \$menu['id_kopi'] ?>\" onclick=\"return confirm('Apa kamu yakin ingin menghapus?')\">Hapus</a> 
            </td>";
            } else {
                echo "";
            } ?>
            
            <td><?= $menu["nama_kopi"]; ?></td>
            <td>IDR <?= $menu["harga"]; ?>K</td>
            <td><img src="img/<?= $menu["gambar"]; ?>" alt="menu-kopi" width="250"></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>