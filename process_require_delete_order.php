<?php
if (isset($_GET["id"])) {
    $ID = $_GET["id"];
    include 'connect.php';

    $SQL = "UPDATE foods_orders SET food_status = 'in-delete' WHERE key_id = '$ID'";
    $CALLBACK = mysqli_query($connect, $SQL);

    die(header('location: order_form.php'));
}
