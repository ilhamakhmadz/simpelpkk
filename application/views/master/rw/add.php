<div class="card">
	<div class="row mb-12">
		<div class="content fs-6 d-flex flex-column-fluid" id="kt_content" data-select2-id="select2-data-kt_content">
			<!--begin::Container-->
			<div class="container" data-select2-id="select2-data-13-guag">
				<!--begin::Profile Account-->
				<div class="card" data-select2-id="select2-data-12-xgkw">
					<!--begin::Form-->
					<form class="form d-flex flex-center" data-select2-id="select2-data-11-fnw9" id="form_add" name="form_add" method="post">
						<div class="card-body mw-800px py-20" data-select2-id="select2-data-10-xs94">
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 form-label  fw-bolder">Pilih Kecamatan</label>
								<div class="col-lg-9">
									<div class="spinner spinner-sm spinner-primary spinner-right">
										<select class="form-select" data-placeholder="Pilih Kecamatan" name="kec_id" id="kec_id" disabled>
											<!-- <option></option> -->
											<?php
                                            foreach ($kecamatan as $nama) {
                                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                            }
                                            ?>
										</select>
									</div>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 form-label  fw-bolder required">Kode Desa</label>
								<div class="col-lg-9">
									<input type="hidden" class="form-control form-control-lg form-control-solid" id="kd_desa" name="kd_desa" value="<?=$info->Kd_Desa?>" disabled>
									<input type="text" class="form-control form-control-lg form-control-solid" id="nama_desa" name="nama_desa" value="<?=$info->Nama_Desa?>" disabled>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">Dusun</label>
								<div class="col-lg-9">
									<div class="input-group input-group-lg input-group-solid">
										<input type="hidden" class="form-control form-control-lg form-control-solid" id="kd_dusun" name="kd_dusun" value="<?=$info->id?>" disabled>
										<input type="text" class="form-control form-control-lg form-control-solid" id="dusun" name="dusun" value="<?=$info->dusun?>" disabled>
									</div>
								</div>
							</div>
							<!--end::Form row-->
							<!--begin::Form row-->
							<div class="row mb-8">
								<label class="col-lg-3 col-form-label required">RW</label>
								<div class="col-lg-9">
									<div class="input-group input-group-lg input-group-solid">
										<input type="text" class="form-control form-control-lg form-control-solid" style="text-transform:uppercase" maxlength="3" minlength="3" id="rw" name="rw" required>
									</div>
								</div>
							</div>
							<!--end::Form row-->

							<!--begin::Form row-->
							<div class="separator separator-dashed my-10"></div>
							<!--begin::Form row-->
							<div class="row">
								<label class="col-lg-3 col-form-label"></label>
								<div class="col-lg-9">
									<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan</button>
									<!-- <button type="reset" class="btn btn-color-gray-600 btn-active-light-primary fw-bolder px-6 py-3">Cancel</button> -->
								</div>
							</div>
							<!--end::Form row-->
						</div>
					</form>
					<!--end::Form-->
				</div>
				<!--end::Profile Account-->
			</div>
			<!--end::Container-->
		</div>
	</div>
</div>