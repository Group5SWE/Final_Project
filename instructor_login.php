<html>
<head>
<title>Instructor Login</title>
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
<div class="container">
        <video autoplay loop muted plays-inline class="back-video">
            <source src="videoIH.mp4" type="video/mp4"> 
        </video>	
<div class='content'>
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
	$instructor = "SELECT instructor_id, password FROM `instructor` WHERE instructor_id='$userid';";
	$result = $con->query($instructor);
	
if($userid=="0"){
	echo "<h1>Welcome!</h1>";
}else{
if($result->num_rows>0 && $result->num_rows<2 ){
	while($row = $result->fetch_assoc()){
		if ($row['password'] == $userpw && $row['instructor_id'] == $userid){
			echo "<h1>Login successful!</h1>";
			echo '<form action= "./instructor_homepage.php" method = "post">';
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
<div>
<h1>Instructor Login</h1>
<form METHOD="post" ACTION="instructor_login.php" id="form">
<label for="Instructor ID:" id="title_box">Instructor id:</label>
<INPUT style="width:100%; height:30px;" TYPE="text" SIZE="9" MAXLENGTH="9" minlength="9" NAME="instructor_id">
<br><br>
<label for="Instructor ID:" id="title_box">Password:</label>
<INPUT style="width:100%; height:30px;" TYPE="password" SIZE="20" MAXLENGTH="20" NAME="instructor_pw">
<br><br>
<input type="submit" value="Login">
</form>
</div>
</div>
</body>
</html>