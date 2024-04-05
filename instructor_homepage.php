<html>
<head>
<title>Instructor Portal</title>
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
<h1>Welcome to instructor portal</h1>
<br><br>
<?php
  $userid = $_POST["instructor_id"];
	echo '<form action= "./instructor_view_attend.php" method = "post">';
	echo '<input type="hidden" name="userid" value=' . $userid . '>';
  echo '<input type="submit" value="View Student\'s Attendance">';
  echo '<input type="submit" value="Generate QR code">';
	echo "</form>";
?>
</body>
</html>