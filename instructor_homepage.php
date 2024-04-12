<!DOCTYPE html>
<html>
<head>
<title>Instructor Portal</title>
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
        <style>
    body, html {
        height: 100%;
      }
      
      .bg {
        /* The image used */
        background-image: url("instructor-attend.gif");
      
        /* Full height */
        height: 100%;
      
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
      }
      </style>
    </style>
<link rel="stylesheet" href="styleIH.css">
</head>
<body>
<div class ="bg">
<div class="container">
  <div class="content">
<h1>Welcome to instructor portal</h1>
<br><br>
<?php
  $userid = $_POST["userid"];
	echo '<form action= "./instructor_attend.php" method = "post">';
	echo '<input type="hidden" name="userid" value=' . $userid . '>';
	echo '<input type="submit" value="View your Attendance">';
	echo "</form>";
	
	echo '<form action= "./instructor_loc.php" method = "post">';
	echo '<input type="hidden" name="userid" value=' . $userid . '>';
	echo '<input type="submit" value="create new class attendance">';
	echo "</form>";
?>

  </div>
    </div>
  <form action = "homepage.html">
<input type="submit" value="Sign Out" id="homepage">
      </form>
</body>
</html>