<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
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
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="index.php">FURNITURE.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li class="has-dropdown">
							<a href="product.php">Do'kon</a>
							<ul class="dropdown">
								<li><a href="single.html">Faqat do'kon</a></li>
							</ul>
						</li>
						<li><a href="about.html">Biz haqimizda</a></li>
						<li class="has-dropdown">
							<a href="services.html">Xizmatlar</a>
						</li>
						<li><a href="modal.html">Aloqa</a></li>
						
						
					</ul>
				</div>
				<div class="col-md-3 col-xs-6 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
								<input type="text" placeholder="Qidiruv..">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
								</span>
							</div>
						</li>
						
						<li class="shopping-cart"><a href="user_order.php" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
						
						
					</ul>
				</div>

				<!-- New HTML codes for user -->
				<div class="user-content">
					<input type="checkbox" id="toggle-submenu" />
					<label for="toggle-submenu">
					<img src="<?php echo isset($_SESSION['fayl']) ? 'upload/' . $_SESSION['fayl'] : ''; ?>" id="avatar" alt="Avatar">

					</label>
					<div class="submenus" id="submenu">
						<ul>
							<li><a href="#profil">Profilim </a></li>
							<li><a href="#modal">Sign In </a></li>
							<li><a href="admin.php" target="_blank"> Admin </a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(img/fon1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">Narxi: 3.000.000</span>
		   						<h2>Zamonaviy koreya dizayn</h2>
		   						<p> Bir kishilik, o'tirish uchun qulay. Tut daraxtidan yasalgan.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Xarid qilish</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(img/fon2.jpg); width:400; height: 400;">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">narxi: 2.300.000</span>
		   						<h2>Tebranadigan stul</h2>
		   						<p>Yumshoq va foydalanish uchun juda qulay bo'lgan mahsulot</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Xarid qilish</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_3.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">narxi: 12.500.000</span>
		   						<h2>Butun kabinet dizayni</h2>
		   						<p>Har bir xonangizni maxsus mebellar bilan jihozlang</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Xarid qilish</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(img/fon4.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">narxi: 1.200.000</span>
		   						<h2>Yotoq tumbasi</h2>
		   						<p>Turli xil shaklda, turli uslubda, baland yoki past ko'rinishda va turli ranglarda</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Hoziroq xarid qiling</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Ko'rishlar soni</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Baxtli mijozlar</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Mahsulotlar soni</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">O'tkazilgan soatlar</span>

							</div>
						</div>
					</div>
				</div>
			</div>
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
						<small class="block">&copy; Maxfiylik va xavfsizlik hiyoyalangan</small> 
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


	  <!-- Modal structure - Form window -->
<div id="modal" class="modalqatlam">
    <div class="modal-content"> 
        <a href="#" class="yopish">&times;</a>
        <h2> Ro'yxatdan o'tish </h2> 
        <form action="add.php" method="POST" enctype="multipart/form-data">

            <!-- First Name and Last Name Fields -->
            <div class="roww form-group">
                <div class="col-half">
                    <input type="text" name="ism" id="fname" class="form-control" placeholder="Sizning ismingiz" required>
                </div>
                <div class="col-half">
                    <input type="text" name="fam" id="lname" class="form-control" placeholder="Sizning familiyangiz" required>
                </div>
            </div>

            <!-- Email and Password Fields -->
            <div class="form-group">
                <input type="email" name="pochta" id="email" class="form-control" placeholder="Sizning E-pochtangiz" required>
                <input type="password" name="parol" id="password" class="form-control" placeholder="Parolingiz" required>
            </div>

            <!-- Address Field -->
            <div class="form-group">
                <input type="text" name="manzil" id="address" class="form-control" placeholder="Sizning manzilingiz" required>
            </div>

            <!-- Phone Number and Image Upload -->
            <div class="roww form-group">
                <div class="col-half">
                    <input type="tel" name="tel" id="phone" class="form-control" name="telefon" placeholder="+998-XX-XXX-XX-XX" pattern="\+998-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required>
                </div>
                <div class="col-half">
                    <label class="file-upload">
                        <input type="file" name="fayl" id="imageUpload" required>
                    </label>
                </div>
            </div>

            <!-- Map for Address -->
            <div class="map-container">
                <iframe 
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14898.180479809189!2d66.97143838117232!3d39.64452595058284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1730634407674!5m2!1sru!2s" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

            <!-- Submit Button -->
            <div class="form-group submit-group">
                <input type="submit" value="Ro'yxatdan o'tish" class="btn-primary">
            </div>
        </form>    
    </div>
</div>
 
<!--  codes for profile -->
<!-- Profile structure - profile window -->
<div id="profil" class="profilqatlam">
    <div class="profil-content"> 
        <a href="#" class="yopish">&times;</a>
        <h2> MENING PROFILIM </h2> 
        
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <!-- ism va familiya -->
            <div class="roww form-group">
                <div class="col-half">
                    <label for="fname">*Mening ismim</label>
                    <input type="text" name="ism" id="fname" class="form-control" placeholder="Sizning ismingiz"
                    value="<?php echo isset($_SESSION['ism']) ? $_SESSION['ism'] : ''; ?>" >
                </div>
                <div class="col-half">
                    <label for="lname">*Mening familiyam</label>
                    <input type="text" name="fam" id="lname" class="form-control" placeholder="Sizning familiyangiz"
                    value="<?php echo isset($_SESSION['fam']) ? $_SESSION['fam'] : ''; ?>">
                </div>
            </div>

            <!-- email -->
            <div class="form-group">
                <label for="email">*Mening pochtam</label>
                <input type="email" name="pochta" id="email" class="form-control" placeholder="Sizning E-pochtangiz"
                value="<?php echo isset($_SESSION['pochta']) ? $_SESSION['pochta'] : ''; ?>" >
                
                <label for="password">*Mening parolim</label>
                <input type="password" id="password" class="form-control" placeholder="Parolingiz"
                value="<?php echo isset($_SESSION['parol']) ? $_SESSION['parol'] : ''; ?>" >
            </div>

            <!-- manzil -->
            <div class="form-group">
                <label for="address">*Mening manzilim</label>
                <input type="text" name="manzil" id="address" class="form-control" placeholder="Sizning manzilingiz"
                value="<?php echo isset($_SESSION['manzil']) ? $_SESSION['manzil'] : ''; ?>" >
            </div>

            <!-- Phone Number and Image Upload -->
            <div class="roww form-group">
                <div class="col-half">
                    <label for="phone">*Mening raqamim</label>
                    <input type="tel" name="tel" id="phone" class="form-control" placeholder="+998-XX-XXX-XX-XX" pattern="\+998-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required
                    value="<?php echo isset($_SESSION['tel']) ? $_SESSION['tel'] : ''; ?>" >
                </div>
                <div class="col-half">
                    <label class="file-upload">
                        <input type="file" name="fayl" id="imageUpload">
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group submit-group">
                <input type="submit" value="Saqlash" class="btn-primary">
            </div>
        </form>      
    </div>
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

