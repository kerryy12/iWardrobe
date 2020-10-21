
<?php

include("connect.php");
include("weather.php");

 
$userid = $_SESSION['userid'];
//echo $userid;

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
 
   
    
    
<title>Clothing</title>
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
        <h2 class= 'text-center font-weight-bold'><span style='color:#FFE74D'>Today's Outfit Choice</h2>
      
        <br>

        <?php
        
        $sql = "SELECT weather.*, c.occasion,c.weathertag, c.notes, c.picture, c.instructions, c.vid_dir 
        FROM weather 
        CROSS JOIN clothing AS c on weather.userid='$userid' and c.userid='$userid' and weather.descrip='$desc' and c.weathertag 
        LIKE '%$desc%' ORDER BY date_time DESC LIMIT 1";
        //echo $sql;

        //$result = $conn -> prepare($sql);
        //$result -> bind_param("ii", $userid, $userid);
        //$result->execute();
        $result = $conn -> query($sql);
if(!$result){
        echo $conn -> error;
}

while ($row = $result->fetch_assoc()){

        
        $notes=$row['notes'];
        $picture=$row['picture'];
        //echo $picture;
        $instructions = $row['vid_dir']; 

        echo"<h2 class = 'text-center font-weight-bold'><span style='color:#FFE74D'><div>$notes</div></h2><br>";
        echo '<img src="'. $picture .'" width = "370" height = "500" /><br>'; 
        echo '<video width="320" height="240" controls><source src="media/<?php echo $instructions; ?>.mp4" type="video/mp4">Your browser does not support the video tag.</video>';
  
         }

        

        ?>
   
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