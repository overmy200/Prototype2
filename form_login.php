<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container mt-10">
        <div class="container border rounded-5 shadow-lg d-flex justify-content-center align-items-center py-8">
            <img src="logo.png" alt="logo" width="400px">
            <form class="form-group mt-5 d-flex flex-column gap-3 w-50" action="process_login.php" method="POST">
                <h1 class="text-center me-5">เข้าสู่ระบบ</h1>
                <div>
                    <input class="form-control p-2" name="email_account" , type="email" , placeholder="Email" , required>
                </div>
                <div>
                    <input class="form-control p-2" name="password_account" , type="password" , placeholder="Password" , required>
                </div>
                <?php
                    include "error_message.php";
                ?>
                <button class="btn btn-success py-3" type="submit">เข้าสู่ระบบ</button>
                <a class="nav-link" href="form_register.php">สร้างบัญชีใหม่</a>
            </form>
        </div>
    </div>
    <?php

    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>

</body>

</html>