<?php
if (isset($_GET["id"])) {
    $ID = $_GET["id"];
    include 'connect.php';

    $SQL = "UPDATE foods_orders SET food_status = 'done' WHERE key_id = '$ID'";
    $CALLBACK = mysqli_query($connect, $SQL);

    if ($CALLBACK) {
        die(header("location: form_restaurant_require.php"));
    } else {
        echo mysqli_error($connect);
    }
}
