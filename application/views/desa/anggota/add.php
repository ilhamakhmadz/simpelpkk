

<div class="card">
	<div class="card-body pt-2 pb-0 mt-n3">

									<!--begin::Form-->
									<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
													<div class="w-100">
											<br><br>
											<div class="pb-10 pb-lg-15">
												<h5 class="fw-bolder text-dark display-8">Buku Anggota</h5>
											</div>
											<!--begin::Form Group-->
											<div class="fv-row row">
												<!--begin::Form Group-->
												<div class="fv-row row mb-5">
													<div class="col-lg-6 col-md-6">
														<!--end::Form Group-->
														<div class="">
															<label class="fs-6 form-label fw-bolder text-dark">NIK</label>
															<input type="text" class="form-control form-control-lg form-control-solid"
																name="nik" id="nik" maxlength="16" />
														</div>
														<!--end::Form Group-->
													</div>
													<div class="col-lg-6 col-md-6">
														<!--end::Form Group-->
														<div class="">
															<label class="fs-6 form-label fw-bolder text-dark">No KK
															</label>
															<input type="text" class="form-control form-control-lg form-control-solid"
																name="kk" id="kk" maxlength="16" />
														</div>
														<!--end::Form Group-->
													</div>
												</div>
											</div>
											<div class="fv-row row ">
												<div class="col-lg-4 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">No Registrasi TP.PKK</label>
														<input type="hidden" name="id_data" id="id_data" value="<?=$aparatur->id?>">
														<input type="hidden" name="kode_kecamatan" id="kode_kecamatan" value="<?=$aparatur->kode_kecamatan?>">
														<input type="hidden" name="kode_desa" id="kode_desa" value="<?=$aparatur->kode_desa?>">
														<input type="hidden" name="dusun" id="dusun" value="<?=$aparatur->dusun?>">
														<input type="hidden" name="rw" id="rw" value="<?=$aparatur->rw?>">
														<input type="hidden" name="rt" id="rt" value="<?=$aparatur->rt?>">
														<input type="hidden" name="level" id="level" value="<?=$aparatur->level?>">
														<input type="hidden" name="date_year" id="date_year" value="<?=$aparatur->date_year?>">
														<input type="text" class="form-control form-control-lg form-control-solid"
															name="no_reg_tp_pkk" id="no_reg_tp_pkk" />
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-5 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Nama
														</label>
														<input type="text" class="form-control form-control-lg form-control-solid"
															name="nama" id="nama" />
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-3 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
														</label>
														<select class="form-control form-control-lg form-control-solid"
															name="jenis_kelamin" id="jenis_kelamin" data-control="select2"
															data-placeholder="Pilih Jenis Kelamin">
															<option></option>
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--end::Form Group-->
											<!--begin::Form Group-->
											<div class="fv-row row ">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Tempat Lahir</label>
														<input type="text" class="form-control form-control-lg form-control-solid"
															name="tempat_lahir" id="tempat_lahir"/>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
														</label>
														<input type="date" class="form-control form-control-lg form-control-solid"
															name="tanggal_lahir" id="tanggal_lahir"/>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--end::Form Group-->
											<!--begin::Form Group-->
											<div class="fv-row row ">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Jabatan</label>
														<select class="form-control form-control-lg form-control-solid" name="jabatan"
															id="jabatan" data-control="select2" data-placeholder="Pilih Jabatan">
															<option></option>

															<option value="Ketua">Ketua</option>
															<option value="Wakil Ketua">Wakil Ketua</option>
															<option value="Bendahara">Bendahara</option>
															<option value="Wakil Bendahara">Wakil Bendahara</option>
															<option value="Sekertaris">Sekertaris</option>
															<option value="Wakil Sekertaris">Wakil Sekertaris</option>
															<option value="Ketua Pokja I">Ketua Pokja I</option>
															<option value="Ketua Pokja II">Ketua Pokja II</option>
															<option value="Ketua Pokja III">Ketua Pokja III</option>
															<option value="Ketua Pokja IV">Ketua Pokja IV</option>
															<option value="Anggota">Anggota</option>

														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Kedudukan Fungsi
														</label>
														<select class="form-control form-control-lg form-control-solid"
															name="kedudukan_fungsi" id="kedudukan_fungsi" data-control="select2"
															data-placeholder="Pilih Kedudukan Fungsi">
															<option></option>

															<option value="Dalam Keanggotaan TP.PKK">Dalam Keanggotaan TP.PKK</option>
															<option value="Kader Umum">Kader Umum</option>
															<option value="Kader Khusus">Kader Khusus</option>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--end::Form Group-->
											<!--begin::Form Group-->
											<div class="fv-row row ">
												<div class="col-lg-4 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Status</label>
														<select class="form-control form-control-lg form-control-solid" name="status"
															id="status" data-control="select2"
															data-placeholder="Pilih Status Perkawinan">
															<option></option>

															<option value="BELUM KAWIN">BELUM KAWIN</option>
															<option value="KAWIN">KAWIN</option>
															<option value="CERAI HIDUP">CERAI HIDUP</option>
															<option value="CERAI MATI">CERAI MATI</option>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-5 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Pendidikan
														</label>
														<select class="form-control form-control-lg form-control-solid"
															name="pendidikan" id="pendidikan" data-control="select2"
															data-placeholder="Pilih Pendidikan Terakhir">
															<option></option>

															<option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK TK/KELOMPOK
																BERMAIN</option>
															<option value="TK/KELOMPOK BERMAIN">TK/KELOMPOK BERMAIN
															</option>
															<option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH</option>
															<option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
															<option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
															<option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
															<option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
															<option value="D-1/SEDERAJAT">D-1/SEDERAJAT</option>
															<option value="D-2/SEDERAJAT">D-2/SEDERAJAT</option>
															<option value="D-3/SEDERAJAT">D-3/SEDERAJAT</option>
															<option value="S-1/SEDERAJAT">S-1/SEDERAJAT</option>
															<option value="S-2/SEDERAJAT">S-2/SEDERAJAT</option>
															<option value="S-3/SEDERAJAT">S-3/SEDERAJAT</option>
															<option value="SLB A/SEDERAJAT">SLB A/SEDERAJAT</option>
															<option value="SLB B/SEDERAJAT">SLB B/SEDERAJAT</option>
															<option value="SLB C/SEDERAJAT">SLB C/SEDERAJAT</option>
															<option value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">TIDAK DAPAT
																MEMBACA DAN MENULIS HURUF LATIN/ARAB</option>
															<option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>


														</select>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-3 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Pekerjaan
														</label>
														<select class="form-control form-control-lg form-control-solid" name="pekerjaan"
															id="pekerjaan" data-control="select2" data-placeholder="Pilih Pekerjaan">
															<option></option>

															<?php
                                                            foreach ($pekerjaan as $value) {
                                                                echo "<option value='" . $value->nama . "'>" . $value->nama . "</option>";
                                                            }
														?>
														</select>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--end::Form Group-->
											<!--begin::Form Group-->
											<div class="fv-row row ">
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Alamat</label>
														<textarea class="form-control form-control-lg form-control-solid" name="alamat"
															id="alamat"></textarea>
													</div>
													<!--end::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark">Keterangan
														</label>
														<textarea class="form-control form-control-lg form-control-solid"
															name="keterangan" id="keterangan"></textarea>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<br>
											<!--end::Form Group-->
											<div class="fv-row mb-10">
												<button type="submit" class="btn btn-twitter ">
													<i class="fas fa-plus"></i> Simpan
												</button>
											</div>
										</div>>
									</form>
									<!--end::Form-->
								</div>
							</div>