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
	if(isset($_GET['id'])){
		$id1= $_GET['id'];
		$sql     = "SELECT * FROM categories WHERE id='$id1'";
		$ket_qua = $mysqli->query($sql);

		while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
			$id = $row['id'];
			$ten       = $row['ca_name'];
			$des = $row['description'];
			include('header.php');
			?>

			<div class="container" style="padding: 150px;">

				<div class="row">

					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">Update Category</h3>
						</div>
						<div class="panel-body">
							<form action="updateCate.php" method="post" name="forml" id="forml" enctype="multipart/form-data">
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										ID name:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<select class="form-control" name="ca_id">
                                            <?php
    	                                        // $idCategory = $row['category_id'];
    	                                        $sqlCategory = "SELECT * FROM categories WHERE id = $id";
    	                                        $resCategory = mysqli_query($mysqli,$sqlCategory);
    	                                        while ($rowCa = mysqli_fetch_assoc($resCategory))
    	                                        {
                                            ?>
    	                                            <option value= "<?php echo $rowCa['id']; ?>"><?php echo $rowCa['id']; ?></option>

                                            <?php
    	                                        }
                                            ?>

										</select>
									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Category name:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="text" name="c_name"  class="form-control" value="<?php echo $ten ?>">

									</div>


								</div>
								
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Description:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="text" name="c_des" id="dt" class="form-control" value="<?php echo $des ?>">

									</div>
								</div>
								<div class="row">

									<button type="submit" name="submit" value="add" class="btn btn-primary">EDIT</button>

								</div>

							</form>

						<?php }} ?>




					</div>
				</div>

			</div>

		</div>

	</body>
	</html>