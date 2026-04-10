<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
	<?php echo $template['metas']; ?>

    <title><?php echo $template['title']; ?></title>
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/swiper/css/swiper.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/wow/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/magnific-popup/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/components-elegant-icons/css/elegant-icons.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/dependencies/simple-line-icons/css/simple-line-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/front_assets/assets/css/app.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800;900&amp;family=Satisfy&amp;display=swap" rel="stylesheet">


	<?php echo $template['css']; ?>
	<?php echo $template['js_header']; ?>
    
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WHCE0WXH9S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WHCE0WXH9S');
</script>
<body id="home-version-6" class="home-version-6" data-style="default"><a href="#main_content"
            data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
        <div class="page-loader">
            <div class="loader">
                <div class="blobs">
                    <div class="blob-center"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                            <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7"
                                result="goo" />
                            <feBlend in="SourceGraphic" in2="goo" />
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
        <div id="main_content">
            <header class="site-header header-six header_trans-fixed" data-top="992">
                <div class="container">
                    <div class="header-inner">
                        <div class="toggle-menu"><span class="bar"></span> <span class="bar"></span> <span
                                class="bar"></span></div>
                        <div class="site-mobile-logo"><a href="index.html" class="logo"><img
                                    src="<?=base_url()?>assets/front_assets/assets/img/logo.png" alt="site logo" class="main-logo"> <img
                                    src="<?=base_url()?>assets/front_assets/assets/img/logo.png" alt="site logo" class="sticky-logo"></a></div>
                        <nav class="site-nav">
                            <div class="close-menu"><span>Close</span> <i class="ei ei-icon_close"></i></div>
                            <div class="site-logo">
                                <a href="index.html" class="logo">
                                    <img src="<?=base_url()?>assets/front_assets/assets/img/logo.png" alt="site logo" class="main-logo">
                                    <img src="<?=base_url()?>assets/front_assets/assets/img/logo.png" alt="site logo" class="sticky-logo">
                                </a>
                            </div>
                            <div class="menu-wrapper" data-top="992">
                                <ul class="site-main-menu">
                                    <li class="menu-item-has-children"><a href="index.html">Home</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-two.html">Home Two</a></li>
                                            <li><a href="index-three.html">Home Three</a></li>
                                            <li><a href="index-four.html">Home Four</a></li>
                                            <li><a href="index-five.html">Home Five</a></li>
                                            <li><a href="index-six.html">Home Six</a></li>
                                            <li><a href="index-seven.html">Home Seven</a></li>
                                            <li><a href="index-eight.html">Home Eight</a></li>
                                            <li><a href="index-nine.html">Home Nine</a></li>
                                            <li><a href="index-ten.html">Home Ten</a></li>
                                            <li><a href="index-eleven.html">Home Eleven</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog Standard</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="service.html">Service</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li class="menu-item-has-children"><a href="portfolio.html">Portfolio</a>
                                                <ul class="sub-menu">
                                                    <li><a href="portfolio-one.html">Style One</a></li>
                                                    <li><a href="portfolio-two.html">Style Two</a></li>
                                                    <li><a href="portfolio-three.html">Style Three</a></li>
                                                    <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="faq.html">Faq's</a></li>
                                            <li><a href="error.html">Error 404</a></li>
                                            <li><a href="signin.html">Sing In</a></li>
                                            <li><a href="signup.html">Sing Up</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <div class="nav-right">
                                <a href="<?=base_url('welcome/list')?>" class="nav-btn">SAFARI DATA</a></div>
                        </nav>
                    </div>
                </div>
            </header>
	<?php echo $template['content']; ?>
        <footer id="footer" class="footer-app">
			<div class="container-wrap bg-footer-color">
				<div class="container">
					<div class="footer-inner">
						<div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="widget footer-widget widget-about">
									<a href="#" class="footer-logo"><img src="<?= base_url()?>assets/front_assets/assets/img/main-logo.png" alt="saaspik"></a>
									<p>
										Merdeka dari Data Desa, Mari Merdesa
									</p>
									<h4 class="footer-title">Social</h4>
									<ul class="social-share-link">
										<li><a href="#" class="share_facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#" class="share_twitter"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#" class="share_pinterest"><i class="fab fa-pinterest-p"></i></a></li>
										<li><a href="#" class="share_linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="widget footer-widget widget-contact">
									<h3 class="widget-title">Main Office</h3>
									<ul class="widget-contact-info">
										<li><i class="ei ei-icon_pin_alt"></i>426 Maryam Springs Suite 230 New York, USA</li>
										<li><i class="ei ei-icon_phone"></i>+(623) 698 235 426</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="site-info">
						<div class="copyright text-center">
							<p>© 2021 All Rights Reserved Design by <a href="#" target="_blank">Diskominfo Kab. Bandung</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

        </div>
        <script src="<?= base_url()?>assets/front_assets/dependencies/jquery/jquery.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/swiper/js/swiper.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/jquery.appear/jquery.appear.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/wow/js/wow.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/countUp.js/countUp.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url()?>assets/front_assets/dependencies/gmap3/js/gmap3.min.js"></script>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6">
        </script>
        <script src="<?= base_url()?>assets/front_assets/assets/js/header.js"></script>
        <script src="<?= base_url()?>assets/front_assets/assets/js/app.js"></script>
        
    </body>

</html>

