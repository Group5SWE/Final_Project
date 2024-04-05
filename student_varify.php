<html>
<head>
<title>Student Account Varify</title>
</head>
<body>
<?php
$host = 'localhost'; // or your host name
$dbname = 'student'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password
$con = new mysqli($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
$userid = $_POST["student_id"];
$userpw = $_POST["student_pw"];


$correctpw = "SELECT password FROM `student` where student_id='$userid'";
$result = $con->query($correctpw);
if($result->num_rows>0 && $result->num_rows<2 ){
	while($row = $result->fetch_assoc()){
		if ($row["password"] == $userpw){
			echo "<h1>Login successful!</h1>";
			echo '<form action= "./student_homepage.php" method = "post">';
			echo '<input type="hidden" name="userid" value=' . $userid . '>';
			echo '<input type="submit" value="goto homepage">';
			echo "</form>";	
		}
		else{
			echo "<h1>Error!</h1>";
			echo "wrong password";
		}
	}
}
else{
	echo "<h1>Error!</h1>";
	echo "no user found";
}
?>
</body>
</html>