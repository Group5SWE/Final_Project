<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php
	$userid = $_POST["userid"];
	$crn = $_POST["crn"];
	$code = rand(100000,999999);
	
	
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode ::png($code, $qrcode, 'H', 4, 4);
echo "<img src='".$qrcode."'>";

//create new rows in attendance db with all students registered the course
//put $code variable for the code atribute and defalt everyone's attendance false

?>


</body>
</html>