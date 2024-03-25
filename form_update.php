<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm nhân viên</title>
	<link rel="stylesheet" type="text/css" href="app.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

	<?php 

	$ma = $_GET['ma'];

	require_once 'connect.php';

	$sql = "select * from nhanvien where Ma_NV = '$ma'";

		
	$result = mysqli_query($conn, $sql);
	$staffItem = mysqli_fetch_array($result);


		// Get All staff
	$sqlRoom = "select * from phongban";
	$roomAll = mysqli_query($conn, $sqlRoom);

	?>


	<div class="container">

		<h1>Thêm Nhân Viên</h1>
		<form method="POST" action="process_update.php">
			<div class="mb-3">
				<label for="formGroupExampleInput" class="form-label">Mã nhân viên</label>
				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="employee_code" name="employee_code" value="<?php echo $ma ?>">
			</div>
			<div class="mb-3">
				<label for="formGroupExampleInput2" class="form-label">Tên nhân viên</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="employee_name" name="employee_name" value="<?php echo $staffItem['Ten_NV'] ?>">
			</div>
			<div class="mb-3">
				<label for="formGroupExampleInput2" class="form-label">Giới tính</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="employee_GT" name="employee_GT">
			</div>
			<div class="mb-3">
				<label for="formGroupExampleInput2" class="form-label">Nơi sinh</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nơi sinh" name="employee_Place_of_birth" >
			</div>

			<select class="form-select" aria-label="Default select example" name="room_id">
				<option selected>---Chọn Phòng---</option>
				<?php  foreach ($roomAll as $each): ?>
					<option value="<?php echo $each['Ma_Phong'] ?>">
						<?php echo $each['Ten_Phong'] ?>

					</option>
				<?php endforeach ?>
			</select>
			<div class="mb-3">
				<label for="formGroupExampleInput2" class="form-label">Lương</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="employee_wage" name="employee_wage"  >
			</div>


			<button  class="btn btn-primary">Sửa nhân viên</button>

		</form>

	</div>
	<?php mysqli_close($conn);?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>