<?php
session_start();
if (isset($_SESSION["uid"])) {
  header("location:viewmore.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon"/>
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
  @media screen and (max-width:480px){
    #search{width:80%;}
    #search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
  }
</style>
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
                        <li><a href="/Website_Telephone/profile.php#contact">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" >
                        <li><a href="#"  style="color: red; font-weight: bold;"><i class="fa fa-phone"></i> 0123456789</a></li>
                        <li><a href="show_cart.php" class="fa fa-shopping-cart" style="font-size: 15px;color: black">Add to cart<span class=""><b style="color:red"> (<?php 
                                                $sql4 = "SELECT * FROM Guest";      //SQL querry
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
<section data-stellar-background-ratio="0.5">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Products</h3>
    </div>
    <div class="panel-body">
      <?php

      if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
      } else {
        $pageno = 1;
      }
      $no_of_records_per_page = 9;
      $offset = ($pageno-1) * $no_of_records_per_page;

      $conn=mysqli_connect("localhost","root","","projectphp");
// Check connection
      if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
      }

      $total_pages_sql = "SELECT COUNT(*) FROM products";
      $result = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      $sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
      $res_data = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($res_data)){
        ?>
        <div class="col-md-4 col-sm-6" style="border: 1px solid #f5f2f2; padding-right: 10px solid #f5f2f2;">
          <!-- MENU THUMB --> 
          <div class="menu-thumb">
            <a href="#" class="image-popup" title="Samsung">
              <img src="<?php echo $row['img']; ?>" class="img-responsive" alt="">

              <div class="menu-info">
                <div class="menu-item">
                  <?php 
                                    echo "<a href='product_detail.php?id=" . $row['id'] . "'><span>Detail</span></a>";
                                    ?>
                  <p><?php echo $row['p_name'] ?></p>
                </div>

                <div class="menu-price">
                  <span><?php echo $row['price'] ?>đ</span>
                  <a href="add.php?id=<?php echo $row['id'];?>"> <span class="fa fa-cart-plus"> Add to cart</span></a>

                </div>
              </div>
            </a>
          </div>  
        </div>
        <?php

      }
      mysqli_close($conn);
      ?>
      <ul class="pagination" style="text-align: center;">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
          <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
    </div>
  </div>
</section>


<!-- CONTACT -->
<section id="contact" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
        <div id="google-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.110336097442!2d108.24146331433661!3d16.05976319395853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zOTkgVMO0IEhp4bq_biBUaMOgbmgsIFBoxrDhu5tjIE3hu7ksIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1541324811990" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="col-md-12 col-sm-12">
          <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
            <h2>Contact Us</h2>
          </div>
        </div>
        <!-- CONTACT FORM -->
        <form action="#" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
          <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
          <h6 class="text-success">Your message has been sent successfully.</h6>
          <!-- IF MAIL NOT SENT -->
          <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>
          <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" id="cf-name" name="name" placeholder="Full name">
          </div>
          <div class="col-md-6 col-sm-6">
            <input type="email" class="form-control" id="cf-email" name="email" placeholder="Email address">
          </div>
          <div class="col-md-12 col-sm-12">
            <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subject">
            <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Tell about your project"></textarea>
            <button type="button" class="btn btn-danger" class="form-control" id="send" name="sent" onclick="check()">Send Message</button>
          </div>
        </form>
      </div>
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













































