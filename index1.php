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

            if($_GET["err"] === "empty_inputs"){
                echo "<p class='msg' style='background-color : red;'> All the input fields must be filled! </p>";
            }
            elseif($_GET["err"] === "invalid_name"){
                echo "<p class='msg' style='background-color : red;'> Both names must be written in only letters! </p>";
            }
            elseif($_GET["err"] === "invalid_email"){
                echo "<p class='msg' style='background-color : red;'> A proper email must be entered! </p>";
            }
            elseif($_GET["err"] === "invalid_mobile"){
                echo "<p class='msg' style='background-color : red;'> Mobile number must be 10 digit long and start with 0 ! </p>";
            }
            elseif($_GET["err"] === "invalid_password"){
                echo "<p class='msg' style='background-color : red;'> password must be at least 5 characters long! </p>";
            }
            elseif($_GET["err"] === "different_pass"){
                echo "<p class='msg' style='background-color : red;'> Both password must be matched! </p>";
            }
            elseif($_GET["err"] === "available_emailormobile"){
                echo "<p class='msg' style='background-color : red;'> Email and mobile number must be brand new! </p>";
            }
            elseif($_GET["err"] === "failedstmt"){
                echo "<p class='msg' style='background-color : red;'> Faild to execute the query! </p>";
            }

        }
    ?>

    <div class="forms">
        <!-- Register form -->
        <form action="./includes/register.inc.php" method="post" class="register">
            <h2>Register</h2>
            <input type="text" name="fname" placeholder="Enter Your First Name">
            <input type="text" name="lname" placeholder="Enter Your Last Name">
            <input type="text" name="email" placeholder="Enter Your Email">
            <input type="text" name="mobile" placeholder="Enter Your Mobile"> 
            <input type="password" name="pass" placeholder="Enter Your Password">
            <input type="password" name="re_pass" placeholder="Enter Your Password Again">
            <button type="submit" name="register-btn">Register</button>
        </form>
    </div>

</body>
</html>