<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
    	<?php echo $template['metas']; ?>

        <title><?php echo $template['title']; ?></title>

        <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" />

        <link rel="mask-icon" href="<?= base_url() ?>assets/front_assets/assets/img/fav/safari-pinned-tab.svg"
            color="#fa7070">

        <meta name="msapplication-TileColor" content="#fa7070">
        <meta name="theme-color" content="#fa7070">

        <!-- Dependency Styles -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/front_assets/dependencies/bootstrap/css/bootstrap.min.css"
            type="text/css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/front_assets/dependencies/fontawesome/css/all.min.css"
            type="text/css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/front_assets/dependencies/swiper/css/swiper.min.css"
            type="text/css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/front_assets/dependencies/wow/css/animate.css"
            type="text/css">
        <link rel="stylesheet"
            href="<?= base_url() ?>assets/front_assets/dependencies/magnific-popup/css/magnific-popup.css"
            type="text/css">
        <link rel="stylesheet"
            href="<?= base_url() ?>assets/front_assets/dependencies/components-elegant-icons/css/elegant-icons.min.css"
            type="text/css">
        <link rel="stylesheet"
            href="<?= base_url() ?>assets/front_assets/dependencies/simple-line-icons/css/simple-line-icons.css"
            type="text/css">



        <!-- Site Stylesheet -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/front_assets/assets/css/app.css" type="text/css">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800;900&amp;family=Satisfy&amp;display=swap"
            rel="stylesheet">


        <script src="<?= base_url() ?>assets/front_assets/dependencies/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/bootstrap/js/bootstrap.min.js"></script>

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
    <body id="home-version-5" class="home-version-4" data-style="default">

        <a href="#main_content" data-type="section-switch" class="return-to-top">
            <i class="fa fa-chevron-up"></i>
        </a>

        <div class="page-loader">
            <div class="loader">
                <!-- Loader -->
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
        </div><!-- /.page-loader -->

        <div id="main_content">



            <!-- CONTENT HERE -->
            <?php echo $template['content']; ?>
            <!-- END THE CONTENT -->

        </div><!-- /#site -->
        <script src="<?= base_url() ?>assets/front_assets/dependencies/swiper/js/swiper.min.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/jquery.appear/jquery.appear.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/wow/js/wow.min.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/countUp.js/countUp.min.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script
            src="<?= base_url() ?>assets/front_assets/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js">
        </script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/magnific-popup/js/jquery.magnific-popup.min.js">
        </script>
        <script src="<?= base_url() ?>assets/front_assets/dependencies/gmap3/js/gmap3.min.js"></script>
        <script type='text/javascript'
            src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6'>
        </script>


        <!-- Site Scripts -->
        <script src="<?= base_url() ?>assets/front_assets/assets/js/header.js"></script>
        <script src="<?= base_url() ?>assets/front_assets/assets/js/app.js"></script>
        <?php echo $template['js_footer']; ?>

    </body>


    <!-- Mirrored from saaspik.pixelsigns.art/saaspik/index-five.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 May 2021 18:11:03 GMT -->

</html>
