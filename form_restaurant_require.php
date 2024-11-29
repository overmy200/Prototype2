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
        <h4 class="display-5 text-center my-3">จัดการคำสั่งซื้อลูกค้า</h4>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td>ชื่ออาหาร</td>
                    <td>จำนวน</td>
                    <td>ราคา</td>
                    <td>เวลาที่สั่ง ป/ด/ว</td>
                    <td colspan="2">สถานะการจัดส่ง</td>
                </tr>
            </thead>
            <!-- table body -->
            <?php
            require "connect.php";

            $USERID = $_SESSION["User_Id"];
            $SQL = "SELECT * FROM foods_orders WHERE customer_id = '$USERID'";
            $RES = mysqli_query($connect, $SQL);

            $Status_List = [
                "on-kitchen" => "อยู่ในครัว",
                "done" => "จัดส่งแล้ว",

            ];

            while ($ROW = mysqli_fetch_array($RES)) {
                if ($ROW["food_status"] != "in-order") {
                    echo '<tbody>
                <tr>
                    <th>' . $ROW["food_name"] . '</th>
                    <th>' . $ROW["food_amount"] . '</th>
                    <th>' . $ROW["food_price"] * $ROW["food_amount"] .' บาท'. '</th>
                    <th>' . $ROW["time_stamp"] . '</th>
                    <th>' . $Status_List[$ROW["food_status"]] . '</th>
                    <th><a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#show_dialog">จัดส่ง</a></th>
                </tr>
             </tbody>';
                }
            }
            ?>


            <!-- table body -->
        </table>
    </main>
    <div class="modal fade" id="show_dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body  ">
                    <h5>ต้องการยืนยันการจัดส่งไหม?</h5>
                </div>
                <div class="modal-footer">
                    <div class="d-flex"></div>
                    <form action="" method="POST">
                        <button class="btn btn-outline-success">ยืนยัน</button>
                    </form>
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>
</body>

</html>