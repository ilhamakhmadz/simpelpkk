

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
												<label class="col-lg-3 col-form-label required">Nama Bumdes</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="nama" name="nama"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Status Bumdes</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Status" name="status" id="status" required>
															<option></option>
															<option value="Maju">Maju</option>
															<option value="Berkembang">Berkembang</option>
															<option value="Tumbuh">Tumbuh</option>
															<!-- <option value="Perintis">Perintis</option> -->
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Alamat Bumdes</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="alamat" name="alamat"  required>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Jenis Usaha</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Jenis Usaha" name="jenis_usaha" id="jenis_usaha" required>
															<option></option>
															<option value="Bisnis Sosial">Bisnis Sosial</option>
															<option value="Pelayanan Umum">Pelayanan Umum</option>
															<option value="Bisnis Penyewaan">Bisnis Penyewaan</option>
															<option value="Usaha Perantara">Usaha Perantara</option>
															<option value="Bisnis Perdagangan">Bisnis Perdagangan</option>
															<option value="Bisnis Keuangan">Bisnis Keuangan</option>
															<option value="Usaha Bersama">Usaha Bersama</option>
															<option value="Bisnis Perdagangan">Bisnis Perdagangan</option>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Omset</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="omset" name="omset"  required>
															<span class="input-group-text pe-5">/Tahun</span>
														</div>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Profit</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="profit" name="profit"  required>
															<span class="input-group-text pe-5">/Tahun</span>
														</div>
													</div>
												</div>
											</div>
											<!--end::Form row-->
											<!--begin::Form row-->
											<div class="row mb-8">
												<label class="col-lg-3 col-form-label required">Kontribusi PAD</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<div class="input-group input-group-lg input-group-solid">
															<span class="input-group-text pe-5">Rp.</span>
															<input class="form-control form-control-lg form-control-solid required" type="text" value="" id="kontribusi_pad" name="kontribusi_pad"  required>
															<span class="input-group-text pe-5">/Tahun</span>
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