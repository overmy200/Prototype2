<?php
    session_start();

    if ( !isset($_SESSION["User_Id"]) ){
        die(header("location: form_login.php"));
    }
?>