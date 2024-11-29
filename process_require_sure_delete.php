<?php
if (isset($_GET["id"])) {
    include "connect.php";
    $ID = $_GET["id"];

    $SQL = "SELECT * FROM foods_orders WHERE key_id = '$ID'";
    $CALLBACK = mysqli_query($connect, $SQL);

    if ($CALLBACK) {
        mysqli_query($connect, "DELETE FROM `foods_orders` WHERE key_id = '$ID' AND food_status = 'in-delete'");
        die(header("location: form_restaurant_delete_require.php"));
    } else {
        die(header("location: form_restaurant_delete_require.php"));
    }
}
