<html>
<head>
<title>Page Title</title>
</head>
<body>
<button onclick="getLocation()">click to get current longitude and latitude</button>
<p id="demo"></p>
<?php
    $userid = $_POST["userid"];
    echo"<form action ='./instructor_create.php' method = 'post'>";
    echo '<input type="hidden" name="userid" value=' . $userid . '>';
    echo '<label for="lati">classroom latitude:</label>';
	echo '<input readonly type="text" id = "lati" maxlength = "7" name="lati">';
	echo '<label for="long">classroom longitude:</label>';
	echo '<input readonly type="text" id = "long" name="long" maxlength = "7" >';
    echo '<br><input type="submit">';
?>

<script>
const x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
  return false
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