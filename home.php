<?php
include 'user_login_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
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

    include 'component/content_home.php';
    ?>

    <div class="modal fade" id="show_dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body  ">
                    <h5>ต้องการยืนยันคำสั่งซื้อไหม?</h5>
                </div>
                <div class="modal-footer">
                    <div class="d-flex"></div>
                    <form action="fire_order.php" method="POST">
                        <button class="btn btn-outline-success <?php echo($totalprice == 0) ? 'disabled' : '';?>">ยืนยัน</button>
                    </form>
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>