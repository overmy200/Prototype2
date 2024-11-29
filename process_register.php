<?php

require("connect.php");

if (isset($_POST["username_account"]) && isset($_POST["email_account"]) && isset($_POST["password_account1"]) && isset($_POST["password_account2"])){
    
session_start();

    $username_account = htmlspecialchars( mysqli_real_escape_string( $connect , $_POST["username_account"] ));
    $email_account = htmlspecialchars( mysqli_real_escape_string( $connect , $_POST["email_account"] ));
    $password_account1 = htmlspecialchars( mysqli_real_escape_string( $connect , $_POST["password_account1"] ));
    $password_account2 = htmlspecialchars( mysqli_real_escape_string( $connect , $_POST["password_account2"] ));

    if(empty($username_account)){
        die(header("Location: form_register.php"));
    }
    elseif(empty($username_account)){
        die(header("Location: form_register.php"));
    }
    elseif(empty($password_account1)){
        die(header("Location: form_register.php"));
    }
    elseif(empty($password_account2)){
        die(header("Location: form_register.php"));
    }
    elseif($password_account1 != $password_account2 or $password_account2 != $password_account1){
        $_SESSION["error_message"] = "รหัสผ่านไม่ตรงกัน";
         die(header("Location: form_register.php"));
    }
    else{
        $check_email_account = " SELECT email_account FROM members WHERE email_account = '$email_account' ";
        $call_back_email = mysqli_query($connect , $check_email_account);
        if(mysqli_num_rows($call_back_email) > 0){
            $_SESSION["error_message"] = "มีผู้ใช้ Email นี้แล้ว";
            die(header("Location: form_register.php"));
        }
        else{
            $query_create_account = "INSERT INTO members VALUES ('' , '$username_account' , '$email_account' , '$password_account1' , 'active' , 'Member' , '')";
            $call_back_create_account = mysqli_query($connect , $query_create_account);

            if ($call_back_create_account){
                die(header("Location: form_login.php"));
            }
            else{
                $_SESSION["error_message"] = "ไม่สามารถสร้างบัญชีได้";
                die(header("Location: form_register.php")); 
            }

        }
    }

}
else{
    $_SESSION["error_message"] = "ไม่สามารถสร้างบัญชีได้";
    die(header("Location: form_register.php"));
}

?>