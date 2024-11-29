<?php

    if ( isset($_POST["first_name"]) && isset($_POST["sure_name"]) && isset($_POST["address"]) && isset($_POST["phonenumber"]) && isset($_POST["Res_name"]) ){
        $F_NAME = $_POST["first_name"];
        $S_NAME = $_POST["sure_name"];
        $U_ADDRESS = $_POST["address"];
        $P_NUMBER = $_POST["phonenumber"];
        $RES_NAME = $_POST["Res_name"];

        session_start();
        require "connect.php";

        $USERID = $_SESSION["User_Id"];
        $SQL = "SELECT user_id FROM req_res WHERE user_id = '$USERID'";
        $CALLBACK = mysqli_query($connect , $SQL);

        if ($CALLBACK){
            $INSET = "INSERT INTO req_res VALUES ('' , '$USERID' , '$F_NAME' , '$S_NAME' , '$U_ADDRESS' , '$P_NUMBER' , '$RES_NAME' , 'req')";
            mysqli_query($connect , $INSET);

            die(header("location: home.php"));

        }

    }

?>