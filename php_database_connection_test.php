<?php
// Database connection parameters
$host = 'localhost'; // or your host name
$dbname = 'student'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password
$con = new mysqli($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
    echo "Connection Success!";
    echo"<br><br>";
    $sql_student = "SELECT * FROM `student`";
    $result1 = $con->query($sql_student);
    if($result1->num_rows > 0){
        while($row = $result1->fetch_assoc()){
            echo "First Name: ".$row["first_name"]." - Last Name: ".$row["last_name"]." - Student ID: ".$row["student_id"]." - Password: ".$row["password"]." - Email: " .$row["email"]."<br>";
        }
    }else{
        echo "0 results";
    }
    echo "<br><br>";
    $sql_instructor = "SELECT * FROM `instructor`";
    $result2 = $con->query($sql_instructor);
    if($result2->num_rows > 0){
        while($row = $result2->fetch_assoc()){
            echo "First Name: ".$row["first_name"]." - Last Name: ".$row["last_name"]." - Instructor ID: ".$row["instructor_id"]." - Password: ".$row["password"]." - Email: " .$row["email"]."<br>";
        }
    }else{
        echo "0 results";
    }
    echo "<br><br>";
    $sql_courses = "SELECT * FROM `courses`";
    $result3 = $con->query($sql_courses);
    if($result3->num_rows > 0){
        while($row = $result3->fetch_assoc()){
            echo "Course Number: ".$row["course_number"]." - Instructor ID: ".$row["instructor_id"];
        }
    }else{
        echo "0 results";
    }
    echo "<br><br>";
    $sql_attendance = "SELECT * FROM `attendance`";
    $result4 = $con->query($sql_attendance);
    if($result4->num_rows > 0){
        while($row = $result4->fetch_assoc()){
            echo "Course Number: ".$row["course_number"]." - Student ID: ".$row["student_id"]." - Student IP: ".$row["student_id"]." - Instructor IP: ".$row["instructor_ip"]." - Attended: " .$row["if_attended"]."<br>";
        }
    }else{
        echo "0 results";
    }
?>