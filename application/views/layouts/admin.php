<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Start HTML Pro - Bootstrap 5 HTML Multipurpose Admin Dashboard Template
Purchase: https://keenthemes.com/products/start-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="rmlJ3C4AIh0ruwJsEG0wLRkWhXNZ7SSAZth51NgTw8o" />
        <?php echo $template['metas']; ?>
        <title><?php echo $template['title']; ?></title>

        <!-- MetisMenu CSS -->
        <link href="<?php echo bower_url('metisMenu/dist/metisMenu.min.css') ?>" rel="stylesheet">

        <link href="<?php echo bower_url('select2/dist/css/select2.min.css') ?>" rel="stylesheet">

        <?php echo $template['css']; ?>

        <?php echo $template['js_header']; ?>


        <!-- CORE CSS FRAMEWORK - START -->

        <link href="<?= bower_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= bower_url() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?= assets_url('admin_assets/') ?>assets/media/logos/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

        <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
        <!--end::Fonts-->
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="<?= assets_url('admin_assets/') ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
            type="text/css" />
        <link href="<?= assets_url('admin_assets/') ?>assets/plugins/custom/datatables/datatables.bundle.css"
            rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="<?= assets_url('admin_assets/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet"
            type="text/css" />
        <link href="<?= assets_url('admin_assets/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
        <!--Begin::Google Tag Manager -->
        <script src="<?php echo assets_url('node_modules/sweetalert/dist/sweetalert.min.js') ?>" async></script>
        <script>
        var base_url = '<?php echo site_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
        </script>
        <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
        </script>
        <!--End::Google Tag Manager -->
        <!--End::Google Tag Manager -->
        <style>
            /* Fix Cumulative Layout Shift (CLS) for DataTables initializing within hidden tabs */
            table.dataTable, table.table {
                width: 100% !important;
            }
            .table-responsive {
                min-height: 300px; /* Preallocate space to prevent downward jumping */
            }
        </style>
    </head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WHCE0WXH9S"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WHCE0WXH9S');
    </script>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" data-sidebar="on" class="header-fixed header-tablet-and-mobile-fixed sidebar-enabled">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                        <!--begin::Container-->
                        <div class="container d-flex align-items-stretch justify-content-between">
                            <!--begin::Left-->
                            <div class="d-flex align-items-center">
                                <!--begin::Mega Menu Toggler-->
                                <button class="btn btn-icon btn-accent me-2 me-lg-6" id="kt_mega_menu_toggle"
                                    data-bs-toggle="modal" data-bs-target="#kt_mega_menu_modal">
                                    <!--begin::Svg Icon | path: icons/duotone/Text/Article.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                                <path
                                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Mega Menu Toggler-->
                                <!--begin::Logo-->
                                <a href="<?= base_url('dashboard/home') ?>">
                                    <img alt="Logo" src="<?= base_url() ?>assets/tampilanbaru/assets/images/logo.png" class="h-30px" />
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Left-->
                            <!--begin::Right-->
                            <div class="d-flex align-items-center">

                                <!--begin::User-->
                                <div class="ms-1 ms-lg-6">
                                    <!--begin::Toggle-->
                                    <div class="btn btn-icon btn-sm btn-active-bg-accent" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end" id="kt_header_user_menu_toggle">
                                        <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-300px"
                                        data-kt-menu="true">
                                        <div class="menu-content fw-bold d-flex align-items-center bgi-no-repeat bgi-position-y-top rounded-top"
                                            style="background-image:url('<?= assets_url('admin_assets/') ?>assets/media/misc/dropdown-header-bg.jpg')">
                                            <div class="symbol symbol-45px mx-5 py-5">
                                                <span class="symbol-label bg-primary align-items-end">
                                                    <img alt="Logo"
                                                        src="<?= assets_url('admin_assets/') ?>assets/media/svg/avatars/001-boy.svg"
                                                        class="mh-35px" />
                                                </span>
                                            </div>
                                            <div class="">
                                                <span class="text-white fw-bolder fs-4">Hello,
                                                    <?= $this->session->userdata('full_name') ?></span>
                                                <span
                                                    class="text-white fw-bold fs-7 d-block"><?= $this->session->userdata('role_name') ?></span>
                                            </div>
                                        </div>
                                        <!--begin::Row-->
                                        <div class="row row-cols-2 g-0">
                                            <a href="<?= base_url('index.php/auth/user/edit_profile/') ?><?= $this->session->userdata('id') ?>"
                                                class="border-bottom border-end text-center py-10 btn btn-active-color-primary rounded-0">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                                <span class="svg-icon svg-icon-3x me-n1">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" x="4" y="4" width="7" height="7"
                                                                rx="1.5" />
                                                            <path
                                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="fw-bolder fs-6 d-block pt-3">My Profile</span>
                                            </a>

                                            <a href="<?= base_url('index.php/auth/logout') ?>"
                                                class="col text-center py-10 btn btn-active-color-primary rounded-0">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Sign-out.svg-->
                                                <span class="svg-icon svg-icon-3x me-n1">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.5"
                                                                transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000)" />
                                                            <rect fill="#000000" opacity="0.5"
                                                                transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000)"
                                                                x="13" y="6" width="2" height="12" rx="1" />
                                                            <path
                                                                d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="fw-bolder fs-6 d-block pt-3">Sign Out</span>
                                            </a>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::Notifications-->
                                
                                <!--end::Notifications-->
                                <!--begin::Aside Toggler-->
                                <!--end::Aside Toggler-->
                                <!--begin::Sidebar Toggler-->
                                <button class="btn btn-icon btn-sm btn-active-bg-accent d-lg-none ms-1 ms-lg-6"
                                    id="kt_sidebar_toggler">
                                    <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                                <path
                                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Sidebar Toggler-->
                            </div>
                            <!--end::Right-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Main-->


                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::toolbar-->
                        <div class="toolbar" id="kt_toolbar">
                            <div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
                                    <!--begin::Title-->
                                    <h3 class="text-dark fw-bolder my-1">
                                        <?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?>
                                    </h3>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul
                                        class="breadcrumb breadcrumb-line bg-transparent text-muted fw-bold p-0 my-1 fs-7">

                                        <?php echo (isset($url_home) || !empty($url_home)) ? $url_home : '' ?>
                                        <?php echo (isset($url_children) || !empty($url_children)) ? $url_children : '' ?>
                                        <?php echo (isset($url_page) || !empty($url_page)) ? $url_page : '' ?>

                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Nav-->
                                <div class="d-flex align-items-center flex-nowrap text-nowrap overflow-auto py-1">
                                    <!-- <a href="faq.html" class="btn btn-active-accent fw-bolder">FAQ</a> -->
                                    <?php echo (isset($page_icon) || !empty($page_icon)) ? $page_icon : '' ?>
                                </div>
                                <!--end::Nav-->
                            </div>
                        </div>
                        <!--end::toolbar-->
                        <!--begin::Content-->
                        <div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
                            <!--begin::Container-->
                            <div class="container">
                                <?php echo $template['content']; ?>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Content-->
                    </div>


                    <!--end::Main-->
                    <!--begin::Footer-->
                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                        <!--begin::Container-->
                        <div class="container d-flex flex-column flex-md-row flex-stack">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-bold me-2">2022©</span>
                                <a href="" target="_blank" class="text-gray-800 text-hover-primary">TP.PKK KABUPATEN
                                    BANDUNG</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <!-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
							<li class="menu-item">
								<a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">About</a>
							</li>
							<li class="menu-item">
								<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
							</li>
							<li class="menu-item">
								<a href="https://keenthemes.com/products/start-html-pro" target="_blank" class="menu-link px-2">Purchase</a>
							</li>
						</ul> -->
                            <!--end::Menu-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--begin::Header Search-->
        <div class="modal bg-white fade" id="kt_header_search_modal" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content shadow-none">
                    <div class="container w-lg-800px">
                        <div class="modal-header d-flex justify-content-end border-0">
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-light-primary ms-2" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <div class="modal-body">
                            <!--begin::Search-->
                            <form class="pb-10">
                                <input autofocus="" type="text"
                                    class="form-control bg-transparent border-0 fs-4x text-center fw-normal"
                                    name="query" placeholder="Search..." />
                            </form>
                            <!--end::Search-->
                            <!--begin::Shop Goods-->
                            <div class="py-10">
                                <h3 class="fw-bolder mb-8">Shop Goods</h3>
                                <!--begin::Row-->
                                <div class="row g-5">
                                    <div class="col-sm-6">
                                        <div class="row g-5">
                                            <div class="col-sm-6">
                                                <div class="card overlay min-h-125px mb-5 shadow-none">
                                                    <div class="card-body d-flex flex-column p-0">
                                                        <div class="overlay-wrapper flex-grow-1 bgi-no-repeat bgi-size-cover bgi-position-center card-rounded"
                                                            style="background-image:url('<?= assets_url('admin_assets/') ?>assets/media/stock/600x400/img-17.jpg')">
                                                        </div>
                                                        <div class="overlay-layer bg-white bg-opacity-50">
                                                            <a href="#"
                                                                class="btn btn-sm fw-bold btn-primary">Explore</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card overlay min-h-125px mb-5 shadow-none">
                                                    <div class="card-body d-flex flex-column p-0">
                                                        <div class="overlay-wrapper flex-grow-1 bgi-no-repeat bgi-size-cover bgi-position-center card-rounded"
                                                            style="background-image:url('<?= assets_url('admin_assets/') ?>assets/media/stock/600x400/img-1.jpg')">
                                                        </div>
                                                        <div class="overlay-layer bg-white bg-opacity-50">
                                                            <a href="#"
                                                                class="btn btn-sm fw-bold btn-primary">Explore</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card card-stretch overlay mb-5 shadow-none min-h-250px">
                                                    <div class="card-body d-flex flex-column p-0">
                                                        <div class="overlay-wrapper flex-grow-1 bgi-no-repeat bgi-size-cover bgi-position-center card-rounded"
                                                            style="background-image:url('<?= assets_url('admin_assets/') ?>assets/media/stock/600x400/img-23.jpg')">
                                                        </div>
                                                        <div class="overlay-layer bg-white bg-opacity-50">
                                                            <a href="#"
                                                                class="btn btn-sm fw-bold btn-primary">Explore</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card card-stretch overlay mb-5 shadow-none min-h-250px">
                                            <div class="card-body d-flex flex-column p-0">
                                                <div class="overlay-wrapper flex-grow-1 bgi-no-repeat bgi-size-cover bgi-position-center card-rounded"
                                                    style="background-image:url('<?= assets_url('admin_assets/') ?>assets/media/stock/600x400/img-11.jpg')">
                                                </div>
                                                <div class="overlay-layer bg-white bg-opacity-50">
                                                    <a href="#" class="btn btn-sm fw-bold btn-primary">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Shop Goods-->
                            <!--begin::Framework Users-->
                            <div>
                                <h3 class="text-dark fw-bolder fs-1 mb-6">Framework Users</h3>
                                <!--begin::List Widget 4-->
                                <div class="card bg-transparent mb-5 shadow-none">
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 px-0">
                                        <div class="table-responsive">
                                            <table class="table table-borderless align-middle">
                                                <!--begin::Item-->
                                                <tr>
                                                    <th class="ps-0 w-55px">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-55px flex-shrink-0 me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <img src="<?= assets_url('admin_assets/') ?>assets/media/svg/avatars/009-boy-4.svg"
                                                                    class="h-75 align-self-end" alt="" />
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </th>
                                                    <td class="ps-0 flex-column min-w-300px">
                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="text-gray-800 fw-bolder text-hover-primary fs-6 mb-1">Brad
                                                            Simmons</a>
                                                        <div class="text-muted fw-bold">Uses: HTML/CSS/JS, Python</div>
                                                        <!--end::Title-->
                                                    </td>
                                                    <td>
                                                        <!--begin::Label-->
                                                        <div class="me-4 me-md-19 text-md-right">
                                                            <div class="text-gray-800 fw-bolder fs-6 mb-1">$2,000,000
                                                            </div>
                                                            <span class="text-muted fw-bold">Paid</span>
                                                        </div>
                                                        <!--end::Label-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Btn-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                            <span class="svg-icon svg-icon-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <rect fill="#000000" opacity="0.5"
                                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                                        <path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Btn-->
                                                    </td>
                                                </tr>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <tr>
                                                    <th class="ps-0">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-55px flex-shrink-0 me-4">
                                                            <span class="symbol-label bg-light-danger">
                                                                <img src="<?= assets_url('admin_assets/') ?>assets/media/svg/avatars/006-girl-3.svg"
                                                                    class="h-75 align-self-end" alt="" />
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </th>
                                                    <td class="ps-0 flex-column min-w-300px">
                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="text-gray-800 fw-bolder text-hover-primary fs-6 mb-1">Jessie
                                                            Clarcson</a>
                                                        <div class="text-muted fw-bold">Uses: HTML, ReactJS, ASP.NET
                                                        </div>
                                                        <!--end::Title-->
                                                    </td>
                                                    <td>
                                                        <!--end::Label-->
                                                        <div class="me-4 me-md-19 text-md-right">
                                                            <div class="text-gray-800 fw-bolder fs-6 mb-1">$1,200,000
                                                            </div>
                                                            <span class="text-muted fw-bold">Paid</span>
                                                        </div>
                                                        <!--end::Label-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Btn-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                            <span class="svg-icon svg-icon-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <rect fill="#000000" opacity="0.5"
                                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                                        <path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Btn-->
                                                    </td>
                                                </tr>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <tr>
                                                    <th class="ps-0">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-55px flex-shrink-0 me-4">
                                                            <span class="symbol-label bg-light-success">
                                                                <img src="<?= assets_url('admin_assets/') ?>assets/media/svg/avatars/011-boy-5.svg"
                                                                    class="h-75 align-self-end" alt="" />
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </th>
                                                    <td class="ps-0 flex-column min-w-300px">
                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="text-gray-800 fw-bolder text-hover-primary fs-6 mb-1">Lebron
                                                            Wayde</a>
                                                        <div class="text-muted fw-bold">Uses: HTML. Laravel Framework
                                                        </div>
                                                        <!--end::Title-->
                                                    </td>
                                                    <td>
                                                        <!--end::Label-->
                                                        <div class="me-4 me-md-19 text-md-right">
                                                            <div class="text-gray-800 fw-bolder fs-6 mb-1">$3,400,000
                                                            </div>
                                                            <span class="text-muted fw-bold">Paid</span>
                                                        </div>
                                                        <!--end::Label-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Btn-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                            <span class="svg-icon svg-icon-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <rect fill="#000000" opacity="0.5"
                                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                                        <path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Btn-->
                                                    </td>
                                                </tr>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <tr>
                                                    <th class="ps-0">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-55px flex-shrink-0 me-4">
                                                            <span class="symbol-label bg-light-warning">
                                                                <img src="<?= assets_url('admin_assets/') ?>assets/media/svg/avatars/015-boy-6.svg"
                                                                    class="h-75 align-self-end" alt="" />
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </th>
                                                    <td class="ps-0 flex-column min-w-300px">
                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="text-gray-800 fw-bolder text-hover-primary fs-6 mb-1">Kevin
                                                            Leonard</a>
                                                        <div class="text-muted fw-bold">Uses: VueJS, Laravel Framework
                                                        </div>
                                                        <!--end::Title-->
                                                    </td>
                                                    <td>
                                                        <!--end::Label-->
                                                        <div class="me-4 me-md-19 text-md-right">
                                                            <div class="text-gray-800 fw-bolder fs-6 mb-1">$35,600,000
                                                            </div>
                                                            <span class="text-muted fw-bold">Paid</span>
                                                        </div>
                                                        <!--end::Label-->
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <!--begin::Btn-->
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                            <span class="svg-icon svg-icon-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <rect fill="#000000" opacity="0.5"
                                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                            x="11" y="5" width="2" height="14" rx="1" />
                                                                        <path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <!--end::Btn-->
                                                    </td>
                                                </tr>
                                                <!--end::Item-->
                                            </table>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 4-->
                            </div>
                            <!--end::Framework Users-->
                            <!--begin::Tutorials-->
                            <div class="pb-10">
                                <h3 class="text-dark fw-bolder fs-1 mb-6">Tutorials</h3>
                                <!--begin::List Widget 5-->
                                <div class="card mb-5 shadow-none">
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 px-0">
                                        <!--begin::Item-->
                                        <div class="d-flex mb-6">
                                            <!--begin::Icon-->
                                            <div class="me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-6 fw-bolder text-hover-primary text-gray-800 mb-2">How to
                                                    Create Your First Project with Start Admin Theme</a>
                                                <div class="fw-bold text-muted">But nothing can prepare you for the real
                                                    thing</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-6">
                                            <!--begin::Icon-->
                                            <div class="me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-6 fw-bolder text-hover-primary text-gray-800 mb-2">Start
                                                    Admin Theme Getting Started &amp; Installation</a>
                                                <div class="fw-bold text-muted">Long before you sit down to put digital
                                                    pen</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-6">
                                            <!--begin::Icon-->
                                            <div class="me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-6 fw-bolder text-hover-primary text-gray-800 mb-2">Craft a
                                                    headline that is both informative and will capture</a>
                                                <div class="fw-bold text-muted">But nothing can prepare you for the real
                                                    thing</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-6">
                                            <!--begin::Icon-->
                                            <div class="me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-6 fw-bolder text-hover-primary text-gray-800 mb-2">Write
                                                    your post, either writing a draft in a single</a>
                                                <div class="fw-bold text-muted">Long before you sit down to put pen
                                                </div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-6">
                                            <!--begin::Icon-->
                                            <div class="me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-6 fw-bolder text-hover-primary text-gray-800 mb-2">Use
                                                    images to enhance your post, improve its flow</a>
                                                <div class="fw-bold text-muted">Long before you sit down to put digital
                                                    pen</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 5-->
                            </div>
                            <!--end::Tutorials-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header Search-->
        <!--begin::Mega Menu-->
        <div class="modal bg-white fade" id="kt_mega_menu_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content shadow-none">
                    <div class="container">
                        <div class="modal-header d-flex flex-stack border-0">
                            <div class="d-flex align-items-center">
                                <!--begin::Logo-->
                                <a href="<?= base_url() ?>">
                                    <img alt="Logo" src="<?= base_url() ?>assets/img/logo_pkk.svg" class="h-30px" />
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-light-primary ms-2" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <div class="modal-body">
                            <!--begin::Row-->
                            <div class="row py-10 g-5">
                                <!--begin::Column-->
                                <div class="col-lg-12 pe-lg-25">

                                    <!--begin::Row-->
                                    <div class="row">
                                        <?php

                                    function set_active($menus, $curr_uri, $acl)
                                    {
                                        foreach ($menus as $index => $menu) {
                                            $is_active = false;
                                            $is_allowed = false;
                                            $has_children = isset($menu['children']) and is_array($menu['children']);
                                            if ($has_children) {
                                                $menus[$index]['children'] = set_active($menus[$index]['children'], $curr_uri, $acl);
                                                foreach ($menus[$index]['children'] as $menu_item) {
                                                    if ($menu_item['is_active']) {
                                                        $is_active = $is_active || true;
                                                    }
                                                    if ($menu_item['is_allowed']) {
                                                        $is_allowed = $is_allowed || true;
                                                    }
                                                }
                                            } else {
                                                $is_active = strpos($curr_uri, $menu['uri']) === 0;
                                                $is_allowed = !isset($menu['uri']) || $acl->is_allowed($menu['uri']);
                                            }
                                            $menus[$index]['is_active'] = $is_active;
                                            $menus[$index]['is_allowed'] = $is_allowed;
                                        }
                                        return $menus;
                                    }

        ?>


                                        <?php
        $curr_uri = $this->uri->uri_string();
        if (empty($curr_uri)) {
            $curr_uri = 'home';
        }
        $this->load->config('navigation');
        $navigation = set_active($this->config->item('navigation'), $curr_uri, $this->acl);
        foreach ($navigation as $nav_lvl_1) :
            $is_active = (isset($nav_lvl_1['is_active']) && $nav_lvl_1['is_active']);
            $is_allowed = (isset($nav_lvl_1['is_allowed']) && $nav_lvl_1['is_allowed']);
            ?>
                                        <?php if($is_allowed) { ?>
                                        <div class="col-sm-4">
                                            <?php
                $has_children = isset($nav_lvl_1['children']) && is_array($nav_lvl_1['children']); ?>
                                            <h3 class="fw-bolder mb-5"><?php echo $nav_lvl_1['title']?></h3>
                                            <?php if ($has_children) : ?>
                                            <ul
                                                class="menu menu-column menu-fit menu-rounded menu-gray-600 menu-hover-primary menu-active-primary fw-bold fs-6 mb-10">
                                                <?php
                    foreach ($nav_lvl_1['children'] as $nav_lvl_2) :
                        $is_active = (isset($nav_lvl_2['is_active']) && $nav_lvl_2['is_active']);
                        $is_allowed = (isset($nav_lvl_2['is_allowed']) && $nav_lvl_2['is_allowed']);
                        ?>

                                                    <?php $has_children_2 = isset($nav_lvl_2['children']) && is_array($nav_lvl_2['children']); ?>
                                                    <?php if ($is_allowed) {?>

                                                    <li class="menu-item">
                                                        <a class="menu-link ps-0 py-2 <?= ($is_active ? 'active' : ' ') ?>"
                                                            href="<?php echo(isset($nav_lvl_2['uri']) ? site_url($nav_lvl_2['uri']) : '#') ?>"
                                                            <?php if (isset($nav_lvl_2['target'])) : ?>
                                                            target="<?php echo $nav_lvl_2['target'] ?>" <?php endif; ?>>
                                                            <?php echo $nav_lvl_2['title'] ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                    } ?>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>

                                        </div>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Column-->
                            </div>
                            <!--end::Row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--end::Scrolltop-->
        <!--end::Main-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <!-- CORE CSS TEMPLATE - END -->
        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="<?= assets_url('admin_assets/') ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?= assets_url('admin_assets/') ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script>
            // Optimize all DataTables globally
            if($.fn.dataTable) {
                $.extend(true, $.fn.dataTable.defaults, { 
                    deferRender: true, 
                    processing: true
                });
            }
        </script>
        <!--begin::Page Custom Javascript(used by this page)-->
        <!-- <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/documentation/documentation.js"></script>
	<script src="<?= assets_url('admin_assets/') ?>assets/js/custom/documentation/general/datatables/advanced.js"></script> -->

        <script src="<?= assets_url('admin_assets/') ?>assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?= assets_url('admin_assets/') ?>assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <!-- <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/widgets.js"></script> -->
        <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/modals/create-app.js"></script>
        <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/modals/select-location.js"></script>
        <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/modals/users-search.js"></script>
        <script src="<?= assets_url('admin_assets/') ?>assets/js/custom/apps/chat/chat.js"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
        <!--Begin::Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--End::Google Tag Manager (noscript) -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- CORE TEMPLATE JS - START -->
        <!-- <script src="<?= base_url() ?>assets/cryptodash/assets/js/scripts.js"></script> -->
        <!-- END CORE TEMPLATE JS - END -->

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo bower_url('metisMenu/dist/metisMenu.min.js') ?>"></script>

        <script src="<?php echo bower_url('select2/dist/js/select2.min.js') ?>"></script>
        <script src="<?php echo js_url('utils/upload') ?>" type="text/javascript"></script>

        <script src="<?php echo bower_url('moment/min/moment.min.js') ?>"></script>
        <script src="<?php echo bower_url('moment/min/moment-with-locales.min.js') ?>"></script>
        <script src="<?php echo bower_url('moment/locale/id.js') ?>"></script>

        <script type="text/javascript">
            moment().locale('id');
        </script>

        <script>
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).alert('close');
                    });
                }, 1000);
            }); 
        </script>
        <?php echo $template['js_footer']; ?>

    </body>

</html>
