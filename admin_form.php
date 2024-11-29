<?php
    include 'user_login_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    include 'sidebar_check.php';
    ?>
    <main class="main-container container">
        <h4 class="display-5 text-center my-3">Manage People</h4>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>ROLE</td>
                    <td>BAN</td>
                </tr>
            </thead>
            <!-- table body -->

            <?php

            require("connect.php");

            $SQL = "SELECT * FROM members";
            $RES = mysqli_query($connect , $SQL);

            if ($RES){
                while ($row = mysqli_fetch_assoc($RES)){
                   echo '<tbody>';
                   echo '<tr>';
                   echo '<th>'.$row['id'].'</th>';
                   echo '<th>'.$row['username_account'].'</th>';
                   echo '<th>'.$row['role'].'</th>';
                   if ($row["status"] == "ban"){
                       echo "<th><a class='btn btn-success' href='unban_process.php?id=".$row['id']."'>UNBAN</a></th>";
                       
                    }
                    else{
                        echo "<th><a class='btn btn-danger px-4' href='ban_process.php?id=".$row['id']."'>BAN</a></th>";
                        
                    }
                    echo '</tr>';
                   echo '</tbody>';
                }
            }

            ?>


            <!-- table body -->
        </table>
    </main>
    <?php
    echo '<script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>';
    ?>
</body>

</html>