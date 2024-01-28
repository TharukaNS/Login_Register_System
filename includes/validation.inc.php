<?php
    //Functions to validate inputs

    function inputsEmptyRegister($fname, $lname, $email, $mobile, $pass, $re_pass){
        $value;
        if(empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($pass) || empty($re_pass)){
            $value = true;
        }else{
            $value = false;
        }
        return $value;
    }

    function inputsEmptyLogin($email, $pass){
        $value;
        if(empty($email) || empty($pass)){
            $value = true;
        }else{
            $value = false;
        }
        return $value;
    }

    function nameInvalid($fname, $lname){
        $value;
        if(!preg_match("/^[a-zA-Z]+$/", $fname)){
            $value = true;
        }
        elseif(!preg_match("/^[a-zA-Z]+$/", $lname)){
            $value = true;
        }
        else{
            $value = false;
        }
        return $value;
    }

    function emailInvalid($email){
        $value;
        if(!preg_match("/^[a-zA-Z\d\._-]+@[a-zA-Z\d_-]+\.[a-zA-Z\d\.]{2,}$/", $email)){
            $value = true;
        }
        else{
            $value = false;
        }
        return $value;
    }

    function mobileInvalid($mobile){
        $value;
        if(!preg_match("/^[0][\d]{9}$/", $mobile)){
            $value = true;
        }
        else{
            $value = false;
        }
        return $value;
    }

    function passwordInvalid($pass){
        $value;
        if(!preg_match("/^.{5,}$/", $pass)){
            $value = true;
        }
        else{
            $value = false;
        }
        return $value;
    }

    function passNotMatch($pass, $re_pass){
        $value;
        if($pass !== $re_pass){
            $value = true;
        }
        else{
            $value = false;
        }
        return $value;
    }

    function emailOrMobileAvailable($conn, $email, $mobile){
        $value;
       
        $sql = "SELECT * FROM users WHERE email = ? OR mobile = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../index.php?err=failedstmt");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "si", $email, $mobile);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);

            if(!mysqli_fetch_assoc($data)){
                $value = false;
            }
            else{
                $value = true;
            }
        }
        mysqli_stmt_close($stmt);

        return $value;
    }
?>