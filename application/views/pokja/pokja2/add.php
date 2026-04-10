

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
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Warga Buta Huruf</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="butahuruf" name="butahuruf" required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Taman Bacaan/Perpustakaan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="jmltamanbacaan" name="jmltamanbacaan" required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Kelompok Belajar</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket A</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketAklpbelajar" name="paketAklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket A</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketAwargabelajar" name="paketAwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket B</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketBklpbelajar" name="paketBklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket B</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketBwargabelajar" name="paketBwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket C</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketCklpbelajar" name="paketCklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket C</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paketCwargabelajar" name="paketCwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kfklpbelajar" name="kfklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Warga Belajar Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kfwargabelajar" name="kfwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Kelompok Belajar PAUD Sejenis</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="paudsejenis" name="paudsejenis" required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Bina Keluarga Balita (BKB)</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah KLP</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="bkbklp" name="bkbklp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Ibu Peserta</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="bkbibupeserta" name="bkbibupeserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah APE (Set)</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="bkbape" name="bkbape"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel.Simulasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="bkbsimulasi" name="bkbsimulasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Kader Khusus</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">TUTOR Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderkhusus_tutorkf" name="kaderkhusus_tutorkf"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">TUTOR PAUD Sejenis</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderkhusus_tutorpaud" name="kaderkhusus_tutorpaud"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">BKB</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderkhusus_bkb" name="kaderkhusus_bkb"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Koperasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderkhusus_koperasi" name="kaderkhusus_koperasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Keterampilan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderkhusus_keterampilan" name="kaderkhusus_keterampilan"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Kader Yang Sudah Dilatih</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">LP3 PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderdilatih_lp3pkk" name="kaderdilatih_lp3pkk"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">TPK3 PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderdilatih_tpk3pkk" name="kaderdilatih_tpk3pkk"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">DAMAS PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="kaderdilatih_damaspkk" name="kaderdilatih_damaspkk"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">RA KOPERASI/USAHA BERSAMA/UP2K</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Pemula</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_pemula_klp" name="koperasi_pemula_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Peserta Pemula</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_pemula_peserta" name="koperasi_pemula_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Madya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_madya_klp" name="koperasi_madya_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Peserta Madya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_madya_peserta" name="koperasi_madya_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Utama</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_utama_klp" name="koperasi_utama_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Peserta Utama</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_utama_peserta" name="koperasi_utama_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kel. Mandiri</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_mandiri_klp" name="koperasi_mandiri_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Peserta Mandiri</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_mandiri_peserta" name="koperasi_mandiri_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Koprasi Berbadan Hukum</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Kelompok</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_badanhukum_klp" name="koperasi_badanhukum_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div id="div-kec">
														<label class="fs-6 form-label required">Jumlah Anggota</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="0" id="koperasi_badanhukum_angg" name="koperasi_badanhukum_angg"  required>
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