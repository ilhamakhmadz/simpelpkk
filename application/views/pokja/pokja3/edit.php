<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        <div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Level Organisasi</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-placeholder="Pilih Level" name="level"
															id="level" disabled>
															<option value="<?=$pokja3->level?>"><?=$pokja3->level?></option>
															<?php
																if ($this->session->userdata('level_id') == 3) {
																	echo '<option value="kecamatan">Kecamatan</option>';
																	echo '<option value="desa">Desa</option>';
																	echo '<option value="dusun">Dusun</option>';
																	echo '<option value="rw">RW</option>';
																	echo '<option value="rt">RT</option>';
																} elseif ($this->session->userdata('level_id') == 4) {
																	echo '<option value="desa">Desa</option>';
																	echo '<option value="dusun">Dusun</option>';
																	echo '<option value="rw">RW</option>';
																	echo '<option value="rt">RT</option>';
																}elseif ($this->session->userdata('level_id') == 5) {
																	echo '<option value="dusun">Dusun</option>';
																	echo '<option value="rw">RW</option>';
																	echo '<option value="rt">RT</option>';
																}elseif ($this->session->userdata('level_id') == 6) {
																	echo '<option value="rw">RW</option>';
																	echo '<option value="rt">RT</option>';
																}elseif ($this->session->userdata('level_id') == 7) {
																	echo '<option value="rt">RT</option>';
																} elseif ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
																	echo '<option value=""></option>';
																	echo '<option value="kecamatan">Kecamatan</option>';
																	echo '<option value="desa">Desa</option>';
																	echo '<option value="dusun">Dusun</option>';
																	echo '<option value="rw">RW</option>';
																	echo '<option value="rt">RT</option>';
																}
															?>

														</select>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kader Pangan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->kader_pangan?>" id="kader_pangan" name="kader_pangan"  required>
														<input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="Dusun I" id="id" name="id" value="<?=$pokja3->id?>" disabled>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kader Sandang</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->kader_sandang?>" id="kader_sandang" name="kader_sandang"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kader TLRT</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->kader_tatalaksana_rumahtangga?>" id="kader_tatalaksana_rumahtangga" name="kader_tatalaksana_rumahtangga"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Data Pangan</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Makanan Pokok Beras</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_beras?>" id="pangan_beras" name="pangan_beras"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Makanan Pokok Non Beras</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_nonberas?>" id="pangan_nonberas" name="pangan_nonberas"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Peternakan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_peternakan?>" id="pangan_peternakan" name="pangan_peternakan"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Perikanan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_perikanan?>" id="pangan_perikanan" name="pangan_perikanan"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Warung Hidup</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_warunghidup?>" id="pangan_warunghidup" name="pangan_warunghidup"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Lembung Hidup</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_lumbunghidup?>" id="pangan_lumbunghidup" name="pangan_lumbunghidup"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Toga</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_toga?>" id="pangan_toga" name="pangan_toga"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pemanfaatan Pekarangan Untuk Tanaman Keras</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->pangan_tanaman_keras?>" id="pangan_tanaman_keras" name="pangan_tanaman_keras"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Industri Rumah Tangga</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Pangan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->industri_pangan?>" id="industri_pangan" name="industri_pangan"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Sadang</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->insdustri_sandang?>" id="insdustri_sandang" name="insdustri_sandang"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jasa</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->industri_jasa?>" id="industri_jasa" name="industri_jasa"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Rumah</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Sehat dan Layak Huni</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->rumah_sehat?>" id="rumah_sehat" name="rumah_sehat"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Tidak Sehat dan Tidak Layak Huni</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja3->rumah_tidaksehat?>" id="rumah_tidaksehat" name="rumah_tidaksehat"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label mt-6">Keterangan
														</label>
														<textarea class="form-control form-control-lg form-control-solid"
															name="keterangan" id="keterangan"><?=$pokja3->keterangan?></textarea>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="d-flex flex-stack">
												<!--begin::Send-->
												<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3 mt-10">Simpan</button>
												<!--end::Send-->
											</div>
										</div>
    </form>
    <!--end::Form-->
</div>
