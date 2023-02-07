<?php
    // unused
    session_start();
    if(isset($_SESSION['user_id']) == '') {
        header('location: login.html');
    }
    if(!$_SESSION['position']) header('location: login.html');
?>