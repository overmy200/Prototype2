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
    <title>Admin</title>
</head>

<body>
    <?php
    include 'sidebar_check.php';
    ?>
    <main class="main-container container">
        <h4 class="display-5 text-center my-3">จัดการคำขอร้านค้า</h4>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>ชื่อ</td>
                    <td>นามสกุล</td>
                    <td>ที่อยู่</td>
                    <td>เบอร์มือถือ</td>
                    <td>ชื่อร้านอาหาร</td>
                    <td>คำขอ</td>
                </tr>
            </thead>
            <!-- table body -->

            <?php
            require 'connect.php';
            $SQL = "SELECT * FROM req_res";
            $RES = mysqli_query($connect, $SQL);

            while ($ROW = mysqli_fetch_array($RES)) {
                if ($ROW["req_status"] == "req"){
                    echo '
                    <tbody>
                    <tr>
                        <th>' . $ROW["user_id"] . '</th>
                        <th>' . $ROW["name"] . '</th>
                        <th>' . $ROW["surname"] . '</th>
                        <th>' . $ROW["address"] . '</th>
                        <th>' . $ROW["phone_number"] . '</th>
                        <th>' . $ROW["res_name"] . '</th>
                        <th><a class="btn btn-outline-success" href="process_req_res.php?id='.$ROW["user_id"].'">ยินยอม</a></th>
                    </tr>
                </tbody>
                ';
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