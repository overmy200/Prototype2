<?php
include 'user_login_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'sidebar_check.php';
    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>
    <div class="container mt-5 shadow-lg rounded-5">
        <div class="profile-container d-flex flex-column justify-content-center align-items-center pt-4">
            <h4 class="text-center">โปรไฟล์ผู้ใช้</h4>
            <img src="img/child_person_people_guy_1721.png" alt="user-profile" width="200px">
        </div>
        <div class="user-info py-5 container">

            <?php
            if (isset($_SESSION["User_Id"])) {

                require("connect.php");

                $user_id = $_SESSION["User_Id"];

                $SQL = "SELECT * FROM members WHERE id = '$user_id'";
                $CALLBACK = mysqli_query($connect, $SQL);
                $ROW = mysqli_fetch_assoc($CALLBACK);

                $check = [
                    "active" => "กำลังใช้งาน",
                    "ban" => "โดนแบน",
                    "Member" => "สมาชิก",
                    "Kitchen" => "ร้านอาหาร",
                    "Admin" => "แอดมิน",
                ];

                echo '<p class="lead fw-bold">ไอดี: ' . '<p class="lead">' . $ROW["id"] . '</p>' . '</p>';
                echo '<p class="lead fw-bold">ชื่อผู้ใช้: ' . '<p class="lead">' . $ROW["username_account"] . '</p>' . '</p>';
                echo '<p class="lead fw-bold">อีเมล: ' . '<p class="lead">' . $ROW["email_account"] . '</p>' . '</p>';
                echo '<p class="lead fw-bold">สถานะ: ' . '<p class="lead">' . $check[$ROW["status"]] . '</p>' . '</p>';
                echo '<p class="lead fw-bold">ตำแหน่ง: ' . '<p class="lead">' . $check[$ROW["role"]] . '</p>' . '</p>';
            }

            ?>

            <button class="btn btn-outline-success" data-bs-target="#edit_dialog" data-bs-toggle="modal">แก้ไขข้อมูล</button>
        </div>
    </div>
    <div class="modal fade" id="edit_dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>แก้ไขข้อมูล</h4>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body  ">
                    <form action="edit_profile.php" method="POST">

                        <div class="form-group"><label class="form-label mt-2" for="edit_username">ชื่อผู้ใช้</label><input name = "input_name" class="form-control" type="text"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success">ยืนยัน</button>
                </form>
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>