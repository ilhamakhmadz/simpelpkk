

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
												<label class="col-lg-3 col-form-label required">Jumlah RT</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="rt" name="rt"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="rt_aktif" id="rt_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah RW</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="rw" name="rw"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="rw_aktif" id="rw_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah PKK</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="pkk" name="pkk"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="pkk_aktif" id="pkk_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah Posyandu</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="posyandu" name="posyandu"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="posyandu_aktif" id="posyandu_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah LPM</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="lpm" name="lpm"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="lpm_aktif" id="lpm_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah Karang Taruna</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="karang_taruna" name="karang_taruna"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="karang_taruna_aktif" id="karang_taruna_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jumlah Kampung Budaya</label>
												<div class="col-lg-5">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="number" value="" id="kampung_budaya" name="kampung_budaya"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="kampung_budaya_aktif" id="kampung_budaya_aktif" required>
															<option value="Aktif">Aktif</option>
															<option value="Tidak Aktif">Tidak Aktif</option>
														</select>
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