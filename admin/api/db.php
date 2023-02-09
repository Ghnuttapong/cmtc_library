<?php 

    $dbuser = 'gfp';
    $dbpass = '1234';
    $dbname = 'cmtc_library';
    $dbhost = 'localhost';

    try {
        $conn = new PDO("mysql:dbhost={$dbhost};dbname={$dbname}",$dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        date_default_timezone_set('Asia/Bangkok');
    } catch (PDOException $e) {
        echo 'Connection failed: '.$e->getMessage();
    }
?>