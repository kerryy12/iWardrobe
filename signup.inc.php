<?php
if(isset($_POST['signup-submit'])){
    
    include("connect.php");

    // Get and sanitize form data
    $username = $conn->real_escape_string($_POST['uname']);
    $password = $conn->real_escape_string($_POST['pword']);
    $usertype = $conn->real_escape_string($_POST['utype']);
    $firstname = $conn->real_escape_string($_POST['fname']);
    $lastname = $conn->real_escape_string($_POST['lname']);

    if(empty($username) || empty($password) || empty($usertype) || empty($firstname) || empty($lastname)){
        header("Location: signup.php?error=emptyfields&uname=".$username);
        exit();
   
    }else{
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: signup.php?error=sqlerror");
            exit();
        
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows();
            if(resultcheck > 0){
                header("Location: signup.php?error=usertaken");
            exit();
            
        }else {
            $sql = "INSERT INTO users(username, passw, usertype, firstname, lastname) VALUES($username, $password, $usertype, $firstname, $lastname)";
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: signup.php?error=sqlerror");
            exit();
        
        }else{
            $hashedpassw = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssss", $username, $hashedpassw, $usertype, $firstname, $lastname);
            mysqli_stmt_execute($stmt);
            header("Location: signup.php?signup=success");
            exit();
        }
       
        }
        
    }
}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);


    ?>