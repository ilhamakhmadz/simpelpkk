<style>
    body {
	font-family: 'Roboto', sans-serif;
	font-size: 14px;
	line-height: 18px;
	background: #f4f4f4;
}

.list-wrapper {
	padding: 15px;
	overflow: hidden;
}

.list-item {
	border: 1px solid #EEE;
	background: #FFF;
	margin-bottom: 10px;
	padding: 10px;
	box-shadow: 0px 0px 10px 0px #EEE;
}

.list-item h4 {
	color: #FF7182;
	font-size: 18px;
	margin: 0 0 5px;	
}

.list-item p {
	margin: 0;
}

.simple-pagination ul {
	margin: 0 0 20px;
	padding: 0;
	list-style: none;
	text-align: center;
}

.simple-pagination li {
	display: inline-block;
	margin-right: 5px;
}

.simple-pagination li a,
.simple-pagination li span {
	color: #666;
	padding: 5px 10px;
	text-decoration: none;
	border: 1px solid #EEE;
	background-color: #FFF;
	box-shadow: 0px 0px 10px 0px #EEE;
}

.simple-pagination .current {
	color: #FFF;
	background-color: #FF7182;
	border-color: #FF7182;
}

.simple-pagination .prev.current,
.simple-pagination .next.current {
	background: #e04e60;
}
.about{
    padding: 200px 0px 0px 50px;
}
</style>



<section class="about">
                            <div class="container">
								<!--begin::Card-->
								<div class="card">
									<div class="card-body">
										<!--begin::Engage Widget 1-->
										<div class="card mb-12">
											<div class="card-body card-rounded p-0 d-flex bg-light-primary">
												<div class="d-flex flex-column flex-lg-row-auto p-10 p-md-20">
													<h1 class="fw-bolder text-dark">Produk Unggulan Desa</h1>
													<!-- <div class="fs-3 mb-8">Get Amazing Gadgets</div> -->
													<!--begin::Form-->
													
													<!--end::Form-->
												</div>
												<div class="d-none d-md-flex flex-row-fluid mw-400px ml-auto bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url(<?=base_url()?>assets/admin_assets/assets/media/illustrations/run.png);"></div>
											</div>
										</div>
										<!--end::Engage Widget 1-->
										<!--begin::Section-->
										<div class="mb-10">
											<!--begin::Heading-->
											<!-- <div class="d-flex justify-content-between align-items-center mb-7">
												<h2 class="fw-bolder text-dark fs-2 mb-0">Smart Devices</h2>
												<a href="#" class="btn btn-light-primary btn-sm fw-bolder">View All</a>
											</div> -->
											<!--end::Heading-->
											<!--begin::Products-->
											<div class="row g-5 g-xxl-8 list-wrapper">
                                                <?php foreach ($produk as $data):?>
												<!--begin::Product-->
												<div class="col-md-4 col-xxl-4 col-lg-12 list-item">
													<!--begin::Card-->
													<div class="card shadow-none">
														<div class="card-body p-0">
															<!--begin::Image-->
															<div class="overlay rounded overflow-hidden">
																<div class="overlay-wrapper rounded bg-light text-center">
																	<img src="<?=base_url(base64_decode($data->gambar_produk))?>" alt="" class="mw-100 w-200px">
																</div>
																<div class="overlay-layer">
																	<a href="<?=base_url('statistik/product_detail/').$data->id?>" class="btn fw-bolder btn-sm btn-primary me-2">Detail Produk</a>
																	<!-- <a href="product.html" class="btn fw-bolder btn-sm btn-light-primary">Purchase</a> -->
																</div>
															</div>
															<!--end::Image-->
															<!--begin::Details-->
															<div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
																<a href="<?=base_url('statistik/product_detail/').$data->id?>" class="fs-4 fw-bolder text-gray-800 text-hover-primary mb-1"><?=$data->nama_produk?></a>
																<span class="fs-6"><b>Rp. <?=number_format($data->harga_produk)?></b></span>
															</div>
															<!--end::Details-->
														</div>
													</div>
													<!--end::Card-->
												</div>
												<!--end::Product-->
                                                <?php endforeach;?>

											</div>
											<!--end::Products-->
										</div>
                                        <div id="pagination-container"></div>
										<!--end::Section-->
									</div>
								</div>
								<!--end::Card-->
							</div>

</section>
