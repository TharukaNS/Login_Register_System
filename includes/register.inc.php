<?php
    //include the database file
    require_once "./dbh.inc.php";

    //Add validation file
    require_once "./validation.inc.php";

    if(isset($_POST["register-btn"])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];

        //input validation
        if(inputsEmptyRegister($fname, $lname, $email, $mobile, $pass, $re_pass)){
            header("location: ../index1.php?err=empty_inputs");
        }
        elseif(nameInvalid($fname, $lname)){
            header("location: ../index1.php?err=invalid_name");
        }
        elseif(emailInvalid($email)){
            header("location: ../index1.php?err=invalid_email");
        }
        elseif(mobileInvalid($mobile)){
            header("location: ../index1.php?err=invalid_mobile");
        }
        elseif(passwordInvalid($pass)){
            header("location: ../index1.php?err=invalid_password");
        }
        elseif(passNotMatch($pass, $re_pass)){
            header("location: ../index1.php?err=different_pass");
        }
        elseif(emailOrMobileAvailable($conn, $email, $mobile)){
            header("location: ../index1.php?err=available_emailormobile");
        }
        else{
            //Register user
            registerNewUser($conn, $fname, $lname, $email, $mobile, $pass, $re_pass);
        }
    }
    else{
        header("location: ../index1.php");
        exit();
    }

    //Function for register a new user
    function registerNewUser($conn, $fname, $lname, $email, $mobile, $pass, $re_pass){
        
        //password encryption
        $passHashed = password_hash($pass, PASSWORD_DEFAULT);


        $sql= "INSERT INTO users (fname, lname, email, mobile, password) VALUES (?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../index1.php?err=failedstmt");
        }
        else{
            mysqli_stmt_bind_param($stmt, "sssis", $fname, $lname, $email, $mobile, $passHashed);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            header("location: ../index.php?err=noerrors");
        }
    }    
?>