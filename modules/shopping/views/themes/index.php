<!DOCTYPE html>
<html lang="en">
 <head>
  <style> 
  .notifications {
    cursor: pointer;
    position: fixed;
    right: 500px;
    left:500px;
    z-index: 9999;
    top: 20px;
    margin-bottom: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}</style>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-1.7.1.min.js"></script>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initialscale=1">
 <!-- The above 3 meta tags *must* come first in the head; any
other head content must come *after* these tags -->
 <meta name="description" content="">
 <meta name="author" content="">
 <title>My.arlinshop.ID</title>
 <link href="<?php echo
base_url()?>assets/bootstrap/css/bootstrap.min.css"
rel="stylesheet">
 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <link href="<?php echo base_url()?>assets/asie/css/ie10-
viewport-bug-workaround.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="<?php echo base_url()?>assets/custom.css"
rel="stylesheet">
 <link href="<?php echo base_url()?>assets/jquery/jqueryui.css" rel="stylesheet">
 <!-- Just for debugging purposes. Don't actually copy these 2
lines! -->
 <!--[if lt IE 9]><script src="../../assets/js/ie8-responsivefile-warning.js"></script><![endif]-->
 <script src="<?php echo base_url()?>assets/asie/js/ieemulation-modes-warning.js"></script>
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5
elements and media queries -->

<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/vendor/aos/aos.css" rel="stylesheet">

<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
 <!--[if lt IE 9]>
 <script
src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></s
cript>
 <script
src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></scrip
t>
 <![endif]-->
 </head>
  <body>

 <!-- Fixed navbar -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="<?php echo
base_url()?>">ARLIN BEAUTY</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <div id="navbar" class="collapse navbar-collapse">
 <ul class="nav navbar-nav navbar-right">
 <li class="active"><a href="<?php echo
base_url()?>">Home</a></li>
 <li><a href="<?php echo base_url()?>shopping/page/tentang"><i
class="glyphicon glyphicon-user"></i> Tentang</a></li>
 <li><a href="<?php echo
base_url()?>shopping/page/cara_bayar"><i class="glyphicon glyphiconbriefcase"></i> Cara Bayar</a></li>
 <li><a href="<?php echo
base_url()?>shopping/tampil_cart"><i class="glyphicon glyphiconshopping-cart"></i> Keranjang Belanja</a></li>
 <li><a href="<?php echo
base_url()?>login"><i class="glyphicon glyphiconshopping-cart"></i> Login </a></li>

 </ul>
 </div>
      </nav><!-- .nav-menu -->

    </div>
  </header>

<section id="hero">
    <div id="heroCarousel"  data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?php echo base_url()?>assets/images/slide6.jpg);">
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item active" style="background-image: url(<?php echo base_url()?>assets/images/slide1.jpg);">
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item active" style="background-image: url(<?php echo base_url()?>assets/images/slide3.jpg);">
        </div>

    </div>
  </section>

 <!-- Begin page content -->
<div class="container">
	<div class="row" >
 <div class="col-lg-3">
 <div class="list-group">
 <a class="list-group-item"><strong>KATEGORI</strong></a>
 <a href="<?php echo base_url()?>shopping/index/"
class="list-group-item">Semua</a>
 <?php
 foreach ($kategori as $row)
 {
 ?>
 <a href="<?php echo base_url()?>shopping/produk_kategori/<?php
echo $row['id'];?>" class="list-group-item"><?php echo $row['nama_kategori'];?>
</a>
 <?php } ?>
 </div><br>
 <div class="list-group">
 <a href="<?php echo base_url()?>shopping/tampil_cart"
class="list-group-item"><strong><i class="glyphicon glyphiconshopping-cart"></i><center>KERANJANG BELANJA</center></strong></a>
 <?php
 $cart= $this->cart->contents();
// If cart is empty, this will show below message.
 if(empty($cart)) {
 ?>
 <a class="list-group-item">0 Items</a>
 <?php
 }
 else
 {
 $grand_total = 0;
 foreach ($cart as $item)
 {
 $grand_total+=$item['subtotal'];
 ?>
 <a class="list-group-item"><?php echo
$item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo
number_format($item['price'],0,",","."); ?>)=<?php echo
number_format($item['subtotal'],0,",","."); ?></a>
 <?php }?>
 <?php }?>
 </div>
 </div>
 <!-- /.col-lg-3 -->

<div class="col-lg-9">
<div class="row">
<input type="text" id="keyword">
<button type="button" id="btn-search">Search</button>
<a href="<?php echo base_url(); ?>">Reset</a>
<br>
<div id="view"> 
 <?php $this->load->view('list_produk',array('produk'=>$produk['tbl_produk'], 'pagination'=>$produk['pagination']));?> 
</div>
</body>
</html>

</div>
 <!-- /.row -->
 </div>
 <!-- /.col-lg-9 -->
 </div>
 <!-- /.row -->
 </div>
<footer class="footer">
 <div class="container">
 <p class="text-muted"><center> My.arlinbeauty.ID by.ARTSA_LINDA SANGAR </a></center></p>
 </div>
 </footer>
 
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load
faster -->
 <script src="<?php echo base_url()?>assets/jquery/jquery3.2.1.min.js"></script>
 <script src="<?php echo
base_url()?>assets/js/arf.js"></script>
 <script src="<?php echo
base_url()?>assets/js/prs.js"></script>
 <script src="<?php echo
base_url()?>assets/js/validation.js"></script>
 <script src="<?php echo base_url()?>assets/jquery/jqueryui.js"></script>
 <script src="<?php echo
base_url()?>assets/jquery/jquery.validate.min.js"></script>
 <script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets/vendor/jquery.min.js"><\/script>')</script>
 <script src="<?php echo
base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <script src="<?php echo base_url()?>assets/asie/js/ie10-
viewport-bug-workaround.js"></script>

  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/js/main.js"></script>
 <script> var baseurl = "<?php echo base_url("index.php/"); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
 </script>
 <script src="<?php echo base_url("js/jquery.min.js");?>"></script> <!-- Load library jquery -->
 <script src="<?php echo base_url("js/config.js");?>"></script> <!-- Load file process.js -->
 <script>   
    $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>

</html>