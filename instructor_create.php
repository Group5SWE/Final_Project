<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="instructor_create.css">
<style>
body, html {
  height: 100%;
}

.bg {
  /* The image used */
  background-image: url("satellite.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body>

<div class ="bg">
<div class="container">
<?php
$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
$lati = $_POST['lati'];
$long = $_POST['long'];
	$userid = $_POST["userid"];
	date_default_timezone_set("US/Eastern");
	$date = date("Y-m-d");
	$course = "SELECT course_number FROM `courses` WHERE instructor_id='$userid';";
	$result = $con->query($course);
	$counter = 0;
	$current_crn = '';
	
	while($row = $result->fetch_assoc()){
		$counter++;
		if ($row['course_number'] != $current_crn){
		echo '<form action= "./instructor_qr.php" method = "post">';
		
		echo '<input type="hidden" id = "lati" value = "'.$lati.'"maxlength = "7" name="lati">';
		echo '<input type="hidden" id = "long" name="long" value = "'.$long.'" maxlength = "7" >';
		echo '<input type="hidden" name="date" value=' . $date . '>';
		echo '<input type="hidden" name="userid" value=' . $userid . '>';
		//echo '<input type="text" name="crn" value=' . $row['course_number'].'>';
			echo 'Class CRN: <input type="submit" name = "crn" value=' . $row['course_number'] . '><br>';
			$current_crn = $row['course_number'];
		}
			
		
	}
	echo '<div id = "row_number" value = "'.$counter.'">';
	echo "</form>";
	echo "<br>Attendance date:" . $date;
?>

</div>
</body>
</html>

