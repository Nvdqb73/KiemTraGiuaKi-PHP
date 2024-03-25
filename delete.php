<?php 

$ma = $_GET['ma'];

require_once 'connect.php';

$sql = "delete from nhanvien where Ma_NV = '$ma'";

if (mysqli_query($conn, $sql)) {
	header("location: index.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);  