<?php

    require("connect.php");
    $id = $_GET['id'];

    $SQL = "UPDATE members SET status='active' WHERE id = $id";
    $CALLBACK = mysqli_query($connect , $SQL);

    if ($CALLBACK){
        die(header("location: admin_form.php"));
    }

?>