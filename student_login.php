<html>
<head>
<title>Student Login</title>
<style>
        .content input[type="submit"] {
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 24px;
            border: 2px solid #fff;
            padding: 14px 70px;
            border-radius: 50px;
            margin-top: 20px;
            transition: 0.3s;
            cursor: pointer;
            background: transparent;
        }
        .content input[type="submit"]:hover {
            background-color: #fff;
            color: black;
        }
    </style>
<link rel="stylesheet" href="login.css">

</head>
<body>
<div class="container">
        <video autoplay loop muted plays-inline class="back-video">
            <source src="videoIH.mp4" type="video/mp4"> 
        </video>	
<div class='content'>
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
	
	
	$userid = $_POST["student_id"];
	$userpw = $_POST["student_pw"];
	$student = "SELECT student_id, password FROM `student` WHERE student_id='$userid';";
	$result = $con->query($student);
if($userid=="0"){
	
	echo "<h1>Welcome!</h1>";
}else{
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		if ($row['password'] == $userpw && $row['student_id'] == $userid){
			echo "<h1>Login successful!</h1>";
			echo '<form action= "./student_homepage.php" method = "post">';
			echo '<input type="hidden" name="userid" value=' . $userid . '>';
			echo '<input type="submit" value="goto homepage">';
			echo "</form>";
	
		}
		else{
			echo "<div id='error'>Error!</h1>";
			echo "<h1>wrong password</div>";
		}
	}
}
else{
	echo "<div id='error'>Error!";
	echo "<br>no user found</div>";
}
}
?>

<div id="form">
<h1>Student Login</h1>
<form METHOD="post" ACTION="student_login.php">
<label for="student_id" id="title_box">Student id:</label>
<INPUT style="width:100%; height:30px; text-align: left;" TYPE="text" SIZE="9" MAXLENGTH="9" minlength="9" NAME="student_id">
<br><br>
<label for="student_pw" id="title_box">Password:</label>
<INPUT style="width:100%; height:30px; text-align: left;" TYPE="password" SIZE="20" MAXLENGTH="20" NAME="student_pw">
<br><br>
<input type="submit" value="Login">
</form>
</div>
</div>
</body>
</html>