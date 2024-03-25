<?php 

$servername = "localhost";
$username = "root";
$password = "1528";
$dbname = "ql_nhansu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}