<!DOCTYPE html>
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
	$student = "SELECT student_id, password FROM `student`;";
	$result = $con->query($student);
	echo "<h1>Welcome!</h1>";
	echo '<form id = "form" METHOD="post" ACTION="student_homepage.php" onsubmit="return checkLogin(this)">';
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		echo '<input type="hidden" id = "'.$row["student_id"].'"value="'.$row["password"].'">';
    }
}
?>


<h1>Student Login</h1>

<label for="student_id">Student id:</label>
<INPUT required style=" width:100%; height:30px;" TYPE="text" SIZE="9" MAXLENGTH="9" minlength="9" NAME="userid" id="userid">
<br><br>
<label for="student_pw">Password:</label>
<INPUT required style="width:100%; height:30px;" TYPE="password" SIZE="20" MAXLENGTH="20" NAME="student_pw" id="student_pw">
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
		var student_id_num = form.userid.value;
	var correctPassword = document.getElementById(student_id_num).value;
    var passwordCheck = form.student_pw.value;
   /* if (correctPassword.length == 0){
        print("error","Error: Incorrect student_id or password");
			return false;
    }*/
    if(passwordCheck != correctPassword){
		print("error","Incorrect Password: Please Try again");
			return false;
    }
	} catch (error) {
		print("error","Error: No Student ID Found");
		return false;
	}

}
</script>
</body>
</html>