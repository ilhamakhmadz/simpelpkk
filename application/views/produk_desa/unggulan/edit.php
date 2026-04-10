<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
		<div class="card-body mw-1000px py-20">
			<div class="fv-row row ">
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" disabled>
							<option value="<?=$unggulan->kode_kecamatan?>"><?=$unggulan->Nama_Kecamatan?></option>
							<?php
                            foreach ($kecamatan as $nama) {
                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                            }
                            ?>
						</select>
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label fw-bolder text-dark required">Nama Desa</label>
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa" disabled>
							<option value="<?=$unggulan->kode_desa?>"><?=$unggulan->Nama_Desa?></option>
						</select>
					</div>
					<!--end::Form Group-->
				</div>
			</div>
			<br>
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Nama Produk Unggulan</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input type="hidden" id="id" name="id" value="<?=$unggulan->id?>">
						<input type="hidden" id="old_img" name="old_img" value="<?=$unggulan->gambar_produk?>">
						<input class="form-control form-control-lg form-control-solid" type="text" id="nama_produk" name="nama_produk" value="<?=$unggulan->nama_produk?>">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Deskripsi Produk</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
					<textarea name="deskripsi_produk" id="deskripsi_produk"><?=$unggulan->deskripsi_produk?></textarea>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Harga Produk</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="number" id="harga_produk" name="harga_produk" value="<?=$unggulan->harga_produk?>">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Upload Gambar</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(<?=(empty($unggulan->gambar_produk)) ? base_url('/assets/admin_assets/assets/media/avatars/blank.png') : base_url(base64_decode($unggulan->gambar_produk));?>)">
							<!--begin::Image preview wrapper-->
							<div class="image-input-wrapper w-125px h-125px"></div>
							<!--end::Image preview wrapper-->

							<!--begin::Edit button-->
							<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
								data-kt-image-input-action="change"
								data-bs-toggle="tooltip"
								data-bs-dismiss="click"
								title="Ubah Gambar">
								<i class="fa fa-plus"></i>

								<!--begin::Inputs-->
								<input type="file" name="avatar" id="gambar_produk" value="<?=$unggulan->gambar_produk?>" accept=".png, .jpg, .jpeg" />
								<input type="hidden" name="avatar_remove" /> 
								<!--end::Inputs-->
							</label>
							<!--end::Edit button-->

							<!--begin::Cancel button-->
							<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
								data-kt-image-input-action="cancel"
								data-bs-toggle="tooltip"
								data-bs-dismiss="click"
								title="Cancel avatar">
								<i class="fa fa-minus"></i>
							</span>
							<!--end::Cancel button-->

							<!--begin::Remove button-->
							<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
								data-kt-image-input-action="remove"
								data-bs-toggle="tooltip"
								data-bs-dismiss="click"
								title="Remove avatar">
								<i class="fa fa-minus"></i>
							</span>
							<!--end::Remove button-->
						</div>
					</div>
				</div>
			</div>
			<!--end::Form row-->

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