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
    <script src="https://kit.fontawesome.com/374b10755b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="all.min.css">
    <link href="style.css" rel="stylesheet">
    <script defer src="JavaScript/script.js"></script>
    <script defer src="JavaScript/weather.js"></script>
    
<title>Homepage</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="btn-group" role="group" aria-label="First group">
        <a class="fas fa-home fa-3x" style = "color:  #FFE74D" href="patienthome.php"></a>
        </div>
     
        <div class="btn-group" role="group" aria-label="Second group">
        <a class="fas fa-tshirt fa-3x" style = "color: #FFE74D" href="clothing.php"></a>
        </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="btn-group" role="group" aria-label="Third group">
        <a class="fas fa-user-edit fa-3x" style = "color: #FFE74D" href="patientupdate.php"></a>
        </div>
        
       
        
        <div class="btn-group" role="group" aria-label="Fourth group">
        <a class="fas fa-users fa-3x" style = "color: #FFE74D" href="addcarer.php"></a>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="btn-group" role="group" aria-label="Fifth group">
        <a class="fas fa-power-off fa-3x" style = "color: #FFE74D" href="logout.php"></a>
        </div>
        </nav> 


<hr>

  <br>
  
<div class="clock">
    <div class="hand hour" data-hour-hand></div>
    <div class="hand minute" data-minute-hand></div>
    <div class="hand second" data-second-hand></div>
    <div class="number number1">1</div>
    <div class="number number2">2</div>
    <div class="number number3">3</div>
    <div class="number number4">4</div>
    <div class="number number5">5</div>
    <div class="number number6">6</div>
    <div class="number number7">7</div>
    <div class="number number8">8</div>
    <div class="number number9">9</div>
    <div class="number number10">10</div>
    <div class="number number11">11</div>
    <div class="number number12">12</div>
  </div>


        
<?php
 if(isset ($_SESSION['firstname'])) {
    // $time variable is set to the current hour in the 24 hour clock format 
    $time = date("H");
    // Sets the $timezone variable according to the current timezone 
    $timezone = date("Europe/Dublin");
    // If the time is less than 1200 hours, show good morning and then the firstname of the person logged in 
    if ($time <= "12") {
        echo "<h2 class='text-center font-weight-bold'><span style='color:#FFE74D'>Good Morning {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is greater than or equal to 1200 hours but less than 1700 hours, show good afternoon and the firstname of the person logged in 
    if ($time > "12" && $time <= "17") { 
        echo "<h2 class='text-center font-weight-bold'><span style='color:#FFE74D'>Good Afternoon {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is between or equal to 1700 and 1900 hours, show good evening and the firstname of the person logged in 
    if ($time > "17" && $time <="20") {
        echo "<h2 class='text-center font-weight-bold'><span style='color:#FFE74D'>Good Evening {$_SESSION['firstname']}!</h1>";
    } else
    // If the time is greater than or equal to 1900 hours, show good night and the firstname of the person logged in. 
    if ($time > "20") {
        echo "<h2 class='text-center font-weight-bold'><span style='color:#FFE74D'>Good Night {$_SESSION['firstname']}!</h1>";
    }

 }
    ?>

    <br>
    <?php
    // Gets the day of the week
    date('w'); 

    if(date('w') == 0){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Sunday.</h3>";
    }else if(date('w') == 1){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Monday.</h3>";
    }else if(date('w') == 2){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Tuesday.</h3>";
    }else if (date('w') == 3){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Wednesday.</h3>";
    }else if (date('w') == 4){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Thursday.</h3>";
    }else if (date('w') == 5){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Friday.</h3>";
    }else if (date('w') == 6){
        echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>Today is Saturday.</h3>";
    }
    ?>

<br>

<?php
// Gets the current date
$getdate = date("Y-m-d");

// Converts US date format to European date format
$timestamp = strtotime($getdate); 
$new_date = date('d-m-Y', $timestamp);

echo "<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'>$new_date </h3>";
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

 <script> 
 // JavaScript to change background dependent on the time of day      
function dayandnight(){
 var currentTime = new Date().getHours();
if (6 <= currentTime && currentTime < 20) {
        document.body.style.backgroundImage = "url('morn.jpg')";  
        document.body.style.backgroundRepeat ="no-repeat";
        document.body.style.backgroundSize = "cover";
        document.body.style.backgroundPosition = "center";
        document.body.style.backgroundAttachment = "fixed";
       
}
else {
        document.body.style.backgroundImage = "url('nighttime.jpg')";   
        document.body.style.backgroundRepeat ="no-repeat";
        document.body.style.backgroundSize = "cover";
        document.body.style.backgroundPosition = "center";
        document.body.style.backgroundAttachment = "fixed";
}   
}
</script>


<script type ="text/javascript">
dayandnight();
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


</html>