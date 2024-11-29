<?php

    if (isset($_GET["id"])){
        require "connect.php";
        $ID = $_GET["id"];
        mysqli_query($connect , "DELETE FROM req_res WHERE user_id = '$ID'");
        $updateSQL = "UPDATE members SET role = 'Kitchen' WHERE id = '$ID'";
        mysqli_query($connect , $updateSQL);
        echo mysqli_error($connect);
        die(header("location: form_require.php"));
    }

?>