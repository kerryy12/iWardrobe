
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Login</title>
</head>

<body>
    
<div class="container">
    <h1 class="page-header text-center">iWardrobe</h1>

    <hr>
    
    <div class="form-container">
<form action="signin.php" method = "post">
    <h2 class="text-center">Log Into Your Account</h2>
    <br>
    <div class="form-group">
        <label>Username:</label>
        <input type ="text" name="username" class="form-control" required="required"  placeholder="Username" value = "<?php if(isset($_COOKIE['member_login']))?>" class="input-field"/>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required="required" placeholder="Password" value = "<?php if(isset($_COOKIE['member_password']))?>" class="input-field"/>
    </div>
    <div class="checkbox">
        <label>
<input type ="checkbox" name = "remember" value = <?php if(isset($_COOKIE['member_login'])) { ?> checked <?php } ?> /> Remember me
        </label>
    </div>
    <br>
    <button type="submit" name="login-submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
</form>   
    </div>

 <a href="forgotpassword.php" class="link">Forgot password?</a>
<hr>
<a href="signup.php" class="link">Need an account? Sign up</a>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>