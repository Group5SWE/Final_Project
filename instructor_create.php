<html>
<head>
<title>Page Title</title>
</head>
<body>
<button onclick="getLocation()">click to get current longitude and latitude</button>

<p id="demo"></p>

<?php
$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
	$userid = $_POST["userid"];
	$date = date("m/d/Y");
	$course = "SELECT course_number FROM `courses` WHERE instructor_id='$userid';";
	$result = $con->query($course);
	echo "Class CRN:";
	echo '<form action= "./instructor_qr.php" method = "post" required>';

		echo '<label for="long">classroom longitude:</label>';
		echo '<input type="text" name="long" required>';
		echo '<br><label for="land">classroom latitude:</label>';
		echo '<input type="text" name="lati" required>';
	while($row = $result->fetch_assoc()){
		echo '<input type="hidden" name="userid" value=' . $userid . 'required>';
		echo '<input type="hidden" name="crn" value=' . $row['course_number'] . 'required>';
		echo '<br><input type="submit" value=' . $row['course_number'] . '>';
		echo "</form>";
	}
	echo "Attendance date:" . $date;
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
  "<br>Longitude: " + position.coords.longitude;
}
</script>

</body>
</html>

