<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Xarid qilish</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container" >
				<div class="row">
					<div class="col-md-3 col-xs-2" >
						<div id="fh5co-logo"><a href="index.php">FURNITURE.</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li class="has-dropdown">
								<a href="product.html">Do'kon</a>
								<ul class="dropdown">
									<li><a href="single.html">Faqat do'kon</a></li>
								</ul>
							</li>
							<li class="active"><a href="about.html">Biz haqimizda</a></li>
							<li class="has-dropdown">
								<a href="services.html">Xizmatlar</a>
								<ul class="dropdown">
									<li><a href="#">Web dizayn</a></li>
									<li><a href="#">Elektron tijorat</a></li>
									<li><a href="#">Brending</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Aloqa</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
								  <input type="text" placeholder="Qidiruv..">
								  <span class="input-group-btn">
									<button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
								  </span>
								</div>
							</li>
							<li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</nav>
	
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Ajoyib narsalar</span>
					<h2>MAHSULOTLAR.</h2>
					<p>Eng zamonaviy va hozirda urfda bo'lgan menellar. Faqat bizda!!!</p>
				</div>
			</div>
			  
            <?php
// Ma'lumotlar bazasiga ulanish
$link = new mysqli("localhost", "root", "", "Foydalanuvchi");

if ($link->connect_errno) { 
    echo "Ma'lumotlar bazasiga ulanishda xatolik: " . $link->connect_error;  
    exit;  
}

// Mahsulotlarni tanlash
$sql = "SELECT id, nomi, narxi, rasmi, miqdori FROM Mahsulot";
$result = $link->query($sql);

if ($result->num_rows > 0): 
?>
<div class="row">
    <?php 
    $counter = 0; // Mahsulotlar sonini hisoblash
    while ($row = $result->fetch_assoc()): 
        // Mahsulotlarni har uchta qatorga bo'lib chiqish
        if ($counter % 3 == 0 && $counter > 0): ?>
            </div> <!-- Oldingi qatorni yopish -->
            <div class="row"> <!-- Yangi qatorni ochish -->
        <?php endif; ?>
        <div class="col-md-4 text-center animate-box">
            <div class="product">
                <div class="product-grid" style="background-image:url('image_products/<?php echo $row['rasmi']; ?>');">
                    <div class="inner">
                        <p>
                            <a href="buyutma.php?id=<?php echo $row['id']; ?>" class="icon"><i class="icon-shopping-cart"></i></a>
                            <a href="buyutma.php?id=<?php echo $row['id']; ?>" class="icon"><i class="icon-eye"></i></a>
                        </p>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="buyutma.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nomi']); ?></a></h3>
                    <span class="price"><?php echo number_format($row['narxi'], 0, '.', ' '); ?> so'm</span>
                    <p class="quantity">Miqdori: <?php echo $row['miqdori']; ?></p>
                </div>
            </div>
        </div>
        <?php $counter++; endwhile; ?>
</div> <!-- Yangi qatorni yopish -->
<?php 
else: 
    echo "<p>Hozircha mahsulot mavjud emas.</p>";
endif;

$link->close();
?>


		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Furniture.</h3>
					<p>Eng zamonaviy mebellar faqat bizda. Bizdan uzoqlashmang.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Biz haqimizda</a></li>
						<li><a href="#">Yordam</a></li>
						<li><a href="#">Aloqa</a></li>
						<li><a href="#">Shartlar</a></li>
						<li><a href="#">Uchrashuvlar</a></li>
					</ul>
				</div>

				
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; Maxfiylik va xavfsizlik himoyalangan</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">Ma'rifat</a> Sur'atkashlar: <a href="http://blog.gessato.com/" target="_blank">Anvar</a> &amp; <a href="http://unsplash.co/" target="_blank">Oybek</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

