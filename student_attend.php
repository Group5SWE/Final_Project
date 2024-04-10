<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="student_attend.css">

</head>
<div class="banner">
	<h1>ALL ATTENDANCE</h1>
</div>
<body>

<?php
$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
$student_id=$_POST["userid"];

$allattend = "SELECT * FROM `attendance` WHERE student_id='$student_id'";
$result = $con->query($allattend);

if($result->num_rows>0){
	echo"<br><div id='title_text'>Attendance Record:</div>";
	echo"<table>";
	echo"<tr>";
    echo"<th>Course Number</th>";
    echo"<th>Date</th>";
    echo"<th>Attended?</th>";
  	echo"</tr>";
	while($row = $result->fetch_assoc()){
		if($row["if_attended"] == 1){
			echo"<tr>";
			echo"<td>".$row["course_number"]."</td>" ;
			echo"<td>".$row['date']."</td>";
			echo"<td bgcolor = '#2ECC71'> Yes </td>";
			echo"</tr>";
		}else{
			echo"<tr>";
			echo"<td>".$row["course_number"]."</td>" ;
			echo"<td>".$row['date']."</td>";
			echo"<td bgcolor='red'> No </td>";
			echo"</tr>";
		}
	}
	echo"</table>";
	echo"<br><div id='title_text'>Classes you missed:</div>";
	echo"<table>";
	echo"<tr>";
    echo"<th>Course Number</th>";
    echo"<th>Date</th>";
  	echo"</tr>";
	$allattend = "SELECT * FROM `attendance` WHERE student_id='$student_id' AND if_attended=0";
	$result = $con->query($allattend);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			echo"<tr>";
			echo"<td>".$row["course_number"]."</td>" ;
			echo"<td>".$row['date']."</td>";
			echo"</tr>";
			
		}
	}
	echo "</table>";
		echo "<br><br>";
		echo '<form action= "./student_homepage.php" method = "post">';
		echo '<input type="hidden" name="userid" value=' . $student_id . '>';
		echo '<input type="submit" value="Go To Homepage" id="homepage">';
		echo "</form>";
	
}
else{
	echo "<h1>Error!</h1>";
	echo "no user found";
}

?>

</body>
</html>