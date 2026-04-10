<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
    <?php echo $template['metas']; ?>

    <title><?php echo $template['title']; ?></title>
    
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" />
    <link rel="manifest" href="<?= assets_url() ?>images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= assets_url() ?>images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Favicon -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/chosen.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/listhub/css/style.css">
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

    <!-- ================================
         END HEADER AREA
================================= -->


    <?php echo $template['content']; ?>




    <?php echo $template['js_footer']; ?>

    <!-- ================================
       START FOOTER AREA
================================= -->
    <section class="footer-area bg-gradient-gray padding-top-100px padding-bottom-30px position-relative">
        <span class="circle-bg circle-bg-1 position-absolute"></span>
        <span class="circle-bg circle-bg-2 position-absolute"></span>
        <span class="circle-bg circle-bg-3 position-absolute"></span>
        <div class="container">
            <div class="section-block-2 my-4"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right d-flex align-items-center justify-content-between">
                        <p class="copy__desc">
                            &copy; Copyright Diskominfo <script>
                                document.write(new Date().getFullYear());
                            </script>.
                            <!-- Made with
                        <span class="la la-heart-o"></span> by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a> -->
                        </p>
                        <!-- <ul class="list-items term-list text-right">
                        <li class="font-size-14"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                        <li class="font-size-14"><a href="privacy-policy.html">Privacy Policy</a></li>
                    </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================
       START FOOTER AREA
================================= -->


    <!-- END CONTAINER -->
    <script src="<?= base_url() ?>assets/listhub/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery-ui.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/animated-headline.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/chosen.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/datedropper.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery-rating.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/tilt.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery-supperslides.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/superslider-script.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/jquery.lazy.min.js"></script>
    <script src="<?= base_url() ?>assets/listhub/js/main.js"></script>
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