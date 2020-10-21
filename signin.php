<?php

session_start();

include("connect.php");

if(isset($_POST['login-submit'])){

    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
     $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $password = MD5($password);

    $sql = "SELECT * FROM users WHERE username=? AND passw=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

   

    // session variables to grab logged in user's details
    session_regenerate_id();
    $_SESSION['username'] = $row['username'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['usertype'] = $row['usertype'];
    $_SESSION['carerid'] = $row['carerid'];
    
    session_write_close();

    if($result->num_rows==1 && $_SESSION['usertype'] == 1){
        header('Location: carerhome.php');
   
    }else if($result->num_rows==1 && $_SESSION['usertype'] == 2){
        header('Location: patienthome.php');
    }else{
        $msg = "Username or Password is incorrect!";
       header('Location: login.php');   
    }
    
    }
}
?>







  

