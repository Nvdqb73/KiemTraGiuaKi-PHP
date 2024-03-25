<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="app.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>	

	<?php
	require_once 'connect.php';


	//pagination Staff
	$trang_hien_tai = 1;

	if (isset($_GET['trang'])) {
		$trang_hien_tai = $_GET['trang'];
	}

	$sql_so_nhan_vien = "select count(*)  from nhanvien";

	$mang_so_nhan_vien = mysqli_query($conn, $sql_so_nhan_vien);
	$ket_qua_so_nhan_vien = mysqli_fetch_array($mang_so_nhan_vien);
	$tong_so_nhan_vien = $ket_qua_so_nhan_vien['count(*)'];
	$so_nhan_vien_tren_1_trang = 5;

	$so_trang = ceil($tong_so_nhan_vien / $so_nhan_vien_tren_1_trang);
	
	$bo_qua = $so_nhan_vien_tren_1_trang * ($trang_hien_tai - 1);

	$sql = "select * from nhanvien limit $so_nhan_vien_tren_1_trang offset $bo_qua";
	$result = mysqli_query($conn, $sql);

	// Get all Room
	$sqlRoom = "select * from phongban";
	$resultRoom = mysqli_query($conn, $sqlRoom);
	?>

	<div class="container">
		<div class="heading">
			<h1>Thông tin nhân viên</h1>
			<div class="create_staff">
				<a class="staffAction" href="form_insert.php">Thêm nhân viên</a>
			</div>
		</div>


		<table class="table table-dark table-hover">
			<tr>
				<th>Mã nhân viên</th>
				<th>Tên nhân viên</th>
				<th>Giới tính</th>
				<th>Nơi sinh</th>
				<th>Tên Phòng</th>
				<th>Lương</th>
				<th>Action</th>
			</tr>

			<?php foreach ($result as $staffItem){ ?>
				<tr>
					<td><?php echo $staffItem['Ma_NV']; ?></td>
					<td>
						<?php echo $staffItem['Ten_NV']; ?>
					</td>
					<td>

						<?php if ($staffItem['Phai'] == "NAM") {?>
							<img src="man.jpg" height='100'>

						<?php } ?>
						<?php if ($staffItem['Phai'] == "NU") {?>
							<img src="woman.jpg" height='100'>

						<?php } ?>
					</td>
					<td>
						<?php echo $staffItem['Noi_Sinh']; ?>
					</td>

					<td>
						<?php foreach ($resultRoom as $roomName) {?>
							<?php  if ($roomName['Ma_Phong'] == $staffItem['Ma_Phong']) {
								echo $roomName['Ten_Phong'];
							}?>

						<?php } ?>
					</td>

					<td>
						<?php echo $staffItem['Luong']; ?>
					</td>
					<td>
						<a class="icon-link" href="form_update.php?ma=<?php echo $staffItem['Ma_NV'] ?>"?>
							<svg class="bi" aria-hidden="true"><use xlink:href="#box-seam"></use></svg>
							Sửa
						</a>
						<a class="icon-link" href="delete.php?ma=<?php echo $staffItem['Ma_NV'] ?>">
							<svg class="bi" aria-hidden="true"><use xlink:href="#box-seam"></use></svg>
							Xoá
						</a>
					</td>

				</tr>	
			<?php } ?>

		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination">

				<?php for ($i=1; $i <= $so_trang ; $i++) { ?>

					<li class="page-item"><a class="page-link" href="?trang=<?php echo $i ?>"><?php echo  $i?></a></li>

				<?php } ?>
			</ul>
		</nav>

	</div>



	<?php mysqli_close($conn);?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>