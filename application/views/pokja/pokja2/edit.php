<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        								<div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
														<select class="form-select form-select-lg form-select-solid"
															data-control="select2" data-placeholder="Pilih Level" name="level"
															id="level" disabled>
															<option value="<?=$pokja2->level?>"><?=$pokja2->level?></option>
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
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Warga Buta Huruf</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->butahuruf?>" id="butahuruf" name="butahuruf" required>
														<input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="Dusun I" id="id" name="id" value="<?=$pokja2->id?>">
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Taman Bacaan/Perpustakaan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->jmltamanbacaan?>" id="jmltamanbacaan" name="jmltamanbacaan" required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket A</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketAklpbelajar?>" id="paketAklpbelajar" name="paketAklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket A</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketAwargabelajar?>" id="paketAwargabelajar" name="paketAwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket B</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketBklpbelajar?>" id="paketBklpbelajar" name="paketBklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket B</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketBwargabelajar?>" id="paketBwargabelajar" name="paketBwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Paket C</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketCklpbelajar?>" id="paketCklpbelajar" name="paketCklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Warga Belajar Paket C</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paketCwargabelajar?>" id="paketCwargabelajar" name="paketCwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Belajar Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kfklpbelajar?>" id="kfklpbelajar" name="kfklpbelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Warga Belajar Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kfwargabelajar?>" id="kfwargabelajar" name="kfwargabelajar"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kelompok Belajar PAUD Sejenis</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->paudsejenis?>" id="paudsejenis" name="paudsejenis" required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah KLP</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->bkbklp?>" id="bkbklp" name="bkbklp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Ibu Peserta</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->bkbibupeserta?>" id="bkbibupeserta" name="bkbibupeserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah APE (Set)</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->bkbape?>" id="bkbape" name="bkbape"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-3 col-md-3 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel.Simulasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->bkbsimulasi?>" id="bkbsimulasi" name="bkbsimulasi"  required>
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
													<div>
														<label class="fs-6 form-label required">TUTOR Keaksaraan Fungsional</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderkhusus_tutorkf?>" id="kaderkhusus_tutorkf" name="kaderkhusus_tutorkf"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">TUTOR PAUD Sejenis</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderkhusus_tutorpaud?>" id="kaderkhusus_tutorpaud" name="kaderkhusus_tutorpaud"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">BKB</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderkhusus_bkb?>" id="kaderkhusus_bkb" name="kaderkhusus_bkb"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Koperasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderkhusus_koperasi?>" id="kaderkhusus_koperasi" name="kaderkhusus_koperasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Keterampilan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderkhusus_keterampilan?>" id="kaderkhusus_keterampilan" name="kaderkhusus_keterampilan"  required>
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
													<div>
														<label class="fs-6 form-label required">LP3 PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderdilatih_lp3pkk?>" id="kaderdilatih_lp3pkk" name="kaderdilatih_lp3pkk"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">TPK3 PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderdilatih_tpk3pkk?>" id="kaderdilatih_tpk3pkk" name="kaderdilatih_tpk3pkk"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">DAMAS PKK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->kaderdilatih_damaspkk?>" id="kaderdilatih_damaspkk" name="kaderdilatih_damaspkk"  required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Pemula</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_pemula_klp?>" id="koperasi_pemula_klp" name="koperasi_pemula_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Peserta Pemula</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_pemula_peserta?>" id="koperasi_pemula_peserta" name="koperasi_pemula_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Madya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_madya_klp?>" id="koperasi_madya_klp" name="koperasi_madya_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Peserta Madya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_madya_peserta?>" id="koperasi_madya_peserta" name="koperasi_madya_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Utama</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_utama_klp?>" id="koperasi_utama_klp" name="koperasi_utama_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Peserta Utama</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_utama_peserta?>" id="koperasi_utama_peserta" name="koperasi_utama_peserta"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kel. Mandiri</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_utama_peserta?>" id="koperasi_mandiri_klp" name="koperasi_mandiri_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Peserta Mandiri</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_mandiri_peserta?>" id="koperasi_mandiri_peserta" name="koperasi_mandiri_peserta"  required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Kelompok</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_badanhukum_klp?>" id="koperasi_badanhukum_klp" name="koperasi_badanhukum_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Anggota</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja2->koperasi_badanhukum_angg?>" id="koperasi_badanhukum_angg" name="koperasi_badanhukum_angg"  required>
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
															name="keterangan" id="keterangan"><?=$pokja2->keterangan?></textarea>
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
