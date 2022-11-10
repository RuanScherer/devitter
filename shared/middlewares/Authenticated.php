<?php 
    require __DIR__ . "/../../entities/User.php";

    if(!isset($_SESSION)) {
        session_start();   
    }

    if(!isset($_SESSION['user'])) {
        header("Location: " . "login.php");
    }

?>