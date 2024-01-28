<?php
    //logout

    session_start();
    session_unset();
    session_destroy();

    //rederect to index page
    header("location: ../index.php");
?>