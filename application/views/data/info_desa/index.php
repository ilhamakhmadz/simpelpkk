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
        <table class="table" id="datatable_desa">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Nama Desa</th>
                    <th scope="col">Link Website</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php
                foreach ($infoDesa as $data) :
                ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $data->nama_kecamatan ?></td>
                        <td><?= $data->nama_desa ?></td>
                        <td><?= $data->website ?></td>
                        <td>
                            <a href="<?= $data->website ?>" class="btn btn-primary"><i class="fa fa-link"></i></a>
                            <a href="<?= base_url() . 'migration/infodesa/detail/' . $data->id ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php
                    $no++;
                endforeach;
                ?>
            </tbody>

        </table>
    </div><!-- end container -->
</section><!-- end blog-area -->

<!-- ================================
       START BLOG AREA
================================= -->