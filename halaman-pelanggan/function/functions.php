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

        $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
        $email = htmlspecialchars($data["email"]);
        $no_tlp = htmlspecialchars($data["no_tlp"]);
        $gambar = upload();

        if( !$gambar ){
            return false;
        }

        $sql = "INSERT INTO pelanggan VALUES(
            '', '$nama_pelanggan', '$email', '$no_tlp', '$gambar'
        )";
        mysqli_query($conn, $sql);

        return mysqli_affected_rows($conn);
    }

    // function hapus
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = $id");

        return mysqli_affected_rows($conn);
    }

    // function ubah
    function ubah($data){
        global $conn;

        $id_pelanggan = $data["id_pelanggan"];
        $gambarLama = $data["gambarLama"];
        $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
        $email = htmlspecialchars($data["email"]);
        $no_tlp = htmlspecialchars($data["no_tlp"]);
        if( $_FILES["gambar"]["error"] === 4 ){
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $sql = "UPDATE pelanggan SET
                    nama_pelanggan = '$nama_pelanggan',
                    email = '$email',
                    no_tlp = '$no_tlp',
                    gambar = '$gambar'
                WHERE id_pelanggan = $id_pelanggan";

        mysqli_query($conn, $sql);
        return mysqli_affected_rows($conn);
    }

    // function cari
    function cari($keyword){
        $sql = "SELECT * FROM pelanggan 
                    WHERE
                nama_pelanggan LIKE '%$keyword%' OR 
                no_tlp LIKE '%$keyword%' OR 
                email LIKE '%$keyword%'";

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