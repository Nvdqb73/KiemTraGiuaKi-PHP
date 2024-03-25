<?php 

$employee_code = $_POST['employee_code'];
$employee_name = $_POST['employee_name'];
$employee_GT = $_POST['employee_GT'];
$employee_Place_of_birth = $_POST['employee_Place_of_birth'];
$room_id = $_POST['room_id'];
$employee_wage = $_POST['employee_wage'];

require_once 'connect.php';

$sql = "update nhanvien set Ma_NV = '$employee_code', Ten_NV = '$employee_name',  Phai = '$employee_GT', Noi_Sinh = '$employee_Place_of_birth', Ma_Phong = '$room_id ', Luong ='$employee_wage ' where Ma_NV = '$employee_code' ";

if (mysqli_query($conn, $sql)) {
	header("location: index.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);  