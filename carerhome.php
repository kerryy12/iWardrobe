<?php
 session_start();

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
    <script defer src="JavaScript/weather.js"></script>
    <script defer src="JavaScript/script.js"></script>
<title>Homepage</title>
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
        <?php
 if(isset ($_SESSION['firstname'])) {
    // $time variable is set to the current hour in the 24 hour clock format 
    $time = date("H");
    // Sets the $timezone variable according to the current timezone 
    $timezone = date("Europe/Dublin");
    // If the time is less than 1200 hours, show good morning and then the firstname of the person logged in 
    if ($time <= "12") {
        echo "<h1 class='text-center'>Good Morning {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is greater than or equal to 1200 hours but less than 1700 hours, show good afternoon and the firstname of the person logged in 
    if ($time > "12" && $time <= "17") { 
        echo "<h1 class='text-center'>Good Afternoon {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is between or equal to 1700 and 1900 hours, show good evening and the firstname of the person logged in 
    if ($time > "17" && $time <="19") {
        echo "<h1 class='text-center'>Good Evening {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is greater than or equal to 1900 hours, show good night and the firstname of the person logged in. 
    if ($time > "19") {
        echo "<h1 class='text-center'>Good Night {$_SESSION['firstname']}!</h1>";
    }

 }
    ?>
<br>
<div class="weath-container">
         
         <div class="weather-title">
             <p>Today's weather</p>
         </div>
         
         <div class="notification">
         </div>
        
         
     <div class="weather-container">
        
         <div class="weather-icon">
             <img src="icons/unknown.png" alt="">
           </div> 
           
           <div class="temperature-value">
               <p>- °<span>C</span></p>
           </div>

           <div class="temperature-description">
             <p>-</p>
           </div>

           <div class="location">
             <p>-</p>
           </div>

           
           </div>

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