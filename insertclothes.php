<?php
session_start();

$userid = $_SESSION['userid'];
include("connect.php");

$sql = "SELECT carer.carerid, carer.userid, users.firstname, users.lastname FROM carer INNER JOIN users ON carer.userid = users.userid WHERE carerid = $userid";
$result = $conn->query($sql);
//echo $sql;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="tagify.css">

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
      <a class="nav-item nav-link" href="carerdetails.php">Account</a>
      <a class="nav-item nav-link" href="insertclothes.php">Upload Clothing</a>
      <a class="nav-item nav-link" href="clothinglog.php">Clothing Log</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>   

        <div class="container"> 

        
        <hr>
      <br>
       
        <div class="form-container">
        
        <form action = "upload.php" method = "post" enctype="multipart/form-data">
        <h5 class = "text-center">Please upload an outfit for your service user</h5>
        <br>

        <div class="form-group">
    <label for="Picture">Outfit picture:</label>
    <input type="file" class="form-control-file" id="Picture" required="required" name="pic" >
    </div>

      <br>

   <div class="form-group">
   <label for="Instructions">Instructions Video:</label>
    <input type="file" class="form-control-file" required="required" name="instructions"/>
     </div>
 
    <br>  
        <div id = "MyDiv">
   <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Occasion:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required="required" name="occasion">
    <option selected>Choose...</option>
    <option value="Normal day">Normal day</option>
    <option value="Special occasion">Special occasion</option>
   </select> 
   </div>

  <br>
 
  <p>Suitable Weather Condition:</p>
  <textarea name ="tags-input"></textarea>
  <script src="JavaScript/tagify.min.js"></script>
  <script>
    var input = document.querySelector('textarea')
    var tagify = new Tagify(input,{
      enforceWhitelist:true,
      whitelist: ["light rain", "moderate rain", "overcast clouds","heavy intensity rain", "clear sky", "broken clouds", 
      "few clouds", "scattered clouds", "thunderstorm", "drizzle", "very heavy rain", "freezing rain", "light intensity shower rain", 
      "shower rain", "light snow", "snow", "heavy snow", "sleet", "rain and snow", "light shower snow", "heavy shower snow", "mist",
      "light intensity drizzle", "rain", "heavy intensity drizzle", "drizzle rain", "light intensity drizzle rain", "heavy intensity drizzle rain",
      "shower rain and drizzle", "heavy shower rain and drizzle", "shower drizzle", "extreme rain", "heavy intensity shower rain", "ragged shower rain",
      "Light shower sleet", "Shower sleet", "Light rain and snow"],
     
    })
    </script>

    <br>

<div class="form-group">
    <label for="Notes">Notes</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notes"></textarea>
  </div>
 
<br>
<div id = "MyDiv">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Service Users:</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required="required" name="userid">
        <option>Select</option>
        <?php
       
        while($row = mysqli_fetch_array($result)){
         echo '<option value="'. $row['userid'].'">' . $row['firstname']. ' '. $row['lastname'].'</option>';
        }
        ?>
        </select>
        </div>

      <br>
  <button type="submit" name="insert-submit" value="Upload Image" class="btn btn-primary btn-lg btn-block">Insert</button>
  
        </form>
        
        </div>

        <hr>

        </div>

        



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>