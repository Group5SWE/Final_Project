<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="student_attend.css">
</head>
<div class="bg">
<div class="banner">
	<h1>ATTENDANCE</h1>
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
$instructor_id=$_POST["userid"];

$course = "SELECT DISTINCT course_number FROM `courses` WHERE instructor_id='$instructor_id'";
$result1 = $con->query($course);
if($result1->num_rows>0){
	echo"<table>";
	echo"<tr>";
    echo"<th>Course Number</th>";
    echo"<th>Student ID</th>";
	echo"<th>Date</th>";
    echo"<th>Attended?</th>";
  	echo"</tr>";
	while($row = $result1->fetch_assoc()){
		
        $course_id = $row["course_number"];
		$allattend = "SELECT * FROM `attendance` WHERE course_number='$course_id'";
        $result2 = $con->query($allattend);
        if($result2->num_rows>0){
	        while($row = $result2->fetch_assoc()){
                if($row["if_attended"] == 1){
					echo"<tr>";
					echo"<td>".$row["course_number"]."</td>" ;
					echo "<td>".$row["student_id"]."</td>";
					echo"<td>".$row['date']."</td>";
					echo"<td bgcolor = '#2ECC71'> Yes </td>";
					echo"</tr>";
		        }else{
					echo"<tr>";
					echo"<td>".$row["course_number"]."</td>" ;
					echo "<td>".$row["student_id"]."</td>";
					echo"<td>".$row['date']."</td>";
					echo"<td bgcolor = 'red'> No </td>";
					echo"</tr>";
                }
		    }
    
	    }
	}

		echo "<br><br>";
		echo '<form action= "./instructor_homepage.php" method = "post">';
		echo '<input type="hidden" name="userid" value=' . $instructor_id . '>';
		echo '<input type="submit" value="Go To Homepage" id="homepage">';
		echo "</form>";
	
}
else{
	echo "<h1>Error!</h1>";
	echo "no user found";
}
echo "</table>";
echo"Students Who have too many absenses:";
$student = "SELECT DISTINCT student_id FROM `courses` WHERE instructor_id='$instructor_id'";
$result3 = $con->query($student);
$counter1 = 0;
if($result3->num_rows>0){

	while($row = $result3->fetch_assoc()){

		$counter2=0;
		$student_id = $row["student_id"];
		$attend = "SELECT if_attended FROM `attendance` WHERE student_id='$student_id'";
		$result4 = $con->query($attend);
		if($result4->num_rows> 0){
			while($row = $result4->fetch_assoc()){
				$counter2++;
				if ($counter2 > 2){
					
					$counter1++;
					if($counter1 == 1){
						echo"<table>";
						echo"<tr>";
						echo"<th>Student ID</th>";
						echo"</tr>";
					}
					if($counter2==3){
					echo"<tr>";
					echo"<td>".$student_id."</td>";
					echo"</tr>";
					}
				}
			}
		}

	} 
}
if ($counter1 == 0){
	echo 'None :)';
}
?>

</body>
</html>