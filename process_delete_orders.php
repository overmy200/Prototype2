<?php
        require "connect.php";

        session_start();

        $USERID = $_SESSION["User_Id"];
        $SQL = "SELECT * FROM foods_orders WHERE customer_id = ' $USERID'";
        $CALLBACK = mysqli_query($connect , $SQL);
        
        if ($CALLBACK){
            mysqli_query($connect , "DELETE FROM `foods_orders` WHERE customer_id = '$USERID' AND food_status = 'in-order'");
            die(header("location: home.php"));
        }
        else{
            die(header("location: home.php"));
        }

?>