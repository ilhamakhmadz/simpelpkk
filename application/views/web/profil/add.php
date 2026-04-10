

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
												<label class="col-lg-3 col-form-label required">Kepala Desa</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kepala_desa" name="kepala_desa"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Sekertariat Desa</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="sekertariat_desa" name="sekertariat_desa"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Kaur Tata Usaha & Umum</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_tu" name="kaur_tu"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Kaur Perencanaan</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_perencanaan" name="kaur_perencanaan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Kaur Keuangan</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_keuangan" name="kaur_keuangan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Seksi Pemerintahan</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_pemerintahan" name="seksi_pemerintahan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Seksi Kerjasama</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_kerjasama" name="seksi_kerjasama"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Seksi Pelayanan</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_pelayanan" name="seksi_pelayanan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Staf 1</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_1" name="staf_1" >
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Staf 2</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_2" name="staf_2" >
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Staf 3</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_3" name="staf_3" >
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