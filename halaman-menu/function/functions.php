<?php

    // Halaman function

    // Connect database
    $conn = mysqli_connect("localhost", "root", "", "kafe");

    // function tampil
    function query($sql){
        global $conn;

        $result = mysqli_query($conn, $sql);
        $rows = [];
        while( $row = mysqli_fetch_array($result) ){
            $rows[] = $row;
        }

        return $rows;
    }

    // function tambah
    function tambah($data){
        global $conn;

        $nama_kopi = htmlspecialchars($data["nama_kopi"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = upload();

        if( !$gambar ){
            return false;
        }

        $sql = "INSERT INTO kopi VALUES(
            '', '$nama_kopi', $harga, '$gambar'
        )";
        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    // function hapus
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM kopi WHERE id_kopi = $id");

        return mysqli_affected_rows($conn);
    }

    // function ubah
    function ubah($data){
        global $conn;

        $id_kopi = $data["id_kopi"];
        $gambarLama = $data["gambarLama"];
        $nama_kopi = htmlspecialchars($data["nama_kopi"]);
        $harga = htmlspecialchars($data["harga"]);
        if( $_FILES["gambar"]["error"] === 4 ){
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $sql = "UPDATE kopi SET
                    nama_kopi = '$nama_kopi',
                    harga = $harga,
                    gambar = '$gambar'
                WHERE id_kopi = $id_kopi";

        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }

    // function cari
    function cari($keyword){
        $sql = "SELECT * FROM kopi 
                    WHERE
                nama_kopi LIKE '%$keyword%' OR
                harga LIKE '%$keyword%'";

        return query($sql);
    }

    // function upload gambar
    function upload(){

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if( $error === 4 ){
            echo "<script>
                alert('Pilih gambar terlebih dahulu!')
            </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
            echo "<script>
                alert('Yang anda upload bukan gambar!')
            </script>";
            return false;
        }

        if( $ukuranFile > 1000000 ){
            echo "<script>
                alert('Ukuran gambar terlalu besar!')
            </script>";
            return false;
        }

        $namaFileBaru = uniqid() . $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;

    }

?>