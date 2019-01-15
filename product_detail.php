<?php 
require('connect.php');
session_start();
if (isset($_SESSION["uid"])) {
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WEBSITE TRLEPHONES</title>
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

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('connect.php'); ?>

    <!-- PRE LOADER -->
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
                                    echo "<a href='viewprod_cate.php?id=".$row['id']."'"."><span>".$row['ca_name']."</span></a>";
                                    
                                    ?>
                                      </li> 
                                <?php }} ?>
                            </ul>
                                    </li>
                                    <li><a href="/Website_Telephone/profile.php#product">New Products</a></li>
                                    <li><a href="/Website_Telephone/profile.php#hot">Hot</a></li>
                                    <li><a href="/Website_Telephone/profile.php#sale">Sale</a></li>
                                    <li><a href="/Website_Telephone/profile.php#contatc">Contact</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right" >
                                    <li><a href="#"  style="color: red; font-weight: bold;"><i class="fa fa-phone"></i> 0123456789</a></li>
<li><a href="show_cart.php" class="fa fa-shopping-cart" style="font-size: 15px;color: black">Add to cart<span class=""><b style="color:red"> (<?php $sql4 = "SELECT * FROM Guest";      //SQL querry
    $run_query = $mysqli->query($sql4);
    echo mysqli_num_rows($run_query);
    ?>)</b></span></a></li>
    <li><a href="login.php" class="smoothScroll" style="color: black;"><i class="fa fa-user-circle" style="font-size: 15px;">Log In</i></a></li>
</ul>
</div>
</div>
<!-- </nav> -->
</section>
<section id="home" class="slider" data-stellar-background-ratio="0.5" >
    <div class="row">
        <div class="owl-carousel owl-theme">

            <?php
            $sql1 = "SELECT * FROM slide";
            $resProd = mysqli_query($mysqli,$sql1);
            while ($rowProd = mysqli_fetch_assoc($resProd))
            {
                ?>
                <div>
                    <img  src="<?php echo $rowProd['image']; ?>">
                </div>
            <?php } ?>
        </div>
    </div>
</section>

 <section> 
   <div class="panel panel-primary">
       <div class="panel-heading">
           <h3 class="panel-title">Deatail product</h3>
       </div>
       <div class="panel-body">
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
            $sl         = $row['quantity'];
            $idCategory     = $row['cate_id'];
            $imag       = $row['img'];
            $status     = $row['status'];
            $des = $row['description'];
            ?>
            <a class="close" href="#">&times;</a>
            <div class="container">
                <div class="card">
                    <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6" >

                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active">
                                        <img id="pic-1" data-zoom-image="<?php echo $imag; ?>" src="<?php echo $imag; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-6" style="padding-top: 100px;border: 1px solid grey;">
                                <h3 class="product-title"><?php echo $ten; ?></h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="review-no">41 reviews</span>
                                </div>

                                <h4 class="price">Giá : <span>$<?php echo $gia; ?></span></h4>
                                <h5 class="quantity">Description : <?php echo $des; ?></h5>
                                <p >Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                                <div style="height:100px;"></div>

                                <div class="action">
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                    <a href="add.php?id=$id"> <span class="fa fa-cart-plus"> Add to cart</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 100px"></div>
        <?php }} ?>
       </div>
   </div>
    </section> 
    <!-- FOOTER -->
    <footer id="footer" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>̣̣99 To Hien Thanh,<br> Son Tra,<br>Da Nang</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>Hotline:</p>
                            <p>0123-456-789 | 0987-654-321</p>
                            <p><a href="#">info@company.com</a></p>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8">
                    <div class="footer-info footer-open-hour">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>Monday</p>
                            <div>
                                <strong>Monday to Friday</strong>
                                <p>7:00 AM - 10:00 PM</p>
                            </div>
                            <div>
                                <strong>Saturday - Sunday</strong>
                                <p>7:00 AM - 12:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-google"></a></li>
                    </ul>
                    <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                        <p><br>Copyright &copy; 2019 <br>Website Telephone
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
    <script src="./js/process.js"></script>
</body>

</html>