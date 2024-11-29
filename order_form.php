<?php
include 'user_login_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_form</title>
</head>

<body>
    <?php
    include 'sidebar_check.php';
    ?>
    <main class="main-container container">
        <h4 class="display-5 text-center my-3"><i class="pe-1 bi bi-basket"></i>คำสั่งซื้อ</h4>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td>ชื่ออาหาร</td>
                    <td>จำนวน</td>
                    <td>ราคา</td>
                    <td>สถานะ</td>
                    <td>เวลาที่สั่ง ป/ด/ว</td>
                </tr>
            </thead>

            <!-- table body -->

            <?php

            require "connect.php";
            
            $USERID = $_SESSION["User_Id"];
            $SQL = "SELECT * FROM foods_orders WHERE customer_id = '$USERID'";
            $RES = mysqli_query($connect , $SQL);

            $Status_List = [
                 "in-order" => "อยู่ในตะกร้า",
                 "on-kitchen" => "อยู่ในครัว",
                 "in-delete" => "รออนุมัติยกเลิก",
                 "done" => "จัดส่งแล้ว",

            ];

            while ($ROW = mysqli_fetch_array($RES)){
                if ($ROW["food_status"] != "in-order"){
                    echo '<tbody>
                    <tr>
                        <th>'.$ROW["food_name"].'</th>
                        <th>'.$ROW["food_amount"].'</th>
                        <th>' . $ROW["food_price"] * $ROW["food_amount"] .' บาท'. '</th>
                        <th>'.$Status_List[$ROW["food_status"]].'</th>
                        <th>'.$ROW["time_stamp"].'</th>
                        <th><a class="btn btn-outline-danger" href="process_require_delete_order.php?id='.$ROW["key_id"].'">ยกเลิกสินค้า</a></th>
                    </tr>
                 </tbody>';
                }

            }

            ?>


            <!-- table body -->
        </table>
    </main>
    <?php
    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>
</body>

</html>