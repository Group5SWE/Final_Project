<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="student_sign_attend.css">
</head>
<body>
<img src="submit2.gif" alt="GIF" class="side-gif">
<button onclick="getLocation()">click to get current longitude and latitude</button>
<p id="demo"></p>
<?php

$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
$userid = $_POST["userid"];
date_default_timezone_set("US/Eastern");
$date = date("Y-m-d h:i:sa");
echo"Attendance Date: " . $date;
echo '<form action= "./attend_pass.php" method = "post">';
echo '<label for="lati">latitude:</label>';
		echo '<input readonly type="text" id = "lati" maxlength = "7" name="lati" required>';
		echo '<br><label for="long">longitude:</label>';
		echo '<input readonly type="text" id = "long" name="long" maxlength = "7" required><br>';
        echo 'Please Enter 6 digit code: <input type="text" id="code" name="code" maxlength = "6" required></input><br>';
		echo '<input type="hidden" name="date" value=' . $date . '>';
        echo '<input type="hidden" name="userid" value=' . $userid . '>';
        echo '<br><input type="submit" value= "Submit">';
        echo "</form>";
        echo"<form action ='./student_sign_attend.php' method = 'post'>";
        echo'<input type="hidden" name="userid" value=' . $userid . '>';
        echo '<input type="submit" value="Go to Homepage">';
?>
<script>
const x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude ;
  var input1 = document.getElementById('lati');
	var input2 = document.getElementById('long');
	input1.value = position.coords.latitude.toString().substring(0,8);
	input2.value = position.coords.longitude.toString().substring(0,9);
}


</script>