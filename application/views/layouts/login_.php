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
    <!--begin::Head-->

    <!-- Mirrored from preview.keenthemes.com/start-html-pro/general/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 17:04:41 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="utf-8" />
    	<?php echo $template['metas']; ?>

        <title><?php echo $template['title']; ?></title>
       
        <link rel="canonical" href="https://preview.keenthemes.com/start" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="<?= base_url() ?>assets/admin_assets/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
            type="text/css" />
        <link href="<?= base_url() ?>assets/admin_assets/assets/css/style.bundle.css" rel="stylesheet"
            type="text/css" />
        <!--end::Global Stylesheets Bundle-->
        <!--Begin::Google Tag Manager -->
        <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= '<?= base_url() ?>assets/admin_assets/<?= base_url() ?>assets/admin_assets/<?= base_url() ?>assets/admin_assets/www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script> -->
        <!--End::Google Tag Manager -->
        <?php echo $template['css']; ?>
        <?php echo $template['js_header']; ?>
    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" class="bg-white">
        <?php echo $template['content']; ?>


        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="<?= base_url() ?>assets/admin_assets/assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?= base_url() ?>assets/admin_assets/assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <!-- <script src="<?= base_url() ?>assets/admin_assets/assets/js/custom/general/login.js"></script> -->
        <script src="<?= base_url() ?>assets/admin_assets/assets/js/custom/apps/chat/chat.js"></script>
        <script src="<?= base_url() ?>assets/admin_assets/assets/js/custom/intro.js"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
        <!--Begin::Google Tag Manager (noscript) -->
        <script>
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).alert('close');
                    });
                }, 1000);
            }); 
            
        </script>
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--End::Google Tag Manager (noscript) -->
    </body>
    <!--end::Body-->

    <!-- Mirrored from preview.keenthemes.com/start-html-pro/general/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 17:04:42 GMT -->

</html>
