<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="instructor_qr.css">
</head>
<body>
<div class = "container">

<?php
	$userid = $_POST["userid"];
	$crn = $_POST["crn"];
	$code = rand(100000,999999);
	$lati = $_POST["lati"];
	$long = $_POST['long'];
	$date = $_POST['date'];



//create new rows in attendance db with all students registered the course
//put $code variable for the code atribute and defalt everyone's attendance false
$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
if($lati == ""){
    echo "<div id='fail'>No location Entered</div>";
    echo"<form action ='./instructor_loc.php' method = 'post'>";
    echo'<input type="hidden" name="userid" value=' . $userid . '>';
    echo '<input type="submit" value="Try again">';
}else{
	require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode ::png($code, $qrcode, 'H', 4, 4);
echo "<img src='".$qrcode."'>";
$student = "SELECT student_id FROM `courses` WHERE course_number='$crn'";
$result = $con->query($student);
while($row = $result->fetch_assoc()){
	$student_id = $row["student_id"];
	$attend = "INSERT INTO attendance (course_number,student_id,instructor_lat,instructor_long,call_code,if_attended,`date`) VALUES ('$crn','$student_id','$lati','$long','$code',0,'$date')";
	$con->query($attend);
}
}
echo"<form action ='./instructor_homepage.php' method = 'post'>";
echo'<input type="hidden" name="userid" value=' . $userid . '>';
echo '<input type="submit" value="Go to Homepage" id="homepage">';
?>

</div>
</body>
</html>