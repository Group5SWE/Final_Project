<!DOCTYPE html>
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
	$student = "SELECT instructor_id, password FROM `instructor`;";
	$result = $con->query($student);
	echo "<h1>Welcome!</h1>";
	echo '<form id = "form" METHOD="post" ACTION="instructor_homepage.php" onsubmit="return checkLogin(this)">';
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		echo '<input type="hidden" id = "'.$row["instructor_id"].'"value="'.$row["password"].'">';
    }
}
?>


<h1>Instructor Login</h1>

<label for="instructor_id">Instructor id:</label>
<INPUT required style=" width:100%; height:30px;" TYPE="text" SIZE="9" MAXLENGTH="9" minlength="9" NAME="userid" id="userid">
<br><br>
<label for="instructor_pw">Password:</label>
<INPUT required style="width:100%; height:30px;" TYPE="password" SIZE="20" MAXLENGTH="20" NAME="instructor_pw" id="instructor_pw">
<br><br>
<input type="submit" value="Login">
<div id="error"></div>
</form>
</div>
</div>
<script  type="text/javascript">
        function print(elemId, hintMsg){
		document.getElementById(elemId).innerHTML = hintMsg;
	}
    function checkLogin(form){
	try {
		var instructor_id_num = form.userid.value;
	var correctPassword = document.getElementById(instructor_id_num).value;
    var passwordCheck = form.instructor_pw.value;
    if(passwordCheck != correctPassword){
		print("error","Incorrect Password: Please Try again");
			return false;
    }
	} catch (error) {
		print("error","Error: No Instructor ID Found");
		return false;
	}

}
</script>
</body>
</html>