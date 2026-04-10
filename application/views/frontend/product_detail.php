

<section class="about">
                            <div class="container">
								<!--begin::Card-->
								<div class="card">
									<div class="card-body">
									<div class="card mb-5 mb-xxl-8">
										<!--begin::Card Body-->
										<div class="card-body d-flex bg-white p-12 flex-column flex-md-row flex-lg-column flex-xxl-row">
											<!--begin::Image-->
											<div class="bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-650px mx-auto" style="background-image: url('<?=base_url(base64_decode($produk_detail->gambar_produk))?>')"></div>
											<!--end::Image-->
											<!--begin::Card-->
											<div class="card shadow-none w-auto w-md-300px w-lg-auto w-xxl-300px ml-auto">
												<!--begin::Card Body-->
												<div class="card-body bg-light px-12 py-10">
													<h3 class="fw-bolder fs-1 mb-1">
														<a href="#" class="text-gray-800"><?=$produk_detail->nama_produk?></a>
													</h3>
													<div class="text-primary fs-3 mb-9">Rp. <?=number_format($produk_detail->harga_produk)?></div>
													<div class="fs-7 mb-8"><?=$produk_detail->deskripsi_produk?></div>
													<!--begin::Info-->
													<table class="table table-borderless align-middle fw-bold">
														<tbody><tr>
															<td class="text-gray-600 ps-0">Desa</td>
															<td class="text-dark pe-0"><?=$produk_detail->Nama_Desa?></td>
														</tr>
														<tr>
															<td class="text-gray-600 ps-0">Kecamatan</td>
															<td class="text-dark pe-0"><?=$produk_detail->Nama_Kecamatan?></td>
														</tr>
														
													</tbody></table>
													<!--end::Info-->
												</div>
												<!--end::Card Body-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Card Body-->
									</div>
									</div>
								</div>
								<!--end::Card-->
							</div>

</section>
