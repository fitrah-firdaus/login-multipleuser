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

?>