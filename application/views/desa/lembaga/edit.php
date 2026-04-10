

<div class="card">
									<!--begin::Form-->
									<form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
										<div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" disabled>
															<option value="<?=$lembaga->Kd_Kec?>"> <?=$lembaga->Nama_Kecamatan?></option>
														</select>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Desa</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa" disabled>
															<option value="<?=$lembaga->Kd_Desa?>"> <?=$lembaga->Nama_Desa?></option>

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
														<input class="form-control form-control-lg form-control-solid required" type="hidden" id="id" name="id" value="<?=$lembaga->id?>" required>
														<input class="form-control form-control-lg form-control-solid required" type="number" id="rt" name="rt" value="<?=$lembaga->rt?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="rt_aktif" id="rt_aktif" required>
														<?php
                                                            if ($lembaga->rt_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="rw" name="rw" value="<?=$lembaga->rw?>"  required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="rw_aktif" id="rw_aktif" required>
														<?php
                                                            if ($lembaga->rw_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="pkk" name="pkk" value="<?=$lembaga->pkk?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="pkk_aktif" id="pkk_aktif" required>
														<?php
                                                            if ($lembaga->pkk_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="posyandu" name="posyandu" value="<?=$lembaga->posyandu?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="posyandu_aktif" id="posyandu_aktif" required>
														<?php
                                                            if ($lembaga->posyandu_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="lpm" name="lpm" value="<?=$lembaga->lpm?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="lpm_aktif" id="lpm_aktif" required>
														<?php
                                                            if ($lembaga->lpm_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="karang_taruna" name="karang_taruna" value="<?=$lembaga->karang_taruna?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="karang_taruna_aktif" id="karang_taruna_aktif" required>
														<?php
                                                            if ($lembaga->karang_taruna_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
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
														<input class="form-control form-control-lg form-control-solid required" type="number" id="kampung_budaya" name="kampung_budaya" value="<?=$lembaga->kampung_budaya?>" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="kampung_budaya_aktif" id="kampung_budaya_aktif" required>
														<?php
                                                            if ($lembaga->kampung_budaya_aktif == "Aktif") {
                                                                echo '<option value="Aktif">Aktif</option>
																<option value="Tidak Aktif">Tidak Aktif</option>';
                                                            } else {
                                                                echo '<option value="Tidak Aktif">Tidak Aktif</option>
																<option value="Aktif">Aktif</option>';
                                                            }
                                                        ?>
														</select>
													</div>
												</div>
											</div>
											<!--end::Form row-->
										
											<!--begin::Form row-->
											<div class="row">
												<label class="col-lg-3 col-form-label"></label>
												<div class="col-lg-9">
													<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Ubah</button>
												</div>
											</div>
											<!--end::Form row-->
										</div>
									</form>
									<!--end::Form-->
								</div>