<?php
include("connect.php");
$userid=$_GET['userid'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/374b10755b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="help.css" rel="stylesheet">
    <link rel="stylesheet" href="all.min.css">
    <script src="https://www.google.com/jsapi"></script>
    <script defer src="script.js"></script>
    <script src="help.js"></script>
   
    

    
<title>Add carer</title>
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

<table> 

<form method = "POST">
<?php
if(array_key_exists('update', $_POST)) {
    Update_table();
}


$sql = "SELECT * FROM users  WHERE userid = $userid";
$result = $conn->query($sql);
//echo $sql;
if(!$result){
  echo $conn -> error;
}


//while ($row = $result->fetch_assoc()){
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $row = $rows[0];
  
  
  echo "<tr>";
  echo"<td><h2 class = 'font-weight-bold'> <input = text name='userid' value='" .  $row['userid'] ."' readonly /></td>";
  echo"<td><h2 class = 'font-weight-bold'>  <input = text name = 'firstname' value='" . $row['firstname'] ."' /></td>";
  echo"<td><h2 class = 'font-weight-bold'>  <input = text name = 'lastname' value='" . $row['lastname'] ."' /></td>";
  echo"<td><h2 class = 'font-weight-bold'>  <input = password name = 'passw' value='" . $row['passw'] ."' /></td>";
  echo"<td><h2 class = 'font-weight-bold'>  <input = text name = 'useremail' value='" . $row['useremail'] ."' /></td>";
  //echo"<td> <button type = 'button'>Update</button></td>";
  //echo "<td> <a href='edit.php?clothingid=".$clothingid."'>Edit</a></td>";
  echo"</tr>";
 // print_r($GLOBALS);
//}

function Update_table(){
include("connect.php");
 $sql = "UPDATE users SET firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."', passw='".$_POST['passw']."', useremail='".$_POST['useremail']."' WHERE userid=".$_POST['userid'];
 //echo $sql;
 $result = $conn->query($sql);
//echo $sql;
if(!$result){
  echo $conn -> error;
}
};
?>
<input type = "submit" name= "update" class="button" value="update" />
</form>
</table>


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