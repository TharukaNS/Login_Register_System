<?php
    session_start();

    if(!isset($_SESSION['userEmail'])){
        header('location: ./index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php if(isset($_SESSION['userEmail'])){ echo $_SESSION['userFname']; } ?></title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>
    <!-- Profile -->
    <div class="profile">
        <h2>Welcome - <span><?php if(isset($_SESSION['userEmail'])){ echo $_SESSION['userFname']; } ?></span></h2>
        <div class="data"><?php if(isset($_SESSION['userEmail'])){ echo $_SESSION['userFname']." ".$_SESSION['userLname']; } ?></div>
        <div class="data"><?php if(isset($_SESSION['userEmail'])){ echo $_SESSION['userEmail']; } ?></div>
        <div class="data"><?php if(isset($_SESSION['userEmail'])){ echo $_SESSION['userMobile']; } ?></div>
        <a href="./includes/logout.inc.php">Logout</a>
    </div>
</body>
</html>