<html>
<head>
<title>Student Portal</title>
<style>
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: lightblue;
}
</style>
</head>
<body>
<h1>Welcome to student portal</h1>
<br><br>
<?php
  $userid = $_POST["userid"];
  
	echo "welcome" . $userid;
	echo '<form action= "./student_attend.php" method = "post">';
	echo '<input type="hidden" name="userid" value=' . $userid . '>';
	echo '<input type="submit" value="View your Attendance">';
	echo "</form>";
	
	echo '<form action= "./student_sign_attend.php" method = "post">';
	echo '<input type="hidden" name="userid" value=' . $userid . '>';
	echo '<input type="submit" value="Sign in attendance">';
	echo "</form>";
	$host = 'localhost'; // or your host name
	$dbname = 'attendance_project_database'; // your database name
	$username = 'root'; // your database username
	$password = 'Chelseas#10'; // your database password
	$con = new mysqli($host,$username,$password,$dbname);
	$attend = "SELECT if_attended FROM attendance WHERE student_id='$userid'";
	$result = $con->query($attend);
	$counter = 0;
	while ($row = mysqli_fetch_array($result)) {
		if ($row["if_attended"]==0) {
			$counter++;
		}
	}
	if ($counter == 3) {
		echo "<div id='warning'> WARNING! ATTEND CLASS OR ELSE!!!</div>";	
	}
	if ($counter > 3){
		echo "<div id='cooked'>YOU'RE COOKED!!! GGs!!!!!</div><br><br>";
		echo"<img src='cooked.png'>";
	}
?>
</body>
</html>