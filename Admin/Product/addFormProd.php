<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require_once('connect.php'); 
	include('header.php');?>

	<div class="container" style="padding: 150px">
		
		<div class="row">

			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Add Product</h3>
				</div>
				<div class="panel-body">
					<form action="insertProd.php" method="post" name="forml" id="forml" enctype="multipart/form-data">
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Product name:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

								<input type="text" name="p_name"  class="form-control" >

							</div>


						</div>
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Price:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

								<input type="number" name="p_price" id="rong" class="form-control">

							</div>


						</div>
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Date:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

								<input type="date" name="p_date" id="rong"  class="form-control">

							</div>


						</div>
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Quantity:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

								<input type="number" name="p_quan" id="dt" class="form-control">

							</div>


						</div>
						
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Cate_id:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<select class="form-control" name="p_cate">
									<?php
									$sql = "SELECT * FROM categories";
									$result = mysqli_query($mysqli,$sql);
									if($result)
									{
										while($row = $result->fetch_array(MYSQLI_ASSOC))
										{
											?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['ca_name']; ?></option>   
											<?php
										}
									}
									?>
								</select>
							</div>


						</div>
						
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Image:
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<input class="form-control" type="file"  name="fileUpload"required="required">
							</div>
						</div>
						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								Status:
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

								<select name="p_status" id="inputP_status" class="form-control" required="required">
									<option value="0">Còn hàng</option>
									<option value="1">Hết hàng</option>

								</select>

							</div>


						</div>


						<div class="row">

							<button type="submit" name="submit" value="add" class="btn btn-primary">Add Product</button>

						</div>

					</form>
				</div>
			</div>

		</div>

	</div>

</body>
</html>