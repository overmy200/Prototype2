<?php
    session_start();

    if (isset($_SESSION["error_message"])){
        echo '<p class="text-danger lead">'.$_SESSION["error_message"].'</p>';
        unset($_SESSION["error_message"]);
    }

?>