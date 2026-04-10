<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
    <?php echo $template['metas']; ?>

    <title><?php echo $template['title']; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url()?>assets/listhub/<?= base_url()?>assets/listhub/images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/chosen.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/listhub/css/style.css">
    <!-- CORE CSS TEMPLATE - END -->

    <script>
        var base_url = '<?php echo base_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
    </script>

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
<body>
<!-- start per-loader -->
<div class="loader-container">
            <div class="loader-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- end per-loader -->

        <!-- ================================
            START HEADER AREA
================================= -->
        <header class="header-area">
            <div class="header-top-bar bg-dark-opacity py-2 padding-right-30px padding-left-30px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center header-top-info font-size-14 font-weight-medium">

                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 d-flex align-items-center justify-content-end header-top-info">
                            <span class="mr-2 text-white font-weight-semi-bold font-size-14">Follow on:</span>
                            <ul class="social-profile social-profile-colored">
                                <li><a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end header-top-bar -->
            <div class="header-menu-wrapper padding-right-30px padding-left-30px">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-full-width">
                                <div class="logo">
                                    <a href="index.html"><img src="<?= base_url()?>assets/listhub/images/logo-white-me.png" alt="logo"></a>
                                    <div class="d-flex align-items-center">
                                        <a href="add-listing.html"
                                            class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0"
                                            data-toggle="tooltip" data-placement="left" title="Add Listing">
                                            <i class="la la-plus"></i>
                                        </a>
                                        <div class="menu-toggle">
                                            <span class="menu__bar"></span>
                                            <span class="menu__bar"></span>
                                            <span class="menu__bar"></span>
                                        </div><!-- end menu-toggle -->
                                    </div>
                                </div><!-- end logo -->

                            </div><!-- end menu-full-width -->
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end header-menu-wrapper -->
        </header>
        <!-- ================================
         END HEADER AREA
================================= -->


    <?php echo $template['content']; ?>





    <!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area bg-gradient-gray padding-top-30px padding-bottom-30px position-relative">
            <span class="circle-bg circle-bg-3 position-absolute"></span>
            <span class="circle-bg circle-bg-4 position-absolute"></span>
            <span class="circle-bg circle-bg-5 position-absolute"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 responsive-column">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a href="index.html" class="foot-logo"><img src="<?= base_url()?>assets/listhub/images/logo-black.png" alt="logo"></a>
                            </div><!-- end footer-logo -->
                            <p class="footer__desc">
                                Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros
                                culpa officia deserunt mollit.
                            </p>
                            <p class="footer__desc">
                                <a href="#" class="btn-text">View on the map <i class="la la-arrow-right icon"></i></a>
                            </p>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="footer-item">
                            <h4 class="footer__title">Quick Links</h4>
                            <div class="stroke-shape mb-3"></div>
                            <ul class="list-items">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#loginModal">Log In</a></li>
                                <li><a href="add-listing.html">Add Listing</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                            </ul>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="footer-item">
                            <h4 class="footer__title">Categories</h4>
                            <div class="stroke-shape mb-3"></div>
                            <ul class="list-items">
                                <li><a href="#">Shops</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Restaurants</a></li>
                                <li><a href="#">Bars</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Fitness</a></li>
                            </ul>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="footer-item">
                            <h4 class="footer__title">Contact with Us</h4>
                            <div class="stroke-shape mb-3"></div>
                            <ul class="list-items contact-links">
                                <li><span class="d-block text-color mb-1"><i
                                            class="la la-map mr-1 text-color-2"></i>Address:</span> 12345 Little Baker
                                    St, Melbourne</li>
                                <li><span class="d-block text-color mb-1"><i
                                            class="la la-phone mr-1 text-color-2"></i>Phone:</span><a href="#">+ 61 23
                                        8093 3400</a></li>
                                <li><span class="d-block text-color mb-1"><i
                                            class="la la-envelope mr-1 text-color-2"></i>Email:</span><a
                                        href="#">listhub@gmail.com</a></li>
                            </ul>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
                <div class="row pt-4 align-items-center footer-action-wrap">
                    <div class="col-lg-4">
                        <ul class="social-profile social-profile-colored">
                            <li><a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#" class="dribbble-bg"><i class="la la-dribbble"></i></a></li>
                            <li><a href="#" class="behance-bg"><i class="lab la-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <ul class="list-items term-list text-right">
                            <li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="section-block-2 margin-top-30px margin-bottom-30px"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copy-right d-flex align-items-center justify-content-between">
                            <p class="copy__desc">
                                &copy; Copyright Listhub
                                <script> document.write(new Date().getFullYear()); </script>. Made with
                                <span class="la la-heart-o"></span> by <a
                                    href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a>
                            </p>

                        </div><!-- end copy-right -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end footer-area -->
        <!-- ================================
       START FOOTER AREA
================================= -->

        <!-- start back-to-top -->
        <div id="back-to-top">
            <i class="la la-arrow-up" title="Go top"></i>
        </div>
        <!-- end back-to-top -->



<!-- END CONTAINER -->
<script src="<?= base_url()?>assets/listhub/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery-ui.js"></script>
<script src="<?= base_url()?>assets/listhub/js/popper.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/owl.carousel.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery.fancybox.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/animated-headline.js"></script>
<script src="<?= base_url()?>assets/listhub/js/chosen.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/moment.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/datedropper.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/waypoints.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery.counterup.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery-rating.js"></script>
<script src="<?= base_url()?>assets/listhub/js/tilt.jquery.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery-supperslides.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/superslider-script.js"></script>
<script src="<?= base_url()?>assets/listhub/js/jquery.lazy.min.js"></script>
<script src="<?= base_url()?>assets/listhub/js/main.js"></script>
<?php echo $template['js_footer']; ?>
<script type="text/javascript">
      $(function() {
        $("#page").JPaging({
          pageSize: 5
        });
      });
    </script>
</body>
</html>

