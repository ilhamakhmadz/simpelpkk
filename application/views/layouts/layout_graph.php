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
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" />
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-144-precomposed.png">
    <link href="<?php echo bower_url('select2/dist/css/select2.min.css') ?>" rel="stylesheet">

    <?php echo $template['css']; ?>
    <?php echo $template['js_header']; ?>
    <!-- CORE CSS FRAMEWORK - START -->
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= bower_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= bower_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/cryptodash/assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/candlestick/jqcandlestick.css" rel="stylesheet" type="text/css" />
    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->

    <script>
        var base_url = '<?php echo base_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
    </script>


</head>

<body class=" ">
    <!-- START TOPBAR -->
    <div class='page-topbar gradient-blue1'>
        <div class='logo-area crypto'>

        </div>
        <div class='quick-area'>
            <div class='pull-left'>
                <ul class="info-menu left-links list-inline list-unstyled">

                </ul>
            </div>

        </div>

    </div>
    <!-- END TOPBAR -->
    <div class="page-container row-fluid container-fluid">
        <!-- SIDEBAR - START -->

        <!-- <div class="page-sidebar fixedscroll"> -->

            <!-- MAIN MENU - START -->
            <!-- <div class="page-sidebar-wrapper ps-container ps-active-y" id="main-menu-wrapper" style="height: 296px;">


                <ul class="wraplist" style="height: auto;">
                    <li class="menusection">Main</li>
                    <li class="open">
                        <a href="<?= base_url('migration/statistikPenduduk') ?>">
                            <i class="img relative crypto-ic ">
                                <img src="<?= base_url() ?>assets/cryptodash/data/crypto-dash/icons/1.png" alt="" class="ic1 width-20">
                            </i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url('migration/statistikPenduduk/penduduk') ?>">
                            <i class="img">
                                <img src="<?= base_url() ?>assets/cryptodash/data/crypto-dash/icons/2.png" alt="" class="width-20">
                            </i>
                            <span class="title">Penduduk Desa</span>
                            <span class="label label-accent">HOT</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url('migration/statistikPekerjaan') ?>">
                            <i class="img">
                                <img src="<?= base_url() ?>assets/cryptodash/data/crypto-dash/icons/6.png" alt="" class="width-20">
                            </i>
                            <span class="title">Pekerjaan</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url('migration/statistikPendidikan') ?>">
                            <i class="img">
                                <img src="<?= base_url() ?>assets/cryptodash/data/crypto-dash/icons/4.png" alt="" class="width-20">
                            </i>
                            <span class="title">Pendidikan</span>
                        </a>
                    </li>

                </ul>

                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 729px; right: 3px;">
                    <div class="ps-scrollbar-y" style="top: 0px; height: 585px;"></div>
                </div>
            </div> -->
            <!-- MAIN MENU - END -->

        <!-- </div> -->
        <!--  SIDEBAR - END -->

        <!-- START CONTENT -->
        <section id="main-content" style="margin-left: 0px;" class=" ">
            <div class="wrapper main-wrapper row" style=''>

                <?php echo $template['content']; ?>

                <!-- MAIN CONTENT AREA ENDS -->
            </div>
        </section>
        <!-- END CONTENT -->
    </div>






        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

        <!-- CORE JS FRAMEWORK - START -->

        <!-- <script src="<?php echo js_url('jquery-3.1.1.min.js') ?>"></script> -->
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/swiper/jquery.min.js"></script>

        <!-- <script src="<?= base_url() ?>assets/cryptodash/assets/js/jquery-1.11.2.min.js"></script> -->
        <script src="<?= base_url() ?>assets/cryptodash/assets/js/jquery.easing.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/pace/pace.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/viewport/viewportchecker.js"></script>
        <!-- <script>
window.jQuery || document.write('<script src="<?= base_url() ?>assets/cryptodash/assets/js/jquery-1.11.2.min.js"><\/script>');
</script> -->
        <!-- CORE JS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->

        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/chartjs-chart/Chart.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/syotimer/jquery.syotimer.min.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/js/syotimer-ini.js"></script>
        <script src="<?= base_url() ?>assets/cryptodash/assets/js/dashboard-crypto.js"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
        <script src="<?php echo bower_url('select2/dist/js/select2.min.js') ?>"></script>


        <?php echo $template['js_footer']; ?>

        <!-- CORE TEMPLATE JS - START -->
        <!-- <script src="<?= base_url() ?>assets/cryptodash/assets/js/scripts.js"></script> -->
        <!-- END CORE TEMPLATE JS - END -->
         
</body>

</html>