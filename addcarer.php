<?php
 session_start();
 $userid = $_SESSION['userid'];
 
 // include php mailer
 use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

 include("connect.php");

 if(isset($_POST['carer-submit'])){

    //Get form  data
    $email = $_POST['email'];

    //Sanitise the form data
    $email = $conn->real_escape_string($_POST['email']);

    //Generate the verfication key
     $vkey = md5(time() .$email);
    
     $sql = "SELECT * FROM users WHERE useremail= '$email'";
    //echo $sql;
    $stmt=$conn->prepare($sql);
    //$stmt->bind_param();
    //$stmt->execute();
    $result = $conn->query($sql);
    //$result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $carerid = $row['userid'];


     // Insert into the database
$insertquery = "INSERT INTO carer(carerid, userid, careremail, vkey, verified) VALUES ('$carerid','$userid', '$email', '$vkey', '0')";
//echo $insertquery;
$result = $conn->query($insertquery);

// Send the verification email
if($insertquery){
     $to = $email;
$subject = "Service user carer request";
$message = '<html><body style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
<table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
    <tr>
        <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                <tr>
                    <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
                        <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                            <p target="_blank" style="text-decoration:none;color:#ffffff;">Hello carer!</p>                                  
                            <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
                        <h4 style="font-size:20px;margin-bottom:10px;line-height:1.25;">Hello</h4>
                        <p style="margin-top: 20px;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;">
                            Patient sent to you for confirm.
                            To confirm, please click here <a href="http://localhost/40149957/confirmation.php?vkey='.$vkey.'">Click Here.</a>
                        </p>
                    </td>
                </tr>
                
            </table>
        </td>
    </tr>            
</table>

</body></html>'; 

$headers .= "From: bradykerry33@yahoo.com \r\n";
$headers .= "MIME-Version: 1.0" ."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $headers);

}else{
    echo $mysqli->error;
}

$mail = new PHPMailer();

header('Location: thankyou.php'); 

 }

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

        <div class="form-container">
        <form action = "" method = "post">
        <h2 class = "text-center">Register Your Carer</h2>
<br>

<a class="popup_help">Click here for help</a>
<div class="background_hover" style="display: none;">
	<span class="helper"></span>
	<div>
		<div class="popupCloseButton">×</div>
		<h2><ul>
            <li>Ask your carer for their email address and then enter their email address in the box!</li>
            <li> Once you have done this, click on the submit button.</li>
       </ul> </h2>
	</div>
</div>

<br>
        <div class="form-group">
        <label>Carer's Email Address:</label>
        <input type="email" name="email" class="form-control" required="required" value = "" placeholder="Carer's Email Address">
    </div>
 <br>
    <button type="submit" name="carer-submit" class="btn btn-warning btn-lg btn-block">Submit</button>

        </form>

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