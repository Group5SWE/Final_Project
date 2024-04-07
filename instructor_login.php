<html>
<head>
<title>Instructor Login</title>
<style>
div{
	margin-left:25%;
	margin-right:25%;
}

h1{
	text-align:center;
}

input[type=submit]{
	background-color:#2E86C1;
	color:white;
	border:none;
	width:100px;
	height:40px;
	margin-right:50px;
}

input[type=reset]{
	width:120px;
	height:20px;
}
</style>
</head>
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

	$userid = $_POST["instructor_id"];
	$userpw = $_POST["instructor_pw"];
	echo $userid;
	$instructor = "SELECT instructor_id, password FROM `instructor` WHERE instructor_id='$userid';";
	$result = $con->query($instructor);
	
if($userid=="0"){
	echo "<h1>welcome!</h1>";
}else{
if($result->num_rows>0 && $result->num_rows<2 ){
	while($row = $result->fetch_assoc()){
		if ($row['password'] == $userpw && $row['instructor_id'] == $userid){
			echo "<h1>Login successful!</h1>";
			echo '<form action= "./instructor_homepage.php" method = "post">';
			echo '<input type="hidden" name="userid" value=' . $userid . '>';
			echo '<input type="submit" value="goto homepage">';
			echo "</form>";	
			delete('form');
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
}
?>
<div>
<h1>Instructor Login</h1>
<form METHOD="post" ACTION="instructor_login.php" id="form">
<label for="Instructor ID:">Instructor id:</label>
<INPUT style="width:100%; height:30px;" TYPE="text" SIZE="9" MAXLENGTH="9" minlength="9" NAME="instructor_id">
<br><br>
<label for="Instructor ID:">Password:</label>
<INPUT style="width:100%; height:30px;" TYPE="password" SIZE="20" MAXLENGTH="20" NAME="instructor_pw">
<br><br>
<input type="submit" value="Login">
</form>
</div>

</body>
</html>