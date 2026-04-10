

<div class="card">
									<!--begin::Form-->
									<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
										<div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" required>
															<option></option>
															<?php
                                                            foreach ($kecamatan as $nama) {
                                                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                                            }
                                                            ?>
														</select>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Desa</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa" required>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Pagu ADD</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input type="text" class="form-control form-control-lg form-control-solid" name="add" id="add" required>
														</div>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Pagu ADPD</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input type="text" class="form-control form-control-lg form-control-solid" name="adpd" id="adpd" required>
														</div>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Pagu Raksa Desa</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input type="text" class="form-control form-control-lg form-control-solid" name="raksa_desa" id="raksa_desa" required>
														</div>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											
											<!--begin::Form row-->
											<div class="row">
												<label class="col-lg-3 col-form-label"></label>
												<div class="col-lg-9">
													<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan</button>
												</div>
											</div>
											<!--end::Form row-->
										</div>
									</form>
									<!--end::Form-->
								</div>