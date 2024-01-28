<?php
     //include the database file
     require_once "./dbh.inc.php";

     //Add validation file
     require_once "./validation.inc.php";

     if(isset($_POST['login-btn'])){

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $remember = $_POST['re-check'];

        if(inputsEmptyLogin($email, $pass)){
            header("location: ../index.php?err=empty_inputs");
        }
        elseif(emailInvalid($email)){
            header("location: ../index.php?err=invalid_email");
        }
        elseif(passwordInvalid($pass)){
            header("location: ../index.php?err=invalid_password");
        }
        else{
            loginUser($conn, $email, $pass, $remember);
        }
     }
     else{
        header("location: ../index.php");
        exit();
     }

     //function for login
     function loginUser($conn, $email, $pass, $remember){

        $sql = "SELECT * FROM users WHERE email = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("loaction: ../index.php?err=failedstmt");
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($data)){
                //Get encrypted password
                $passHashed = $row["password"];

                //Verify password
                $isPassOk = password_verify($pass, $passHashed);

                if($isPassOk){
                    session_start();
                    $_SESSION['userEmail'] = $row['email'];
                    $_SESSION['userFname'] = $row['fname'];
                    $_SESSION['userLname'] = $row['lname'];
                    $_SESSION['userMobile'] = $row['mobile'];

                    //if remember me check
                    if(isset($remember)){
                        setcookie("emailcookie", $email, time() + (3600 * 24 * 7), "/");
                        setcookie("passwordcookie", $pass, time() + (3600 * 24 * 7), "/");
                    }
                    else{
                        if(isset($_COOKIE["emailcookie"])){
                            setcookie("emailcookie", "", time() - (3600 * 24 * 7), "/");
                        }
                        if(isset($_COOKIE["passwordcookie"])){
                            setcookie("passwordcookie", "", time() - (3600 * 24 * 7), "/");
                        }
                    }

                    header("location: ../profile.php");
                }
                else{
                    header("location: ../index.php?err=loginfailedpass"); 
                    exit();
                }
            }
            else{
                header("location: ../index.php?err=loginfailedemail");
                exit();
            }
        }


        mysqli_stmt_close($stmt);

     }
?>