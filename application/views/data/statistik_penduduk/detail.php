<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg bread-overlay overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                            <div class="section-heading">
                                <h2 class="sec__title text-white font-size-40 mb-0">Artikel Desa</h2>
                            </div>
                            <ul class="list-items bread-list">
                                <li><a href="<?=base_url()?>welcome/list">Home</a></li>
                                <li><a href="<?=base_url()?>migration/artikel">Article</a></li>
                                <li>Detail</li>
                            </ul>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
            <div class="bread-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150"
                    preserveAspectRatio="none">
                    <g>
                        <path fill-opacity="0.2"
                            d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z">
                        </path>
                    </g>
                    <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                        <path fill="rgba(255,255,255,0.8)"
                            d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z">
                        </path>
                    </g>
                    <path fill="#fff"
                        d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
                    <defs></defs>
                </svg>
            </div><!-- end bread-svg -->
        </section><!-- end breadcrumb-area -->
        <!-- ================================
    END BREADCRUMB AREA
================================= -->




        <!-- ================================
       START BLOG AREA
================================= -->
        <section class="blog-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-item single-card">
                            <div class="card-image after-none">
                                <div class="single-slider owl-trigger-action owl-trigger-action-3">
                                    <div class="single-slider-item">
                                        <?php
                                            $image_url =  $detail_artikel->gambar;
                                            $image_type_check = @exif_imagetype($image_url);//Get image type + check if exists
                                            if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                                                $img = base_url('assets/listhub/images/avatar-article.jpg');
                                            } else {
                                                $img = $detail_artikel->gambar;
                                            }
                                        ?>
                                        <img src="<?=$img?>" class="card__img" alt="blog image">
                                    </div>
                                    <div class="single-slider-item">
                                        <?php
                                            $image_url1 =  $detail_artikel->gambar1;
                                            $image_type_check = @exif_imagetype($image_url1);//Get image type + check if exists
                                            if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                                                $img1 = base_url('assets/listhub/images/avatar-article.jpg');
                                            } else {
                                                $img1 = $detail_artikel->gambar1;
                                            }
                                        ?>
                                        <img src="<?= $img1?>" class="card__img" alt="blog image">
                                    </div>
                                    <div class="single-slider-item">
                                        <?php
                                            $image_url2 =  $detail_artikel->gambar2;
                                            $image_type_check = @exif_imagetype($image_url2);//Get image type + check if exists
                                            if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                                                $img2 = base_url('assets/listhub/images/avatar-article.jpg');
                                            } else {
                                                $img2 = $detail_artikel->gambar2;
                                            }
                                        ?>
                                        <img src="<?= $img2?>" class="card__img" alt="blog image">
                                    </div>
                                </div>
                            </div><!-- end card-image -->
                            <div class="card-content">
                                <h4 class="card-title font-size-25 mb-0"><?=$detail_artikel->judul?></h4>
                                <div class="d-flex flex-wrap align-items-center pt-3">
                                    <a href="#" class="d-flex align-items-center text-gray mr-3">
                                        <div class="user-thumb user-thumb-sm d-inline-block mr-2">
                                            <img src="<?=base_url()?>/assets/listhub/images/avatar.png" alt="author-img">
                                        </div>
                                        <span class="font-weight-medium">Desa <?=$detail_artikel->Nama_Desa?></span>
                                    </a>
                                    <ul class="listing-meta d-flex align-items-center pt-0">
                                        <li class="mr-3">
                                            <i class="la la-calendar mr-1"></i><?=$detail_artikel->tgl_upload?>
                                        </li>
                                        <li>
                                            <i class="la la-eye mr-1"></i>
                                            <a href="#" class="listing-cat-link"><?=$detail_artikel->hit?></a>
                                        </li>
                                    </ul>
                                </div>
                                <?=$detail_artikel->isi?>
                            </div><!-- end card-content -->
                        </div><!-- end block-card -->
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                            <div class="sidebar-widget overflow-hidden">
                                <h3 class="widget-title">Berita Terbaru</h3>
                                <div class="stroke-shape mb-4"></div>
                                <ul class="list-items list-items-style-2">
                                    <?php foreach($top_article as $data):?>
                                    <li>
                                        <span class="d-block pb-1"><i class="la la-newspaper font-size-18 mr-1"></i> <?php
                                        $abstrak = strip_tags($data->isi, '<i>');
                                        if(strlen($abstrak)>110){
                                            $abstrak = substr($abstrak,0,strpos($abstrak," ",100));
                                        }
                                        echo $abstrak.'<b><a href="'.base_url().'migration/artikel/detail/'.$data->id.'"> ... Selanjutnya</a></b>';
                                        ?>

                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div><!-- end sidebar-widget -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end blog-area -->
        <!-- ================================
       START BLOG AREA
================================= -->