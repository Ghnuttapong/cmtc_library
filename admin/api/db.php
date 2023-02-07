<?php 

    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'cmtc_library';
    $dbhost = 'localhost';

    try {
        $conn = new PDO("mysql:dbhost={$dbhost};dbname={$dbname}",$dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: '.$e->getMessage();
    }
?>