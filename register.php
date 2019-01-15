<?php include('connect.php');
include('process.php');
$user = new User(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./logincss.css">
	<link rel="icon" href="images/icon.png" type="image/png">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<section class="preloader">
		<div class="spinner">
			<span class="spinner-rotate"></span>
		</div>
	</section>
	<!-- MENU -->
	<section class="navbar custom-navbar navbar-fixed-top" role="navigation">

		<!-- <nav class="navbar navbar-default"> -->
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php" style="color: black;">MODERN PHONES <span>.</span> SHOP</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-nav-first">
						<li class="active"><a href="/Website_Telephone/profile.php#home">Home</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
								<span class="caret"></span></a>
								<ul class="dropdown-menu" style="height: 100px">
                          <?php
                          $sql = "SELECT * FROM categories";
                          $result = mysqli_query($mysqli,$sql);
                          if($result)
                          {
                            while($row = $result->fetch_array(MYSQLI_ASSOC))
                                {?>
                                    <li style="text-align: center;">
                                       <?php 
                                    echo "<a href='viewprod_cateuser.php?id=".$row['id']."'"."><span>".$row['ca_name']."</span></a>";
                                    
                                    ?>
                                      </li> 
                                <?php }} ?>
                            </ul>
									</li>
									<li><a href="/Website_Telephone/profile.php#product">New Products</a></li>
									<li><a href="/Website_Telephone/profile.php#hot">Hot</a></li>
									<li><a href="/Website_Telephone/profile.php#sale">Sale</a></li>
									<li><a href="/Website_Telephone/profile.php#contact">Contact</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right" >
									<li><a href="#"  style="color: red; font-weight: bold;"><i class="fa fa-phone"></i> 0123456789</a></li>
									<li><a href="show_cart.php" class="fa fa-shopping-cart" style="font-size: 15px;color: black">Add to cart</a></li>
									<li><a href="login.php" class="smoothScroll" style="color: black;"><i class="fa fa-user-circle" style="font-size: 15px;">Log In</i></a></li>
								</ul>
							</div>
						</div>
						<!-- </nav> -->
					</section>
					<form action="" method="POST" role="form">
						<div class="container" id="size" >
							<div class="panel panel-danger" >
								<div class="panel-body">
									<div id="card">
										<h2>SIGN-IN</h2>
										<input type="text" id="name" name="fullname" class="form-control" required="required" title="" placeholder="YOUR FULL NAME"/>
										<input type="email" id="mail" name="mail" class="form-control" required="required" title="" placeholder="YOUR EMAIL" />
										<input type="text" id="user " name="username" class="form-control" required="required" title="" placeholder="YOUR USER NAME" />
										<input type="Password" id="password" name="password" class="form-control" required="required" title="" placeholder="YOUR PASSWORD" />
										<input type="Password" id="password" name="repass" class="form-control" required="required" title="" placeholder="CONFIRM PASSWORD" />

										<input type="text" id="phone" name="phone" class="form-control" required="required" title="" placeholder="YOUR PHONE" />
										<input type="text" id="address" name="address" class="form-control" required="required" title="" placeholder="YOUR ADDRESS" />

										<!-- Agree with the term of services -->
										<!-- <input type="checkbox" id="tos" name="tos" />
										<label for="tos">Accept the <a href="">Terms of service</a></label>
										<input type="checkbox" id="news" name="news">
										<label for="news">Subscribe to our newsltetter !</label> -->

										<!--  // // // // // // // // // //  -->
										<input type="submit" id="register" name="register" value="Register" />
										<!-- <input type="submit" id="submit" name="submit" value=" Facebook"/>
										<input type="submit" id="submit" name="submit" value=" Twitter"/> -->
									</div>
								</div>
							</div>
						</div>
					</form>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
					<script src="js/jquery.js"></script>
					<script src="js/bootstrap.min.js"></script>
					<script src="js/jquery.stellar.min.js"></script>
					<script src="js/wow.min.js"></script>
					<script src="js/owl.carousel.min.js"></script>
					<script src="js/jquery.magnific-popup.min.js"></script>
					<script src="js/smoothscroll.js"></script>
					<script src="js/custom.js"></script>
					<script src="./js/process.js"></script>
					<?php
					if (isset($_POST['register'])) {
						// if (isset($_POST['fullname'])&&isset($_POST['email'])&&isset($_POST['user'])&&isset($_POST['password'])&&isset($_POST['phone'])&&isset($_POST['address'])) {
						if($_POST['password']!=$_POST['repass']){
							echo "Password wrong!";} else {
							$user->insertUser($_POST['fullname'],$_POST['mail'],$_POST['username'],$_POST['password'],$_POST['phone'],$_POST['address']);
						}}
						//password_hash($_POST['password'],PASSWORD_DEFAULT) }
					
					?>


					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				</body>
				</html>