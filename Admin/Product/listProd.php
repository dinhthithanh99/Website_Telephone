
<!DOCTYPE html>
<html>
<head>
	<title>List Products</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<style type="text/css">
	.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
		display: block;
		width: 200px;
		height: auto;
	}
</style>
<?php require_once('connect.php'); 
include('header.php');?>

<div class="container-fluid" style="padding: 150px">
	<div class="row" style="padding: 1px;margin: 2px">
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">

		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<a href="/website_Telephone/Admin/Product/addFormProd.php">Add Poducts</a>
		</div>
	</div>
	<div class="row">
		<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr class="success">
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
					<th>Date</th>
					<th>Quantity</th>
					<th colspan="1">Image</th>
					<th>Status</th>
					<th colspan="2" style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				// $folder = "/projectPHP/uploads/";
				$sql = "SELECT * FROM products";
				$result = $mysqli->query($sql);
				if($result)
				{
					while($row = $result->fetch_array(MYSQLI_ASSOC))
					{
						?>
						<tr>
							<td>
								<?php echo $row['id']; ?>
							</td>
							<td> <?php echo $row['p_name'];?> </td>
							<td> <?php echo $row['price'];?> </td>
							<td> <?php echo $row['dates'];?> </td>
							<td> <?php echo $row['quantity'];?> </td>
							<td>
								<img src="<?php echo $row['img']; ?>" class="img-responsive" alt="Image" height = "10px" widtd = "10px">
							</td>
							<td> <?php echo $row['status'];?> </td>
							<td>
								<?php 
								echo "<p><a href='/Website_Telephone/Admin/Product/deleteProd.php?id=" . $row['id'] . "'>Delete</a></p>";
								?>
							</td>
							<td>
								<?php 
								echo "<p><a href='/Website_Telephone/Admin/Product/editFormProd.php?id=" . $row['id'] . "'>Edit</a></p>";
								?>
							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
	</div>
</div>
</body>
</html>