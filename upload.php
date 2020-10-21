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
    
<title>Upload</title>
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
      <a class="nav-item nav-link" href="insertclothes.php">Upload Clothing</a>
      <a class="nav-item nav-link" href="clothinglog.php">Clothing Log</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>   

        <div class="container"> 
  
        <hr>
        <br>
<?php

if(isset($_POST['insert-submit'])){
    
  include("connect.php");

  $target_dir = "imguploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
//$insertquery = "INSERT INTO `clothingpicture`(`picture`) VALUES ('$target_file')";
//$result = $conn->query($insertquery); 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["pic"]["tmp_name"]);
  if($check !== false) {
    //echo "<br>File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<h3 class='text-center'><br>File is not an image.<br>";
    $uploadOk = 0;
  }

// check if file already exists
if (file_exists($target_file)) {
  echo "<h3 class='text-center'><br>Sorry, file already exists. Please upload a different file.<br>";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["pic"]["size"] > 500000) {
    echo "<h3 class='text-center'><br>Sorry, your file is too large. Please upload a smaller file.<br>";
    $uploadOk = 0;
  }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<h3 class='text-center'><br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h3 class='text-center'><br>Sorry, your file was not uploaded. Please try again.<br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
      echo "<h3 class='text-center'><br>Picture file, ". basename( $_FILES["pic"]["name"]). " has been successfully uploaded.<br>";
    } else {
      echo "<h3 class='text-center'><br>Sorry, there was a problem with uploading your file. Please try again<br>";
    }
      }
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<img src = '$target_dir' height = '100 width ='100'<br></>";
}

// Get from data
$name= $_FILES['instructions']['name'];
//echo $name;
$tmp_name= $_FILES['instructions']['tmp_name'];
//echo $tmp_name;
$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

// set the directory
$path= "uploads/";
//echo $path;
if (empty($name))
{
echo "<h3 class='text-center'>Please choose a file";
}
else if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
echo "<h3 class='text-center'><br>The file extension must be .mp4, .ogg, or .webm in order to be uploaded<br>";
}


else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
if (move_uploaded_file($tmp_name, $path.$name)) {

echo "<h3 class='text-center'><br>Video file, ". basename( $_FILES["instructions"]["name"]). " has been successfully uploaded.<br>";
}
}
}
}


if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
echo "<video width='320' controls>
<source src='$path/$name' type='video/$fileextension'>
<br>
Your browser does not support the video tag.
</video>";

}

// Get form data
$occasion = $_POST['occasion'];
$tag = $_POST['tags-input'];
$notes = $_POST['notes'];
$userid = $_POST['userid'];


// Sanitize form data
$occasion = $conn->real_escape_string($_POST['occasion']);
$tag = $conn->real_escape_string($_POST['tags-input']);
$notes = $conn->real_escape_string($_POST['notes']);
$userid = $conn->real_escape_string($_POST['userid']);

 //Insert into database
$insertquery = "INSERT INTO `clothing`(`picture`, `pic_dir`,`instructions`, `vid_dir`,`occasion`, `weathertag`, `notes`, `userid`) VALUES ('$target_file', '$target_dir','$name', '$path','$occasion', '$tag', '$notes','$userid')";
$result = $conn->query($insertquery); 
//echo $insertquery;
?>
<br>
  <hr>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>

