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
    <title>Restaurant</title>
</head>

<body>
    <?php
    include 'sidebar_check.php';
    ?>
    <main class="main-container container">
        <h4 class="display-5 text-center my-3">จัดการคำขอยกเลิกสินค้า</h4>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td>ชื่อผู้ใช้ลูกค้า</td>
                    <td>ชื่ออาหาร</td>
                    <td>จำนวน</td>
                    <td>ราคา</td>
                    <td>เวลาที่สั่ง ป/ด/ว</td>
                    <td colspan="2">คำขอ</td>
                </tr>
            </thead>
            <!-- table body -->
            <?php
            require "connect.php";

            $USERID = $_SESSION["User_Id"];
            $SQL = "SELECT * FROM foods_orders";
            $RES = mysqli_query($connect, $SQL);

            $Status_List = [
                "in-delete" => "กำลังรออนุมัติ",
            ];

            while ($ROW = mysqli_fetch_array($RES)) {
                if ($ROW["food_status"] == "in-delete") {
                    $CUSTOMER_ID = $ROW["customer_id"];
                    $USER_ROW = "SELECT username_account FROM members WHERE id = '$CUSTOMER_ID'";
                    $CALLBACK_USERROW = mysqli_query($connect, $USER_ROW);
                    $USER_ROW = mysqli_fetch_array($CALLBACK_USERROW);

                    echo '<tbody>
                <tr>
                    <th>' . $USER_ROW["username_account"] . '</th>
                    <th>' . $ROW["food_name"] . '</th>
                    <th>' . $ROW["food_amount"] . '</th>
                    <th>' . $ROW["food_price"] * $ROW["food_amount"] . ' บาท' . '</th>
                    <th>' . $ROW["time_stamp"] . '</th>
                    <th>' . $Status_List[$ROW["food_status"]] . '</th>
                    <th><a class="btn btn-outline-secondary" href="process_require_sure_delete.php?id='.$ROW['key_id'].'">ยืนยันคำขอ</a></th>
                </tr>
             </tbody>';
                }
            }
            ?>


</table>
            <?php
            echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
            ?>
</body>

</html>