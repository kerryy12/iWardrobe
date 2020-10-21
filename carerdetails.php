<?php
 session_start();
 $userid = $_SESSION['userid'];
 include("connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
<title>Carer Details</title>
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
      <a class="nav-item nav-link" href="carerdetails.php">Account</a>
      <a class="nav-item nav-link" href="insertclothes.php">Upload Clothing</a>
      <a class="nav-item nav-link" href="clothinglog.php">Clothing Log</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>  


<hr> 

<br>

<table> 

  <?php
$sql = "SELECT * FROM users WHERE userid=$userid";
//echo $sql;
$result = $conn->query($sql);
//echo $sql;
if(!$result){
  echo $conn -> error;
}


while ($row = $result->fetch_assoc()){
  
  
  $userid=$row['userid'];

  echo "<tr>";
  
 // echo"<td>" . $row['clothingid'] ."</td>";
  echo"<td>" . $row['firstname'] ."</td>"; 
  echo"<td>" . $row['lastname'] ."</td>";
  echo"<td>" . $row['useremail'] ."</td>";
  echo"<td>" . $row['passw'] ."</td>";
  echo "<td><a href='updatecarer.php?userid=".$userid."'>Edit</a></td>";
  echo"</tr>";
}

?>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>