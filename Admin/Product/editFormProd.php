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
		$id = $_GET['id'];
		$sql     = "SELECT * FROM products WHERE id='$id'";
		$ket_qua = $mysqli->query($sql);

		while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
			$id = $row['id'];
			$ten       = $row['p_name'];
			$gia        = $row['price'];
			$date = $row['dates'];
			$sl 		= $row['quantity'];
			$idCategory 	= $row['cate_id'];
			$imag 		= $row['img'];
			$status     = $row['status'];
			include('header.php');
	?>

			<div class="container" style="padding: 150px">

				<div class="row">

					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">Update Category</h3>
						</div>
						<div class="panel-body">
							<form action="updateProd.php" method="post" name="forml" id="forml" enctype="multipart/form-data">
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										ID name:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<select class="form-control" name="p_id">
                                            <?php
    	                                        // $idCategory = $row['category_id'];
    	                                        $sqlProd = "SELECT * FROM products WHERE id = $id";
    	                                        $resProd = mysqli_query($mysqli,$sqlProd);
    	                                        while ($rowProd = $resProd->fetch_array(MYSQLI_ASSOC))
    	                                        {
                                            ?>
    	                                            <option value= "<?php echo $rowProd['id']; ?>"><?php echo $rowProd['id']; ?></option>

                                            <?php
    	                                        }
                                            ?>

										</select>

									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Product name:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="text" name="p_name"  class="form-control" value="<?php echo $ten ?>">

									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Price:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="number" name="p_price" id="rong" class="form-control" value="<?php echo $gia ?>">

									</div>


								</div>

								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Date:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="date" name="p_date" id="dt" class="form-control" value="<?php echo $date ?>">

									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Quantity:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="number" name="p_quan" id="dt" class="form-control" value="<?php echo $sl ?>">

									</div>


								</div>
								
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Cate_id:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<select class="form-control" name="p_cate">
                                            <?php
    	                                        // $idCategory = $row['category_id'];
    	                                        $sqlCategory = "SELECT * FROM categories WHERE id = $idCategory";
    	                                        $resCategory = $mysqli->query($sqlCategory);
    	                                        while ($rowCa = $resCategory->fetch_array(MYSQLI_ASSOC))
    	                                        {
                                            ?>
    	                                            <option value= "<?php echo $rowCa['id']; ?>"><?php echo $rowCa['ca_name']; ?></option>

                                            <?php
    	                                        }
    	                                        $sqlCate = "SELECT * FROM categories";
    	                                        $resCate = mysqli_query($mysqli,$sqlCate);
    	                                        while ($rowCate = $resCate->fetch_array(MYSQLI_ASSOC))
    	                                        {
                                            ?>
    	                                            <option value= "<?php echo $rowCate['id']; ?>"><?php echo $rowCate['ca_name']; ?></option>
                                            <?php
                                        		}
                                            ?>

										</select>
									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Status:
									</div>

									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

										<input type="number" name="p_status" id="dt" class="form-control" value="<?php echo $status ?>">

									</div>


								</div>
								<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										Image:
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
										<img src="<?php echo $imag; ?>" width=200px heigh=200px;>
										<input class="form-control" type="file" id="fileUpload" name="fileUpload">
										<input type="" name="link" value="<?php echo $imag; ?>" hidden="false">
									</div>
								</div>



								<div class="row">

									<button type="submit" name="submit" value="add" class="btn btn-primary">UPDATE</button>

								</div>

							</form>

<?php }} ?>




						</div>
					</div>

				</div>

			</div>

		</body>
		</html>