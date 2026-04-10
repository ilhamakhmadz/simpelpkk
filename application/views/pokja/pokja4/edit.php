<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        <div class="card-body mw-800px py-20">
											<div class="fv-row row ">
												<div class="col-lg-12 col-md-12">
													<!--end::Form Group-->
													<div class="">
														<label class="fs-6 form-label fw-bolder text-dark required">Level Organisasi</label>
														<select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="level" id="level" required disabled>
															<option value="<?=$pokja4->level?>"><?=$pokja4->level?></option>
														</select>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>

											<div class="col-lg-6 col-md-6 mt-8">
												<label class="fs-6 form-label fw-bolder">Jumlah Kader</label>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader Posyandu</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_posyandu?>" id="kader_posyandu" name="kader_posyandu"  required>
														<input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="Dusun I" id="id" name="id" value="<?=$pokja4->id?>" disabled>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader Gizi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_gizi?>" id="kader_gizi" name="kader_gizi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader Kesehatan Lingkungan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_kesling?>" id="kader_kesling" name="kader_kesling"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader Penyuluh Narkoba</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_penyuluhan_narkoba?>" id="kader_penyuluhan_narkoba" name="kader_penyuluhan_narkoba"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader PHBS</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_phbs?>" id="kader_phbs" name="kader_phbs"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Kader KB</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kader_kb?>" id="kader_kb" name="kader_kb"  required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Posyandu</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kes_posyandu_jml?>" id="kes_posyandu_jml" name="kes_posyandu_jml"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Posyandu Terintegrasi</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kes_posyandu_terintegrasi?>" id="kes_posyandu_terintegrasi" name="kes_posyandu_terintegrasi"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Kelompok Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kes_posyandu_klp?>" id="kes_posyandu_klp" name="kes_posyandu_klp"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Anggota Lansia</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kes_posyandu_lansia_anggota?>" id="kes_posyandu_lansia_anggota" name="kes_posyandu_lansia_anggota"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Lansia Memiliki Kartu Gratis Berobat</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->kes_posyandu_lansia_kartu_gratis?>" id="kes_posyandu_lansia_kartu_gratis" name="kes_posyandu_lansia_kartu_gratis"  required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki Jamban</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->rumah_jamban?>" id="rumah_jamban" name="rumah_jamban"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki SPAL</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->rumah_spai?>" id="rumah_spai" name="rumah_spai"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Rumah Memiliki Tempat Sampah</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->rumah_pembuangan_sampah?>" id="rumah_pembuangan_sampah" name="rumah_pembuangan_sampah"  required>
													</div>
													<!--end::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah MCK</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->jml_mck?>" id="jml_mck" name="jml_mck"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air PDAM</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->krt_pdam?>" id="krt_pdam" name="krt_pdam"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air Sumur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->krt_sumur?>" id="krt_sumur" name="krt_sumur"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-4 col-md-4 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah KRT Menggunakan Air Sumber Lainnya</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->krt_lainnya?>" id="krt_lainnya" name="krt_lainnya"  required>
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
													<div>
														<label class="fs-6 form-label required">Jumlah Pasangan Usia Subur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->jum_pus?>" id="jum_pus" name="jum_pus"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Wanita Usia Subur</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->jum_wus?>" id="jum_wus" name="jum_wus"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Akseptor KB Laki-Laki</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->akseptor_kb_l?>" id="akseptor_kb_l" name="akseptor_kb_l"  required>
													</div>
													<!--begin::Form Group-->
												</div>
												<div class="col-lg-6 col-md-6 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah Akseptor KB Perempuan</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->akseptor_kb_p?>" id="akseptor_kb_p" name="akseptor_kb_p"  required>
													</div>
													<!--begin::Form Group-->
												</div>
											</div>
											<div class="fv-row row md-8">
												<div class="col-lg-12 col-md-12 mt-6">
													<!--end::Form Group-->
													<div>
														<label class="fs-6 form-label required">Jumlah KK Memiliki Tabungan Keluarga</label>
														<input class="form-control form-control-lg form-control-solid required" type="number" value="<?=$pokja4->pnya_tab_keluarga?>" id="pnya_tab_keluarga" name="pnya_tab_keluarga"  required>
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
															name="keterangan" id="keterangan"><?=$pokja4->keterangan?></textarea>
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
