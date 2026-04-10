<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $template['metas']; ?>
    <title><?php echo $template['title']; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/cryptodash/assets/images/favicon.png" type="image/x-icon" />
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/cryptodash/assets/images/apple-touch-icon-144-precomposed.png">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo bower_url('metisMenu/dist/metisMenu.min.css') ?>" rel="stylesheet">

    <link href="<?php echo bower_url('select2/dist/css/select2.min.css') ?>" rel="stylesheet">
    <?php echo $template['css']; ?>

    <?php echo $template['js_header']; ?>


    <!-- CORE CSS FRAMEWORK - START -->
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= bower_url() ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= bower_url() ?>bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= bower_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= bower_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/cryptodash/assets/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/plugins/swiper/swiper.css" rel="stylesheet" type="text/css">

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/cryptodash/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->
    <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>

    <script src="<?php echo assets_url('node_modules/sweetalert/dist/sweetalert.min.js') ?>" async></script>
    <script>
        var base_url = '<?php echo site_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
    </script>
</head>
</head>

<body class="">
    <!-- START TOPBAR -->
    <div class='page-topbar gradient-blue1'>
        <div class='logo-area crypto'>

        </div>
        <div class='quick-area'>
            <div class='pull-right'>
                <ul class="info-menu right-links list-inline list-unstyled">
                    <li class="notify-toggle-wrapper spec">
                        <a href="#" data-toggle="dropdown" class="toggle">
                            <i class="fa fa-bell"></i>
                            <span class="badge badge-accent">3</span>
                        </a>
                        <ul class="dropdown-menu notifications animated fadeIn">
                            <li class="total">
                                <span class="small">
                                    You have <strong>3</strong> new notifications.
                                    <a href="javascript:;" class="pull-right">Mark all as Read</a>
                                </span>
                            </li>
                            <li class="list">

                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                    <li class="unread available">
                                        <!-- available: success, warning, info, error -->
                                        <a href="javascript:;">
                                            <div class="notice-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Successful transaction of 0.01 BTC</strong>
                                                    <span class="time small">15 mins ago</span>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="unread away">
                                        <!-- available: success, warning, info, error -->
                                        <a href="javascript:;">
                                            <div class="notice-icon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>4 of Pending Transactions!</strong>
                                                    <span class="time small">45 mins ago</span>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" busy">
                                        <!-- available: success, warning, info, error -->
                                        <a href="javascript:;">
                                            <div class="notice-icon">
                                                <i class="fa fa-times"></i>
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Cancelled Order of 200 ICO</strong>
                                                    <span class="time small">1 hour ago</span>
                                                </span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class=" available">
                                        <!-- available: success, warning, info, error -->
                                        <a href="javascript:;">
                                            <div class="notice-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Great Speed Notify of 1.34 LTC</strong>
                                                    <span class="time small">14th Mar</span>
                                                </span>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                            </li>

                            <li class="external">
                                <a href="javascript:;">
                                    <span>Read All Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="message-toggle-wrapper spec">
                        <a href="#" data-toggle="dropdown" class="toggle mr-15">
                            <i class="fa fa-envelope"></i>
                            <span class="badge badge-accent">7</span>
                        </a>
                        <ul class="dropdown-menu messages animated fadeIn">

                            <li class="list">

                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                    <li class="unread status-available">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Clarine Vassar</strong>
                                                    <span class="time small">- 15 mins ago</span>
                                                    <span class="profile-status available pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-away">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Brooks Latshaw</strong>
                                                    <span class="time small">- 45 mins ago</span>
                                                    <span class="profile-status away pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-busy">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Clementina Brodeur</strong>
                                                    <span class="time small">- 1 hour ago</span>
                                                    <span class="profile-status busy pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-offline">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-4.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Carri Busey</strong>
                                                    <span class="time small">- 5 hours ago</span>
                                                    <span class="profile-status offline pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-offline">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-5.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Melissa Dock</strong>
                                                    <span class="time small">- Yesterday</span>
                                                    <span class="profile-status offline pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-available">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Verdell Rea</strong>
                                                    <span class="time small">- 14th Mar</span>
                                                    <span class="profile-status available pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-busy">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Linette Lheureux</strong>
                                                    <span class="time small">- 16th Mar</span>
                                                    <span class="profile-status busy pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class=" status-away">
                                        <a href="javascript:;">
                                            <div class="user-img">
                                                <img src="<?= base_url() ?>assets/cryptodash/data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">
                                            </div>
                                            <div>
                                                <span class="name">
                                                    <strong>Araceli Boatright</strong>
                                                    <span class="time small">- 16th Mar</span>
                                                    <span class="profile-status away pull-right"></span>
                                                </span>
                                                <span class="desc small">
                                                    Lorem ipsum dolor sit elit fugiat molest.
                                                </span>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                            </li>

                            <li class="external">
                                <a href="javascript:;">
                                    <span>Read All Messages</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle">
                            <img src="<?= base_url() ?>assets/cryptodash/data/profile/profile.jpg" alt="user-image" class="img-circle img-inline">
                            <span>Arnold Ramsy <i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu profile animated fadeIn">
                            <li>
                                <a href="crypto-account-setting.html">
                                    <i class="fa fa-wrench"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="crypto-profile.html">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="crypto-support.html">
                                    <i class="fa fa-info"></i> Help
                                </a>
                            </li>
                            <li class="last">
                                <a href="crypto-login.html">
                                    <i class="fa fa-lock"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- END TOPBAR -->

    <!-- START CONTAINER -->
    <div class="page-container row-fluid container-fluid">
        <!-- SIDEBAR - START -->
        <div class="page-sidebar fixedscroll">
            <!-- MAIN MENU - START -->
            <div class="page-sidebar-wrapper crypto" id="main-menu-wrapper">
                <ul class='wraplist'>
                    <?php
                    $this->load->config('navigation');
                    $navigation = $this->config->item('navigation');
                    foreach ($navigation as $nav_lvl_1) :
                    ?>
                        <li>
                            <?php $has_children = isset($nav_lvl_1['children']) && is_array($nav_lvl_1['children']); ?>
                            <a href="<?php echo (isset($nav_lvl_1['uri']) ? site_url($nav_lvl_1['uri']) : '#') ?>" <?php if (isset($nav_lvl_1['target'])) : ?> target="<?php echo $nav_lvl_1['target'] ?>" <?php endif; ?>>
                                <i class="img relative crypto-ic">
                                    <img src="<?php echo base_url() . 'assets/cryptodash/data/crypto-dash/icons/' . $nav_lvl_1['icon'] ?>" alt="" class="ic1 width-20">
                                </i>
                                <span class="title"><?php echo $nav_lvl_1['title'] ?></span>

                                <?php if ($has_children) : ?><span class="arrow"></span><?php endif; ?>
                            </a>

                            <?php if ($has_children) : ?>
                                <ul class="sub-menu">
                                    <?php foreach ($nav_lvl_1['children'] as $nav_lvl_2) : ?>
                                        <li>
                                            <?php $has_children_2 = isset($nav_lvl_2['children']) && is_array($nav_lvl_2['children']); ?>
                                            <a href="<?php echo (isset($nav_lvl_2['uri']) ? site_url($nav_lvl_2['uri']) : '#') ?>" <?php if (isset($nav_lvl_2['target'])) : ?> target="<?php echo $nav_lvl_2['target'] ?>" <?php endif; ?>>
                                                <?php echo $nav_lvl_2['title'] ?>
                                                <?php if ($has_children_2) : ?><span class="arrow"></span><?php endif; ?>
                                            </a>

                                            <?php if ($has_children_2) : ?>
                                                <ul class="sub-menu">
                                                    <?php foreach ($nav_lvl_2['children'] as $nav_lvl_3) : ?>
                                                        <li>
                                                            <a href="<?php echo (isset($nav_lvl_3['uri']) ? site_url($nav_lvl_3['uri']) : '#') ?>" <?php if (isset($nav_lvl_3['target'])) : ?> target="<?php echo $nav_lvl_3['target'] ?>" <?php endif; ?>>
                                                                <?php echo $nav_lvl_3['title'] ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <!-- /.nav-third-level -->
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <!-- /.nav-second-level -->
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- MAIN MENU - END -->
        </div>
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <div class="wrapper main-wrapper row">
                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title"><?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?></h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <strong><?php echo (isset($page_icon) || !empty($page_icon)) ? $page_icon : '' ?></strong>
                                </li>
                            </ol>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->
                <?php echo $template['content']; ?>
                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA ENDS -->
            </div>
        </section>
        <!-- END CONTENT -->
    </div>

    <!-- END CONTAINER -->
    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

    <!-- CORE JS FRAMEWORK - START -->
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/swiper/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/viewport/viewportchecker.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?= base_url() ?>assets/cryptodash/assets/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>

    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/flot-chart/jquery.flot.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/js/chart-flot.js"></script>

    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/chartjs-chart/Chart.min.js"></script>


    <script src="<?= base_url() ?>assets/cryptodash/assets/plugins/swiper/swiper.js"></script>
    <script src="<?= base_url() ?>assets/cryptodash/assets/js/dashboard-crypto.js"></script>


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE TEMPLATE JS - START -->
    <script src="<?= base_url() ?>assets/cryptodash/assets/js/scripts.js"></script>
    <!-- END CORE TEMPLATE JS - END -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo bower_url('metisMenu/dist/metisMenu.min.js') ?>"></script>

    <script src="<?php echo bower_url('select2/dist/js/select2.min.js') ?>"></script>

    <?php echo $template['js_footer']; ?>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="<?php echo js_url('sb-admin-2.js') ?>"></script> -->
</body>

</html>



<script>
    $(document).ready(function() {
        var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
        $('.page-sidebar-wrapper ul li').find('a').filter(function() {
            return this.href == CURRENT_URL;
        }).parent('.page-sidebar-wrapper ul li').addClass('open');
    });
</script>