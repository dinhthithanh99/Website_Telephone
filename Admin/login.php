<!DOCTYPE html>
<html lang="en">

<head>
<title>Cuisine streets</title>
<link rel="icon" href="images/icon.png" type="image/png">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="/website_telephone/css/bootstrap.min.css">
<link rel="stylesheet" href="/website_telephone/css/font-awesome.min.css">
<link rel="stylesheet" href="/website_telephone/css/animate.css">
<link rel="stylesheet" href="/website_telephone/css/carousel.css">
<link rel="stylesheet" href="/website_telephone/css/theme.default.min.css">
<link rel="stylesheet" href="/website_telephone/css/magnific-popup.css">
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
<!-- MAIN CSS -->
<link rel="stylesheet" href="/website_telephone/css/style.css">
</head>

<body>
<?php require_once('connect.php');
include('processLogin.php');
$user = new User();
?>

<!-- PRE LOADER -->
<section class="preloader">
<div class="spinner">
<span class="spinner-rotate"></span>
</div>
</section>
<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon icon-bar"></span>
<span class="icon icon-bar"></span>
<span class="icon icon-bar"></span>
</button>
<!-- lOGO TEXT HERE -->
<a href="/website_project/amthuc/index.php" class="navbar-brand"  style="color: red;">MODERN PHONES <span>.</span> SHOP</a>
</div>
<!-- MENU LINKS -->
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-nav-first">
<li><a href="/Website_telephone/admin/Product/listProd.php" class="smoothScroll" style="color: green;">Products Management </a></li>
<li><a href="/Website_telephone/admin/Category/listcate.php" class="smoothScroll" style="color: green;">Categories Management </a></li>
<li><a href="#" class="smoothScroll" style="color: green;">User Management</a></li>
<li><a href="#"  style="color: green;">Order Management</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="#" class="smoothScroll" style="color: blue;">Log out</a></li>
</ul>
</div>
</div>
</section>

<div class="row" style="padding-top: 100px;">
<form action="" method="POST" role="form">
<div class="container" id="size" >
<div class="panel panel-danger" >
<div class="panel-body">
<div id="card">
<h2>SIGN-IN</h2>
<input type="text" id="user " name="username" class="form-control" required="required" title="" placeholder="YOUR USER NAME" />
<input type="Password" id="password" name="password" class="form-control" required="required" title="" placeholder="YOUR PASSWORD" />
<a href="register.php">You don't have account</a>

<!-- Agree with the term of services -->
<!-- <input type="checkbox" id="tos" name="tos" />
<label for="tos">Accept the <a href="">Terms of service</a></label>
<input type="checkbox" id="news" name="news">
<label for="news">Subscribe to our newsltetter !</label> -->

<!--  // // // // // // // // // //  -->
<input type="submit" id="register" name="login" value="Login" />
<!-- <input type="submit" id="submit" name="submit" value=" Facebook"/>
<input type="submit" id="submit" name="submit" value=" Twitter"/> -->
</div>
</div>
</div>
</div>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</div>
<!-- SCRIPTS -->
<script src="/website_telephone/js/jquery.js"></script>
<script src="/website_telephone/js/bootstrap.min.js"></script>
<script src="/website_telephone/js/jquery.stellar.min.js"></script>
<script src="/website_telephone/js/wow.min.js"></script>
<script src="/website_telephone/js/owl.carousel.min.js"></script>
<script src="/website_telephone/js/jquery.magnific-popup.min.js"></script>
<script src="/website_telephone/js/smoothscroll.js"></script>
<script src="/website_telephone/js/custom.js"></script>
<script src="/website_telephone/js/process.js"></script>
<?php
if (isset($_POST['login'])) {          
$user->login($_POST['username'],$_POST['password']);
}         
?>
</body>

</html>