<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "kafe");

    function register($data){
        global $conn;

        // Mengambil data yang diinputkan oleh user
        $username = strtolower( stripslashes($data["username"]) );
        $password = mysqli_real_escape_string( $conn, $data["password"] );
        $cpassword = mysqli_real_escape_string( $conn, $data["cpassword"] );
        $pilihan = $data["pilihan"];

        // cek apakah username sudah ada
        if($pilihan == "user"){
            $result = mysqli_query($conn, "SELECT name_user FROM user WHERE name_user = '$username'");
            $table = "user";
        } else if ($pilihan == "admin"){
            $result = mysqli_query($conn, "SELECT name_admin FROM admin WHERE name_admin = '$username'");
            $_SESSION["admin"] = true;
            $table = "admin";
        }

        if( mysqli_fetch_assoc($result) ){
            echo "<script>
                    alert('User telah terdaftar');
                </script>";

            return false;
        }

        // cek apakah konfirmasi data sama
        if( $password !== $cpassword ){
            echo "<script>
                    alert('Konfirmasi password salah!');
                </script>";
            
            return false;
        }

        // enkripsi
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // masukkan kedalam database 
        mysqli_query($conn, "INSERT INTO $table VALUES (
            '', '$username', '$password'
        )");

        return mysqli_affected_rows($conn);
    }

?>