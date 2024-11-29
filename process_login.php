<?php

    require("connect.php");

    session_start();

    if (isset($_POST["email_account"]) and isset($_POST["password_account"])){

        $email_account = htmlspecialchars(mysqli_escape_string($connect , $_POST["email_account"]));
        $password_account = htmlspecialchars(mysqli_escape_string($connect , $_POST["password_account"]));

        if (empty($_POST["email_account"])){
            die(header("location: form_login.php"));
        }
        elseif (empty($_POST["password_account"])){
            die(header("location: form_login.php"));
        }

        $SQL = "SELECT * FROM members WHERE email_account = '$email_account'";
        $CALLBACK = mysqli_query($connect , $SQL);

        if(mysqli_num_rows($CALLBACK) > 0){

            $ROW = mysqli_fetch_assoc($CALLBACK);
            $HASHED = $ROW["password_account"];

            if ($password_account == $HASHED){

                $_SESSION["User_Id"] = $ROW["id"];
                $_SESSION["User_Role"] = $ROW["role"];
                
                if ($ROW["status"] == "ban"){
                    $_SESSION["error_message"] = "ถูกระงับการใช้งาน";
                    die(header("location: form_login.php"));
                }

                if ($ROW["role"] == "Admin"){
                    die(header("location: admin_form.php"));
                }
                else{
                    die(header("location: home.php"));
                }
            }
            else{
                $_SESSION["error_message"] = "รหัสผ่านไม่ถูกต้อง";
                die(header("location: form_login.php"));
            }
        }
        else{
            $_SESSION["error_message"] = "ไม่พบบัญชีผู้ใช้";
            die(header("location: form_login.php"));
        }

    }
    else{
        die(header("location: form_login.php"));
    }

?>