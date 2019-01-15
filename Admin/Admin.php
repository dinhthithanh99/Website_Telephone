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
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/website_telephone/css/style.css">
</head>

<body>
    <?php require_once('connect.php'); 
    session_start();?>

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
                        <li><a href="login.php" class="smoothScroll" style="color: black;"><i class="fa fa-user-circle" style="font-size: 15px;"> <?php echo "Hello!".$_SESSION['adminname']; ?> </i></a></li>
<li><a href="logout.php" class="smoothScroll">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </section>
        
<div class="row">
        <?php include('./Product/listProd.php') ?>
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
    </body>

    </html>