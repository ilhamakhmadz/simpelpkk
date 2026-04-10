

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
											<br>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
														<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique required>
															<option></option>
															 <?php
                                                             if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
																foreach ($kecamatan as $nama) {
																	echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
																}
															} elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4|| $this->session->userdata('level_id') == 5|| $this->session->userdata('level_id') == 6|| $this->session->userdata('level_id') == 7) {
																echo "<option value='" . $kecamatan->Kd_Kec . "'>" . $kecamatan->Nama_Kecamatan . "</option>";
															}

															 ?>
														</select>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-control="select2" data-placeholder="Pilih Desa"
															name="kd_desa" id="kd_desa">
														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4">
													<!--end::Form Group-->
													<div id="div-dusun">
														<label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-control="select2" data-placeholder="Pilih Dusun"
															name="kd_dusun" id="kd_dusun">
														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-4">
													<!--end::Form Group-->
													<div id="div-rw">
														<label class="fs-6 form-label fw-bolder text-dark">Nama RW</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-control="select2" data-placeholder="Pilih RW"
															name="kd_rw" id="kd_rw">
														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-4">
													<!--end::Form Group-->
													<div id="div-rt">
														<label class="fs-6 form-label fw-bolder text-dark">Nama RT</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-control="select2" data-placeholder="Pilih RT"
															name="kd_rt" id="kd_rt">
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader PKBN</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_pkbn" name="kader_pkbn"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader PKDRT</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_pkdrt" name="kader_pkdrt"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Kader Pola Asuh</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_polaasuh" name="kader_polaasuh"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Simulasi PKBN</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="pkbn_klpsimulasi" name="pkbn_klpsimulasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota PKBN</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="pkbn_angg" name="pkbn_angg"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Simulasi PKDRT</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="pkdrt_klpsimulasi" name="pkdrt_klpsimulasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota PKDRT</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="pkdrt_angg" name="pkdrt_angg"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kelompok Pola Asuh</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="polaasuh_klp" name="polaasuh_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota Pola Asuh</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="polaasuh_anggota" name="polaasuh_anggota"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kelompok Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="lansia_klp" name="lansia_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="lansia_angg" name="lansia_angg"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Kelompok Gotong Royong</label>
											</div>

											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kerja Bakti</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kelompok_kerjabakti" name="kelompok_kerjabakti"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Rukun Kematian</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kelompok_kematian" name="kelompok_kematian"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Keagamaan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kelompok_keagamaan" name="kelompok_keagamaan"  required>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jimpitan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kelompok_jimpitan" name="kelompok_jimpitan"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Arisan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kelompok_arisan" name="kelompok_arisan"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label mt-6">Keterangan
														</label>
														<textarea class="form-control form-control-lg form-control-solid"
															name="keterangan" id="keterangan"></textarea>
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