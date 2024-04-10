<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link rel="stylesheet" href="student_homepage.css">
</head>
<body>
<img src="edu.gif" alt="GIF" class="side-gif">
<div class="container">
      
    <div class="content">
<h1>Welcome to Student Portal</h1>
<br><br>
<?php
  $userid = $_POST["userid"];
  
  echo "" . $userid;
  echo '<form action="./student_attend.php" method="post">';
  echo '<input type="hidden" name="userid" value="' . $userid . '">';
  echo '<input type="submit" value="View your Attendance" class="attendance-button">';
  echo "</form>";
  
  echo '<form action="./student_sign_attend.php" method="post">';
  echo '<input type="hidden" name="userid" value="' . $userid . '">';
  echo '<input type="submit" value="Sign in attendance" class="attendance-button">';
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