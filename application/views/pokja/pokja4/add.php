

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
												<div class="col-lg-4 col-md-4 mt-4">
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
												<div class="col-lg-4 col-md-4 mt-4">
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
												<div class="col-lg-4 col-md-4 mt-4">
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
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Kader</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader Posyandu</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_posyandu" name="kader_posyandu"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader Gizi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_gizi" name="kader_gizi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Kader Kesehatan Lingkungan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_kesling" name="kader_kesling"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader Penyuluh Narkoba</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_penyuluhan_narkoba" name="kader_penyuluhan_narkoba"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kader PHBS</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_phbs" name="kader_phbs"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Kader KB</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kader_kb" name="kader_kb"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Kesehatan</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Posyandu</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kes_posyandu_jml" name="kes_posyandu_jml"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Posyandu Terintegrasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kes_posyandu_terintegrasi" name="kes_posyandu_terintegrasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kelompok Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kes_posyandu_klp" name="kes_posyandu_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kes_posyandu_lansia_anggota" name="kes_posyandu_lansia_anggota"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Jumlah Lansia Memiliki Kartu Gratis Berobat</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kes_posyandu_lansia_kartu_gratis" name="kes_posyandu_lansia_kartu_gratis"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Kelestarian Lingkungan Hidup</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki Jamban</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="rumah_jamban" name="rumah_jamban"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki SPAL</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="rumah_spai" name="rumah_spai"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki Tempat Sampah</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="rumah_pembuangan_sampah" name="rumah_pembuangan_sampah"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah MCK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="jml_mck" name="jml_mck"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air PDAM</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="krt_pdam" name="krt_pdam"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air Sumur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="krt_sumur" name="krt_sumur"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-desa">
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air Sumber Lainnya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="krt_lainnya" name="krt_lainnya"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Perencanaan Sehat</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Pasangan Usia Subur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="jum_pus" name="jum_pus"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Wanita Usia Subur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="jum_wus" name="jum_wus"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Akseptor KB Laki-Laki</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="akseptor_kb_l" name="akseptor_kb_l"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Akseptor KB Perempuan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="akseptor_kb_p" name="akseptor_kb_p"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah KK Memiliki Tabungan Keluarga</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="pnya_tab_keluarga" name="pnya_tab_keluarga"  required>
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