<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="attend_pass.css">
</head>
<div class="container">
<video autoplay loop muted plays-inline class="back-video">
            <source src="attend_pass.mp4" type="video/mp4"> 
        </video>
<div class="content">
<body>

<?php
$host = 'localhost'; // or your host name
$dbname = 'attendance_project_database'; // your database name
$username = 'root'; // your database username
$password = 'Chelseas#10'; // your database password
$con = new mysqli($host,$username,$password,$dbname);
$userid = $_POST["userid"];
$code = $_POST["code"];
$studentLati = $_POST["lati"];
$studentLong = $_POST["long"];
date_default_timezone_set("US/Eastern");
$date = date("Y-m-d");
if($studentLati == ""){
    echo "<div id='fail2'>No Location Entered ⚠️</div>";
    echo"<form action ='./student_sign_attend.php' method = 'post'>";
    echo'<input type="hidden" name="userid" value=' . $userid . '>';
    echo '<input type="submit" value="Try again">';
}
else{
$attendance = "SELECT instructor_lat,instructor_long FROM attendance WHERE student_id='$userid' AND call_code = '$code'";
$result = $con->query($attendance);
if ($result->num_rows == 0){
    echo "<div id='fail0'>Sign In Failed: Invalid Code</div>";
    echo"<form action ='./student_sign_attend.php' method = 'post'>";
    echo'<input type="hidden" name="userid" value=' . $userid . '>';
    echo '<input type="submit" value="Try again">';
}else{
    $row = $result->fetch_assoc();
    $lati_diff = floatval($row['instructor_lat'])-floatval($studentLati);
    $long_diff = floatval($row['instructor_long'])-floatval($studentLong);
    if(abs($long_diff) > .005 || abs($lati_diff) > .005){
        echo "<div id='fail2'>Longitude and Latitude out range, go to the classroom</div>";
        echo"<form action ='./student_sign_attend.php' method = 'post'>";
        echo'<input type="hidden" name="userid" value=' . $userid . '>';
        echo '<input type="submit" value="Try again">';
    }else{
        $student_loc = "UPDATE attendance SET student_lat = '$studentLati',student_long='$studentLong' WHERE student_id='$userid' AND call_code = '$code'";
        $attend= "UPDATE attendance SET if_attended = 1 WHERE student_id='$userid' AND call_code = '$code' ";
        $con->query($student_loc);
        $con->query($attend);
        echo "<div id='pass'>Sign In successful</div>";
       
    }
}
}
echo"<form action ='./student_homepage.php' method = 'post'>";
echo'<input type="hidden" name="userid" value=' . $userid . '>';
echo '<input type="submit" value="Go to Homepage" id = "homepage">';
?>
</div>
</div>
<input type="submit" value="Sign Out">