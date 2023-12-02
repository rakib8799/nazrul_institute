<?php ob_start(); ?>
<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$host = 'localhost';
// $username = 'asqpkina_nazrul_institute_user';
$username = 'root';
// $password = 'nazrul_institute';
$password = '';
// $database = 'asqpkina_nazrul_institute';
$database = 'jkkniu_nazrul_institute';
$conn = mysqli_connect($host, $username, $password);
mysqli_select_db($conn, $database);
mysqli_query($conn, 'SET CHARACTER SET utf8');
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");
if (!$conn)
    echo mysqli_connect_error();
return $conn;
