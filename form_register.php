<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container mt-10">
        <div class="container py-5 d-flex flex-column rounded-5 shadow-lg align-items-center justify-content-center">
            <h1>สร้างบัญชีใหม่</h1>
            <form class="form-group mt-5 d-flex flex-column gap-3 w-50 form_register" action="process_register.php" method="POST">
                <div>
                    <input class="form-control p-2" name="username_account" , type="text" , placeholder="Username" ,>
                </div>
                <div>
                    <input class="form-control p-2" name="email_account" , type="email" , placeholder="Email" ,>
                </div>
                <div>
                    <input class="form-control p-2" name="password_account1" , type="password" , placeholder="Password" ,>
                </div>
                <div>
                    <input class="form-control p-2" name="password_account2" , type="password" , placeholder="Confirm Password" ,>
                </div>
                <?php
                include "error_message.php";
                ?>
                <button class="btn btn-success py-3 submit" type="submit">สมัครสมาชิก</button>
                <a class="nav-link" href="form_login.php">มีบัญชีแล้วใช่ไหม</a>
            </form>
            <div id="result_massage"></div>
        </div>
    </div>
    <?php
    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>
    <script>
        $(function() {
            let username_res = $("[name=username_account]");
            let email_res = $("[name=email_account]");
            let password_res = $("[name=password_account1]");
            let password_res2 = $("[name=password_account2]");
            let form_register = $("form.form_register");

            form_register.submit(function(e) {
                if (username_res.val() == '') {
                    e.preventDefault();
                    username_res.addClass('is-invalid');
                }
                if (email_res.val() == '') {
                    e.preventDefault();
                    email_res.addClass('is-invalid');
                }
                if (password_res.val() == '' || password_res.val() != password_res2.val()) {
                    e.preventDefault();
                    password_res.addClass('is-invalid');
                    password_res2.addClass('is-invalid');
                }
                if (password_res2.val() == '') {
                    e.preventDefault();
                    password_res2.addClass('is-invalid'); 
                }
            })
        })
    </script>
</body>

</html>