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
?>
</body>
</html>