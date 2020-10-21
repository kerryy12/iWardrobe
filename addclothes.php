<?php
 session_start();
 $carerid = $_SESSION['carerid'];
 include("connect.php");

 if(isset($_POST['submit'])){

  //Get form  data
  $email = $_POST['user'];

  //Sanitise the form data
  $email = $conn->real_escape_string($_POST['user']);

 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Insert clothes</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">iWardrobe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     
      <a class="nav-item nav-link" href ="carerhome.php">Home</a>
      <a class="nav-item nav-link" href="addclothes.php">Add Clothing</a>
      <a class="nav-item nav-link" href="clothinglog.php">Clothing Log</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>  

<div class="container"> 

        <hr>

       
        <div class="form-container">

<form action = "insertclothes.php" method = "post">
<h5 class = "text-center">Choose a Service User</h5>

<select name ="user">
<option>Select</option>
<?php
$sql = "SELECT * FROM carer";
$result = $mysqli_query($conn, $sqli);
while($row = mysqli_fetch_array($result)){
  echo '<option>' . $row['userid'].'</option>';
}
?>
</select>
<button type="submit" name="submit"  class="btn btn-primary btn-lg btn-block">Submit</button>

</form>

</div>

</div>
<hr>

<div class = "date">
<?php
// Gets the current date
$getdate = date("Y-m-d");

// Converts US date format to European date format
$timestamp = strtotime($getdate); 
$new_date = date('d-m-Y', $timestamp);

echo "<p>$new_date </p>";
?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>