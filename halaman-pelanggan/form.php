<?php

    require 'function/functions.php';

    if( $_GET["aksi"] == "ubah" ){
        $h1 = "Ubah Data Pelanggan";
        $id_pelanggan = $_GET["id_pelanggan"];

        $function = "ubah";
        $customer = query("SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan")[0];

        $title = "Halaman Edit";
        $id_pelanggan = $customer["id_pelanggan"];
        $nama_pelanggan = $customer["nama_pelanggan"];
        $email = $customer["email"];
        $no_tlp = $customer["no_tlp"];
        $gambar = $customer["gambar"];

        $button = "Ubah";
    } else if( $_GET["aksi"] == "tambah" ) {
        $h1 = "Tambah Data Pelanggan";

        $function = "tambah";

        $title = "Halaman Insert";
        $id_pelanggan = "";
        $nama_pelanggan = "";
        $email = "";
        $no_tlp = "";
        $gambar = "";

        $button = "Tambah";
    }

    if( isset($_POST["submit"]) ){
        if( $function($_POST) > 0 ){
            echo "
                <script>
                    alert('Data berhasil di$function!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal di$function!');
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1><?= $h1 ?></h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $id_pelanggan ?>">
            <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $gambar ?>">
            <tr>
                <td>
                    <label for="nama_pelanggan">Nama pelanggan : </label>
                </td>
                <td>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan nama pelanggan" value="<?= $nama_pelanggan ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email pelanggan : </label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Masukkan email pelanggan" value="<?= $email ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="no_tlp">No_tlp Pelanggan : </label>
                </td>
                <td>
                    <input type="text" name="no_tlp" id="no_tlp" placeholder="Masukkan no_tlp pelanggan" value="<?= $no_tlp ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="gambar">Gambar pelanggan : </label>
                </td>
                <td>
                    <?php if( $_GET["aksi"] == "ubah" ) : ?>
                        <img src="img/<?= $gambar ?>" alt="gambar-customer" width="200"><br><br>
                    <?php endif ?>
                    <input type="file" name="gambar" id="gambar">
                </td>
                
            </tr>
        </table>
        <button type="submit" name="submit"><?= $button ?>!</button>
    </form>

</body>
</html>