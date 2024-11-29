<?php
    if (isset($_SESSION["User_Role"])){
        $role = $_SESSION["User_Role"];

        if ($role == "Admin"){
            include 'component/sidebar_for_admin.php';
        }
        else if($role == "Kitchen"){
            include 'component/sidebar_for_restaurant.php';
        }
        else{
            include 'component/sidebar_for_member.php';
        }   
    }
?>