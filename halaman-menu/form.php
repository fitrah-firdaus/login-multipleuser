<?php

    require 'function/functions.php';

    if( $_GET["aksi"] == "ubah" ){
        $h1 = "Ubah Menu";
        $id_kopi = $_GET["id_kopi"];

        $title = "Halaman Edit";
        $function = "ubah";
        $menu = query("SELECT * FROM kopi WHERE id_kopi = $id_kopi")[0];

        $id_kopi = $menu["id_kopi"];
        $nama_kopi = $menu["nama_kopi"];
        $harga = $menu["harga"];
        $gambar = $menu["gambar"];

        $button = "Ubah";
    } else if( $_GET["aksi"] == "tambah" ) {
        $h1 = "Tambah Menu";

        $function = "tambah";

        $title = "Halaman Insert";
        $id_kopi = "";
        $nama_kopi = "";
        $harga = "";
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
    <link rel="stylesheet" href="css/css.css">
</head>
<body>

    <h1><?= $h1 ?></h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="id_kopi" id="id_kopi" value="<?= $id_kopi ?>">
            <input type="hidden" name="gambarLama" id="gambarLama" value="<?php echo $gambar ?>">
            <tr>
                <td>
                    <label for="nama_kopi">Nama kopi : </label>
                </td>
                <td>
                    <input type="text" name="nama_kopi" id="nama_kopi" placeholder="Masukkan menu kopi" value="<?= $nama_kopi ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="harga">Harga kopi : </label>
                </td>
                <td>
                    <input type="number" name="harga" id="harga" placeholder="Masukkan harga kopi" value="<?= $harga ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="gambar">Gambar Kopi : </label>
                </td>
                <td>
                    <?php if( $_GET["aksi"] == "ubah" ) : ?>
                        <img src="img/<?= $gambar ?>" alt="gambar-menu" width="200"><br><br>
                    <?php endif ?>
                    <input type="file" name="gambar" id="gambar">
                </td>
                
            </tr>
        </table>
        <button type="submit" name="submit"><?= $button ?>!</button>
    </form>

</body>
</html>