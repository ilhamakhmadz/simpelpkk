<div class="fv-row row ">
	<div class="row g-0 g-xl-5 g-xxl-1">

		<div class="col-xl-4">
			<form class="form flex-center" id="form_edit" name="form_edit" method="post">
				<input type="hidden" value="<?= (!empty($profil) ? $profil->id : '') ?>" id="id" name="id" required>

				<!--begin::Engage Widget 5-->
				<div class="card card-stretch mb-5 mb-xxl-8">
					<!--begin::Body-->
					<div class="card-body pb-0">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column h-100">
							<!--begin::Text-->
							<h3 class="text-dark text-center fs-1 fw-bolder pt-15 lh-lg">
								Logo <?= (!empty($profil) ? $profil->nama_dinas : '') ?>
							</h3>
							<!--end::Text-->
							<!--begin::Action-->
							<div class="text-center pt-7">
								<div class="spinner spinner-sm spinner-primary spinner-right">
									<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(<?= (empty($profil->file_logo)) ? base_url('/assets/admin_assets/assets/media/avatars/blank.png') : base_url(base64_decode($profil->file_logo)); ?>)">
										<!--begin::Image preview wrapper-->
										<div class="image-input-wrapper w-125px h-125px"></div>
										<!--end::Image preview wrapper-->

										<!--begin::Edit button-->
										<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Ubah Logo">
											<i class="fa fa-plus"></i>

											<!--begin::Inputs-->
											<input type="file" name="logo" id="logo" value="<?= $profil->file_logo ?>" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="logo_remove" id="logo_remove" value="<?= $profil->file_logo ?>" />
											<!--end::Inputs-->
										</label>
										<!--end::Edit button-->

										<!--begin::Cancel button-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
											<i class="fa fa-minus"></i>
										</span>
										<!--end::Cancel button-->

										<!--begin::Remove button-->
										<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
											<i class="fa fa-minus"></i>
										</span>
										<!--end::Remove button-->
									</div>
								</div>
								<button type="submit" class="btn btn-primary fw-bolder fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Simpan Data</button>

							</div>
							<!--end::Action-->
							<!--begin::Image-->
							<div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom card-rounded-bottom h-200px" style="background-image:url('assets/media/illustrations/terms-2.png')">
							</div>
							<!--end::Image-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Engage Widget 5-->
		</div>
		<div class="col-xl-8">
			<!--begin::Table Widget 1-->
			<div class="card card-stretch mb-5 mb-xxl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder text-dark fs-3">Profil</span>
						<!-- <span class="text-muted mt-2 fw-bold fs-6">890,344 Sales</span> -->
					</h3>
					<div class="card-toolbar">
						<ul class="nav nav-pills nav-pills-sm nav-light">
							<li class="nav-item">
								<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2 active" data-bs-toggle="tab" href="#kt_tab_pane_1_1">Info</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#kt_tab_pane_1_2">Tentang</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_1_3">Deskripsi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_1_4">Struktur Organisasi</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2 pb-0 mt-n3">
					<div class="tab-content mt-5" id="myTabTables1">
						<!--begin::Tap pane-->
						<div class="tab-pane fade active show" id="kt_tab_pane_1_1" role="tabpanel" aria-labelledby="kt_tab_pane_1_1">
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Nama</label>
								<div class="col-lg-9">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<input class="form-control form-control-lg form-control-solid required" type="text" value="<?= (!empty($profil) ? $profil->nama_dinas : '') ?>" id="nama_dinas" name="nama_dinas" required>
									</div>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Alamat Kantor</label>
								<div class="col-lg-9">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<input class="form-control form-control-lg form-control-solid required" type="text" value="<?= (!empty($profil) ? $profil->alamat : '') ?>" id="alamat" name="alamat" required>
									</div>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Email</label>
								<div class="col-lg-9">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<input class="form-control form-control-lg form-control-solid required" type="text" value="<?= (!empty($profil) ? $profil->email : '') ?>" id="email" name="email" required>
									</div>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Telepon</label>
								<div class="col-lg-9">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<input class="form-control form-control-lg form-control-solid required" type="text" value="<?= (!empty($profil) ? $profil->telepon : '') ?>" id="telepon" name="telepon" required>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Sosial Media</label>
								<div class="col-lg-5">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<div class="input-group input-group-lg input-group-solid">
											<span class="input-group-text pe-3 btn-twitter">
												<i class="fab fa-facebook-f"></i>
											</span>
											<input type="text" class="form-control form-control-lg form-control-solid" value="<?= (!empty($sosmed) ? $sosmed->facebook : '') ?>" name="facebook" id="facebook" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<div class="input-group input-group-lg input-group-solid">
											<span class="input-group-text pe-3 btn-twitter">
												<i class="fab fa-twitter"></i>
											</span>
											<input type="text" class="form-control form-control-lg form-control-solid" value="<?= (!empty($sosmed) ? $sosmed->twitter : '') ?>" name="twitter" id="twitter" required>
										</div>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label"></label>
								<div class="col-lg-5">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<div class="input-group input-group-lg input-group-solid">
											<span class="input-group-text pe-3 btn-twitter">
												<i class="fab fa-whatsapp"></i>
											</span>
											<input type="text" class="form-control form-control-lg form-control-solid" value="<?= (!empty($sosmed) ? $sosmed->whatsapp : '') ?>" name="whatsapp" id="whatsapp" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<div class="input-group input-group-lg input-group-solid">
											<span class="input-group-text pe-3 btn-twitter">
												<i class="fab fa-instagram"></i>
											</span>
											<input type="text" class="form-control form-control-lg form-control-solid" value="<?= (!empty($sosmed) ? $sosmed->instagram : '') ?>" name="instagram" id="instagram" required>
										</div>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label"></label>
								<div class="col-lg-9">
									<div class="form-text">Masukkan Sosial Media berserta Link dari media sosial tersebut, contoh :
										<a href="https://facebook.com/humaskabbandung" class="fw-bold">https://facebook.com/humaskabbandung</a>.
									</div>
								</div>
							</div>
							<!--end::Form row-->

						</div>
						<!--end::Tap pane-->
						<!--begin::Tap pane-->
						<div class="tab-pane fade" id="kt_tab_pane_1_2" role="tabpanel" aria-labelledby="kt_tab_pane_1_2">
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Sejarah</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="sejarah" id="sejarah"><?= (!empty($profil) ? $profil->sejarah : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Sambutan Kepala</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="sambutan" id="sambutan"><?= (!empty($profil) ? $profil->sambutan : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Program Kerja</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="program_kerja" id="program_kerja"><?= (!empty($profil) ? $profil->program_kerja : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Mars PKK</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="mars_pkk" id="mars_pkk"><?= (!empty($profil) ? $profil->mars_pkk : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

						</div>
						<!--end::Tap pane-->
						<!--begin::Tap pane-->
						<div class="tab-pane fade" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Tugas Pokok & Fungsi</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="tupoksi" id="tupoksi"><?= (!empty($profil) ? $profil->tupoksi : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Visi</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="visi" id="visi"><?= (!empty($profil) ? $profil->visi : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-2 col-form-label">Misi</label>
								<div class="col-lg-10">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<textarea name="misi" id="misi"><?= (!empty($profil) ? $profil->misi : '') ?></textarea>
									</div>
								</div>
							</div>
							<!--end::Form row-->
						</div>
						</form>

						<!--end::Tap pane-->
						<div class="tab-pane fade" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
							
							<form id="form_edit_struktur" name="form_edit_struktur" method="post">

								<div class="row mb-8">

									<label class="col-lg-3 col-form-label required">Upload Struktur Organisasi</label>
									<div class="col-lg-5">
										<div class="spinner spinner-sm spinner-primary spinner-right">
											<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(<?= (empty($profil->file_struktur_organisasi)) ? base_url('/assets/admin_assets/assets/media/avatars/blank.png') : base_url(base64_decode($profil->file_struktur_organisasi)); ?>)">
												<!--begin::Image preview wrapper-->
												<div class="image-input-wrapper w-125px h-125px"></div>
												<!--end::Image preview wrapper-->

												<!--begin::Edit button-->
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Ubah Logo">
													<i class="fa fa-plus"></i>

													<!--begin::Inputs-->
													<input type="file" name="struktur_organisasi" id="struktur_organisasi" accept=".png, .jpg, .jpeg" />
													<input type="hidden" value="<?= (!empty($profil) ? $profil->id : '') ?>" id="id" name="id" required>
													<input type="hidden" name="struktur_organisasi_remove" id="struktur_organisasi_remove" value="<?= $profil->file_struktur_organisasi ?>" />
													<!--end::Inputs-->
												</label>
												<!--end::Edit button-->

												<!--begin::Cancel button-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
													<i class="fa fa-minus"></i>
												</span>
												<!--end::Cancel button-->

												<!--begin::Remove button-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-blue shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Hapus Logo">
													<i class="fa fa-minus">upload</i>
												</span>
												<!--end::Remove button-->
											</div>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="spinner spinner-sm spinner-primary spinner-left">
											<div class="input-group input-group-lg input-group-solid">
												<button type="submit" class="btn btn-primary fw-bolder">Upload Struktur organisasi</button>
											</div>
										</div>
									</div>

								</div>
							</form>
							<!--end::Form row-->
						</div>
						<!--end::Tap pane-->
					</div>
				</div>
			</div>
			<!--end::Table Widget 1-->
		</div>
	</div>
	<!-- </div> -->
</div>