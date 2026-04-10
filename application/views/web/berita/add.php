

<div class="card">
									<!--begin::Form-->
									<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
										<div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<label class="fs-6 mt-5 form-label fw-bolder required">Judul Berita</label>
													<input class="form-control form-control-lg form-control-solid" type="text" id="judul" name="judul" required>
												</div>

											</div>
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<label class="fs-6 mt-5 form-label fw-bolder required">Isi Berita</label>
													<textarea name="isi_berita" id="isi_berita" required></textarea>
												</div>

											</div>
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<label class="fs-6 mt-5 form-label fw-bolder required">Upload Gambar</label>
														<div class="spinner spinner-sm spinner-primary spinner-right">

															<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(<?=  base_url('/assets/admin_assets/assets/media/avatars/blank.png')  ?>)">
																	<!--begin::Image preview wrapper-->
																	<div class="image-input-wrapper w-750px h-400px"></div>
																	<!--end::Image preview wrapper-->

																	<!--begin::Edit button-->
																	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Ubah Logo">
																		<i class="fa fa-plus"></i>

																		<!--begin::Inputs-->
																		<input type="file" name="gambar" id="gambar" accept=".png, .jpg, .jpeg" />
																		<input type="hidden" name="gambar_remove" id="gambar_remove"  />
																		<!--end::Inputs-->
																	</label>
																	<!--end::Edit button-->

																	<!--begin::Cancel button-->
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
																		<i class="fa fa-minus"></i>
																	</span>
																	<!--end::Cancel button-->

																	<!--begin::Remove button-->
																	<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-blue shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
																		<i class="fa fa-minus">upload</i>
																	</span>
																	<!--end::Remove button-->
															</div>
														</div>
												</div>
											</div>

											<div class="fv-row row">
												<div class="col-lg-12 col-md-12">
													<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan</button>
												</div>

											</div>
										</div>
									</div>
										
								</div>
							</form>
									<!--end::Form-->
						</div>

								