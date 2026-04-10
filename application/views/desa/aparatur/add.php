

<div class="card">
									<!--begin::Form-->
									<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
										<div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Level Organisasi</label>
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="level" id="level" required>
															<option value="">--Pilih Level Organisasi--</option>
															<option value="kecamatan">Kecamatan</option>
															<option value="desa">Desa</option>
														</select>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<br>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique required>
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
													<div id="div-desa">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Desa</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa" unique required>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Ketua PKK</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kepala_desa" name="kepala_desa"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Wakil Ketua PKK</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="sekertariat_desa" name="sekertariat_desa"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Sekertaris</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_tu" name="kaur_tu"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Wakil Sekertaris</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_perencanaan" name="kaur_perencanaan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Bendahara</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kaur_keuangan" name="kaur_keuangan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Wakil Bendahara</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_pemerintahan" name="seksi_pemerintahan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Ketua Pokja I</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_kerjasama" name="seksi_kerjasama"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Ketua Pokja II</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="seksi_pelayanan" name="seksi_pelayanan"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Ketua Pokja III</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_1" name="staf_1" >
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Ketua Pokja IV</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_2" name="staf_2" >
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<!-- <div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Staf 3</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="" id="staf_3" name="staf_3" >
													</div>
												</div>
											</div> -->
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