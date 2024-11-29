<?php

    if (isset($_POST["input_name"])){
        require "connect.php";

        session_start();

        $FIRE_USERNAME = $_POST["input_name"];
        $USERID = $_SESSION["User_Id"];
        $SQL = "SELECT * FROM members WHERE id = '$USERID'";
        $CALLBACK = mysqli_query($connect , $SQL);
    
        if ($CALLBACK){
            $UPDATE_INFO = "UPDATE members SET username_account = '$FIRE_USERNAME' WHERE id = '$USERID'";
            mysqli_query($connect , $UPDATE_INFO);
            die(header("location: profile.php"));
        }
    
    }


?>