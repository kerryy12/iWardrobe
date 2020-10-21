<script>
    // Check if the user's browser suports location and then get user's current location
  if('geolocation' in navigator){
      console.log('geolocation is available');
     navigator.geolocation.getCurrentPosition(position => {
       const lat = position.coords.latitude;
       const lon = position.coords.longitude;
       document.getElementById('latitude').textContent = lat;
       document.getElementById('longitude').textContent = lon;
     //console.log(position);
     
  });
  }else{
    console.log('geolocation is not available');
  }
    </script>
<?php

 
session_start();

$userid = $_SESSION['userid'];

$key = "b89b5028278d0c67292f9cc2208094f1";

$lat="54.5973";

$lon="-5.9301";

 

$api = "http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=".$key;

 

$response = file_get_contents($api);

 

$data = json_decode($response,true);

 

//print_r($data);

 

$temp = $data['main']['temp']-273; // convert to Celsius

$desc = $data['weather'][0]['description'];

$icon = $data['weather'][0]['icon'];

$city = $data['name'];

 

//echo "\n\n"; // clear after print_r

 

//echo "Temperature: ".$temp."\n";

//echo "Description: ".$desc."\n";

//echo "Icon       : ".$icon."\n";

//echo "City       : ".$city."\n";

$sql = "INSERT INTO weather (userid, city,temperature,icon,descrip) VALUES($userid,'$city', $temp, '$icon', '$desc')";
$result = $conn->query($sql);
//echo $sql;


$result= "SELECT * from weather where userid=$userid";
if($result>0){
 $update = "UPDATE weather SET city=$city, temperature=$temp, icon=$icon, descrip=$desc WHERE userid=$userid";  
}else{
    $sql = "INSERT INTO weather (userid, city,temperature,icon,descrip) VALUES($userid,'$city', $temp, '$icon', '$desc')"; 
}

?>
