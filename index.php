<?php
    session_start();
    if(isset($_SESSION['userEmail'])){
        header("location: ./profile.php");
    }
?>
<!DOCTYPE  html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and register system</title>
    <link rel="stylesheet" href="./style1.css"> 
</head>
<body>
    <?php  
        if(isset($_GET["err"])){

             if($_GET["err"] === "noerrors"){
                 echo "<p class='msg' style='background-color : green;'> Successfuly registered! </p>";
             }

            elseif($_GET["err"] === "loginfailedemail"){
                echo "<p class='msg' style='background-color : red;'> Wrong email, please enter the correct email! </p>";
            }
            elseif($_GET["err"] === "loginfailedpass"){
                echo "<p class='msg' style='background-color : red;'> Wrong password, please enter the correct password! </p>";
            }
        }
    ?>
    <!-- Forms -->
    <div class="forms">
        <!-- Login form -->
        <form action="./includes/login.inc.php" method="post" class="login">
            <h2>Login</h2>
            <input type="text" name="email" placeholder="Enter Your Email" value="<?php if(isset($_COOKIE["emailcookie"])){ echo $_COOKIE["emailcookie"]; } ?>">
            <input type="password" name="pass" placeholder="Enter Your Password" value="<?php if(isset($_COOKIE["passwordcookie"])){ echo $_COOKIE["passwordcookie"]; } ?>">
            <div class="rem">
                <input type="checkbox" name="re-check" id="re-check" <?php if(isset($_COOKIE["emailcookie"])){ ?> checked <?php } ?>>
                <label for="re-check">Remember Me</label>
                
            </div>
            <button type="submit" name="login-btn">Login</button>
            <p>Don't have an account? <a href="index1.php" class="regi"> Register </a></p>
            
        </form>

    </div>
</body>
</html>