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
    ?>

<div class="container mt-10">
        <div class="container py-5 d-flex flex-column rounded-5 shadow-lg align-items-center justify-content-center">
            <h1>ยื่นคำขอเป็นร้านค้า</h1>
            <form class="form-group mt-5 d-flex flex-column gap-3 w-50" action="process_regis_res.php" method="POST">
                <div class="col-12 d-flex justify-content-between">
                    <div class="col-6 pe-2">
                        <input class="form-control p-2" name="first_name" , type="text" , placeholder="ชื่อจริง" , required>
                    </div>
                    <div class="col-6">
                        <input class="form-control p-2" name="sure_name" , type="text" , placeholder="นามสกุล" , required>
                    </div>

                </div>
                <div>
                    <input class="form-control p-2" name="address" , type="text" , placeholder="ที่อยู่" , required>
                </div>
                <div>
                    <input class="form-control p-2" name="phonenumber" , type="tel" , placeholder="เบอร์โทร" , required>
                </div>
                <div>
                    <input class="form-control p-2" name="Res_name" , type="text" , placeholder="ชื่อร้าน" , required>
                </div>
                <button class="btn btn-success py-3" type="submit">ยื่นคำขอ</button>
            </form>
        </div>
    </div>

</body>

</html>