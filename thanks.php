<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Thank you</title>
</head>

<body>

<div class="container">
    <h1 class="page-header text-center">iWardrobe</h1>

    <?php
    if(isset ($_POST['signup-submit'])) {
    echo "<h1 class='text-center'>'Thank you for signing up with iWardrobe! You may now sign in'</h1>";
    }
    ?>
    <button type="submit" ahref="login.php" class="btn btn-primary btn-lg btn-block">Sign in</button>

    <hr>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>