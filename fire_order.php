    <?php

        require 'connect.php';
        
        session_start();

        $USERID = $_SESSION["User_Id"];
        $SQL = "SELECT * FROM members WHERE id = '$USERID'";
        $CALLBACK = mysqli_query($connect , $SQL);

        if ($CALLBACK){
            $SELECTALLORDERS = "SELECT * FROM foods_orders WHERE customer_id = '$USERID'";
            $RES = mysqli_query($connect , $SELECTALLORDERS);

            if ($RES){
                while ($ROW = mysqli_fetch_array($RES)){
                    $UPDATE = "UPDATE foods_orders SET food_status = 'on-kitchen' WHERE food_status = 'in-order' AND customer_id = '$USERID'";
                    mysqli_query($connect , $UPDATE);
                    die(header("location: order_form.php"));
                }
            }

        }

    ?>