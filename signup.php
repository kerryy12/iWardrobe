<?php

$db = mysqli_connect("localhost:3306","root","","iwardrobe");
$username = "";
$email = "";

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

if(isset($_POST['submit'])){

    //Get form data
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $usertype = $_POST['utype'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];

    //Encrypt password
    $password = md5($password);

    $sql_uname = "SELECT * FROM users WHERE username='$username'";
    $sql_email = "SELECT * FROM users WHERE useremail='$email'";
    $res_u = mysqli_query($db, $sql_uname);
    $res_e = mysqli_query($db, $sql_email);

    if (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry this username is already taken!";
    }else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry another user has registred with this email address!"; 
    }else{

    
    //Insert data into the database
    $insertquery="INSERT INTO users (username, passw, usertype, firstname, lastname, useremail) VALUES ('$username', '$password', '$usertype', '$firstname', '$lastname', '$email')";
    $results = mysqli_query($db, $insertquery);   
   //$insertquery;

   header('Location: login.php'); 


}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="help.css" rel="stylesheet">
    <script src="https://www.google.com/jsapi"></script>
    <script src="help.js"></script>
    
<title>Sign up</title>
</head>

<body>
    
<div class="container">
    <h1 class="page-header text-center">iWardrobe</h1>

    <hr>
    
    
    <div class="form-container">
<form action = "" method = "post">
    <h2 class="text-center">Create An Account</h2>
    <br>
    <a class="popup_help">Click here for help</a>
<div class="background_hover" style="display: none;">
	<span class="helper"></span>
	<div>
		<div class="popupCloseButton">×</div>
		<h2><ul>
  <li>Create a username for your login</li>
  <li>Create a password for your login</li>
  <li>Choose either a carer or service user account</li>
  <li>Enter your first name</li>
  <li>Enter your last name</li>
  <li>Enter your email address</li>
  <li>Once you have finished, click the sign up button</li>
</ul></h2>
	</div>
</div>
<br>
    <div <?php if (isset($name_error)): ?>class="form-group form_error"  <?php endif ?> >
        <label>Username:</label>
        <input type ="text" name="uname" class="form-control" required="required" placeholder="Username" value="<?php echo $username; ?>">
        <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="pword" class="form-control" required="required" value = "" placeholder="Password">
    </div>

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">User Type:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required name="utype">
    <option selected>Choose...</option>
    <option value="1">Carer</option>
    <option value="2">Service User</option>
   </select> 
  

<div class="form-group">
  <label>First name:</label>
        <input type ="text" name="fname" class="form-control" required="required" value = "" placeholder="Firstname">
    </div>

    <div class="form-group">
    <label>Last name:</label>
        <input type ="text" name="lname" class="form-control" required="required" value = "" placeholder="Lastname">
    </div>

    <div <?php if (isset($email_error)): ?> class="form_error form-group" <?php endif ?> >
    <label>Email Address:</label>
        <input type ="text" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
        <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
    </div>
    <br>

    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
</form>   
    </div>


<hr>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>

<script>  
 $('form').on('submit',function(){
           alert('Sign up successful!');
});
 </script>  
