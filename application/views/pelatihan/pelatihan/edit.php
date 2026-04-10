<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
		<div class="card-body mw-1000px py-20">
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Jenis Pelatihan</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Pelatihan" name="id_pelatihan" id="id_pelatihan">
							<option value="<?= $pelatihan->id_pelatihan ?>"><?= $pelatihan->nama_pelatihan ?></option>
							<?php
							foreach ($jenis_pelatihan as $plt) {
								echo "<option value='" . $plt->id . "'>" . $plt->nama_pelatihan . "</option>";
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Nama Pelatihan</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="hidden" value="<?= $pelatihan->id ?>" id="id" name="id">
						<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $pelatihan->nama ?>" id="nama" name="nama">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Peserta</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $pelatihan->peserta ?>" id="peserta" name="peserta">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Jumlah Peserta</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $pelatihan->jumlah ?>" id="jumlah" name="jumlah">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
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