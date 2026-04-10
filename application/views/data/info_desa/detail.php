<style>
    .maps {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 56.25%;
        /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }
</style>
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bg-gray user-bread-bg pt-5 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content d-flex flex-wrap align-items-end justify-content-between">
                    <div class="d-flex align-items-end">
                        <div class="user-thumb user-thumb-xl bread-thumb mr-3 flex-shrink-0">
                            <?php
                            $image_url =  $detail_desa->logo;
                            $image_type_check = @exif_imagetype($image_url); //Get image type + check if exists
                            if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                                $img = base_url('assets/listhub/images/avatar-article.jpg');
                            } else {
                                $img = $detail_desa->logo;
                            }
                            ?>
                            <img src="<?= $img ?>" alt="blog avatar">
                            <!-- <img src="images/avatar-img8.jpg" alt="avatar"> -->
                        </div>
                        <div class="section-heading pb-3">
                            <h2 class="sec__title mb-0 font-size-28 line-height-30">
                                <span><?= 'Desa ' . $detail_desa->nama_desa ?></span>
                                <i class="la la-check-circle ml-1 font-size-24 text-success" data-toggle="tooltip" data-placement="top" title="Verified Account"></i>
                            </h2>
                            <p class="sec__desc pt-1 font-size-16 line-height-22"><?= 'Kecamatan ' . $detail_desa->nama_kecamatan ?></p>
                            <p class="sec__desc pt-1 font-size-16 line-height-22"><i class="la la-map-marker mr-1"></i><?= $detail_desa->alamat_kantor ?></p>
                        </div>
                    </div>
                    <div class="btn-box bread-btns d-flex align-items-center pb-3">
                        <a href="<?= base_url('migration/infodesa') ?>"><span class="btn-gray mr-2"><i class="la la-back mr-1"></i><span class="text-color font-weight-semi-bold mr-1"></span>Back</span></a>
                        <!-- <span class="btn-gray mr-2"><i class="la la-star-o mr-1"></i><span class="text-color font-weight-semi-bold mr-1">34</span>Reviews</span> -->
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START USER-DETAILS AREA
================================= -->
<section class="user-detail-area padding-top-60px padding-bottom-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="user-listing-detail-wrap">
                    <div class="block-card mb-5">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0">Lokasi Kantor</h2>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body maps">
                            <iframe class="responsive-iframe" src="<?= 'https://maps.google.com/maps?q=' . $detail_desa->lat . ',' . $detail_desa->lng . '&hl=es&z=14&amp;output=embed' ?>"></iframe>
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                </div><!-- end listing-detail-wrap -->
            </div><!-- end col-lg-8 -->
            <div class=" col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Informasi Desa</h3>
                        <div class="stroke-shape mb-4"></div>
                        <ul class="list-items list--items list--items-2 list-items-style-2">
                            <li><span class="text-color mr-1"><i class="la la-user mr-2 text-color-2 font-size-18"></i>Kades:</span><?= $detail_desa->nama_kepala_desa ?></li>
                            <li><span class="text-color mr-1"><i class="la la-phone mr-2 text-color-2 font-size-18"></i>Telp:</span><a href="<?= 'tel:' . $detail_desa->telepon ?>"><?= $detail_desa->telepon ?></a></li>
                            <li><span class="text-color mr-1"><i class="la la-envelope mr-2 text-color-2 font-size-18"></i>Email:</span><a href="mailto:<?= $detail_desa->email_desa ?>"><?= $detail_desa->email_desa ?></a></li>
                            <li><span class="text-color mr-1"><i class="la la-globe mr-2 text-color-2 font-size-18"></i>Website:</span><a href="<?= $detail_desa->website ?>"><?= $detail_desa->website ?></a></li>
                        </ul>
                        <ul class="social-profile social-profile-colored border-top border-top-color py-4 mt-4">
                            <li><a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#" class="behance-bg"><i class="lab la-behance"></i></a></li>
                            <li><a href="#" class="dribbble-bg"><i class="lab la-dribbble"></i></a></li>
                        </ul>
                        <!-- <a href="#" class="btn-gray" data-toggle="modal" data-target="#sendMessageModal"><i class="la la-envelope mr-1"></i> Send Message</a> -->
                    </div><!-- end sidebar-widget -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
    END USER-DETAILS AREA
================================= -->