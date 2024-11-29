<?php

    if (isset($_POST["item_name"])){
        require "connect.php";

        session_start();

        $USERID = $_SESSION["User_Id"];
        $SQL = "SELECT * FROM members WHERE id = '$USERID'";
        $CALLBACK = mysqli_query($connect , $SQL);

        $FOOD_NAME = $_POST["item_name"];
        $FOOD_PRICE = $_POST["item_price"];

        if ($CALLBACK){
            $CALLBACK_FOOD = mysqli_query($connect , "SELECT * FROM foods_orders WHERE food_name = '$FOOD_NAME' AND customer_id = '$USERID'");
            $ROW = mysqli_fetch_array($CALLBACK_FOOD);

            if ($ROW["food_status"] == "on-kitchen"){
                $_SESSION["error_message"] = $FOOD_NAME." กำลังทำอยู่ครัว";
                die(header("location: home.php"));
            }
           
            if (mysqli_num_rows($CALLBACK_FOOD) > 0){
                $RES = mysqli_query($connect , "SELECT * FROM foods_orders WHERE food_name = '$FOOD_NAME' AND customer_id = '$USERID'");
                $CALL_FOOD_LIST = mysqli_fetch_assoc($RES);
                $FOOD_SHOULD_AMOUT = $CALL_FOOD_LIST["food_amount"]+1;
               $UPDATE_FOOD = " UPDATE foods_orders SET food_amount = '$FOOD_SHOULD_AMOUT' WHERE food_name = '$FOOD_NAME' AND customer_id = '$USERID' ";
               mysqli_query($connect , $UPDATE_FOOD);
               die(header("location: home.php"));

            }
            else{
                $INSER_CALLBACK = "INSERT INTO foods_orders VALUES ('$USERID' , '$FOOD_NAME' , '$FOOD_PRICE' , '1' , 'in-order' , '' , '')";
                $CREATE_CALLBACK = mysqli_query($connect , $INSER_CALLBACK);

                if ($CREATE_CALLBACK){
                    die(header("location: home.php"));
                }
                else{
                    die(header("location: home.php"));
                }
            }

        }
        else{
            die(header("location: home.php"));
        }


    }
    else{
        die(header("location: home.php"));
    }

?>