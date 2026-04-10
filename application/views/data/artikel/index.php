   <style>
       .page-article ul {
           padding: 20px;
       }

       .page-article>ul li {
           /* background: #eee; */
           width: 1000px;
           padding: 5px;
           border-bottom: 1px solid #ddd;
       }

       #paging {
           padding: 0 20px 20px 20px;
           font-size: 13px;
           margin-top: 10px;
       }

       #paging a {
           color: #000;
           background: #e0e0e0;
           padding: 8px 12px;
           margin-right: 5px;
           text-decoration: none;
       }

       #paging a.aktif {
           background: #000 !important;
           color: #fff;
       }

       #paging a:hover {
           border: 1px solid #000;
       }

       .hidden {
           display: none;
       }
   </style>
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
                           <li><a href="<?= base_url() ?>welcome/list">Home</a></li>
                           <li>Artikel</li>
                       </ul>
                   </div><!-- end breadcrumb-content -->
               </div><!-- end col-lg-12 -->
           </div><!-- end row -->
       </div><!-- end container -->
       <div class="bread-svg">
           <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150" preserveAspectRatio="none">
               <g>
                   <path fill-opacity="0.2" d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z">
                   </path>
               </g>
               <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                   <path fill="rgba(255,255,255,0.8)" d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z">
                   </path>
               </g>
               <path fill="#fff" d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
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
           <div class="row page-article">
               <ul id="page">
                   <?php foreach ($artikel as $data) : ?>
                       <div class="col-lg-12">
                           <li>
                               <div class="card-item card-item-list">
                                   <div class="card-image">
                                       <a href="<?= base_url() ?>migration/artikel/detail/<?= $data->id ?>" class="d-block">
                                           <?php
                                            $image_url =  $data->gambar;
                                            $image_type_check = @exif_imagetype($image_url); //Get image type + check if exists
                                            if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                                                $img = base_url('assets/listhub/images/avatar-article.jpg');
                                            } else {
                                                $img = $data->gambar;
                                            }
                                            ?>
                                           <img src="<?= $img ?>" class="card__img lazy" alt="" style="">
                                           <span class="badge"><?= $data->tgl_upload ?></span>
                                       </a>
                                       <span class="bookmark-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save">
                                           <i class="la la-link"></i>
                                       </span>
                                   </div>
                                   <div class="card-content">

                                       <h4 class="card-title pt-3">
                                           <a href="<?= base_url() ?>migration/artikel/detail/<?= $data->id ?>"><?= $data->judul ?></a>
                                       </h4>
                                       <p class="card-sub"><a href="#"><i class="la la-map-marker mr-1 text-color-2"></i>Desa <?= $data->Nama_Desa ?></a></p>
                                       <p>
                                           <?php
                                            $abstrak = strip_tags($data->isi, '<i>');
                                            if (strlen($abstrak) > 110) {
                                                $abstrak = substr($abstrak, 0, strpos($abstrak, " ", 100));
                                            }
                                            echo $abstrak . '<b><a href="' . base_url() . 'migration/artikel/detail/' . $data->id . '"> ... Selanjutnya</a></b>';
                                            ?>
                                       </p>

                                       <!-- <ul class="listing-meta d-flex align-items-center">
                                        <li class="d-flex align-items-center">
                                            <span class="rate flex-shrink-0">4.7</span>
                                            <span class="rate-text">5 Ratings</span>
                                        </li>
                                        <li>
                                        <span class="price-range" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pricey">
                                            <strong class="font-weight-medium">$</strong>
                                            <strong class="font-weight-medium">$</strong>
                                            <strong class="font-weight-medium">$</strong>
                                        </span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="la la-cutlery mr-1 listing-icon"></i><a href="#" class="listing-cat-link">Restaurant</a>
                                        </li>
                                    </ul>
                                    <ul class="info-list padding-top-20px">
                                        <li><span class="la la-link icon"></span>
                                            <a href="#"> www.techydevs.com</a>
                                        </li>
                                        <li><span class="la la-calendar-check-o icon"></span>
                                            Opened 1 month ago
                                        </li>
                                    </ul> -->
                                   </div>
                               </div><!-- end card-item -->
                           </li>
                       </div><!-- end col-lg-12 -->
                   <?php endforeach; ?>
               </ul>
           </div><!-- end row -->

       </div><!-- end container -->
   </section><!-- end blog-area -->

   <!-- ================================
       START BLOG AREA
================================= -->