<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
		<div class="card-body mw-800px py-20">
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<label class="fs-6 mt-5 form-label fw-bolder required">Jenis Dokument</label>
					<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih dokumen" name="dokumen" id="dokumen" required>
						<option value="<?= $dokumen->id_dokumen; ?>"><?= $dokumen->nama_dokumen; ?></option>
						<?php
						foreach ($m_dokumen as $nama) {
							echo "<option value='" . $nama->id . "'>" . $nama->nama_dokumen . "</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<label class="fs-6 mt-5 form-label fw-bolder required">Nama Dokumen</label>
					<input type="hidden" id="id" name="id" value="<?= $dokumen->id ?>">
					<input class="form-control form-control-lg form-control-solid" type="text" id="nama" name="nama" value="<?= $dokumen->nama; ?>" required>
				</div>
			</div>
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<label class="fs-6 mt-5 form-label fw-bolder required">Upload File</label>
					<input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file">
					<input type="hidden" name="file_remove" id="file_remove" value="<?= $dokumen->file; ?>">
					<div class="form-text">Lihat dokumen yang telah di upload.
						<a href="<?= base_url() . base64_decode($dokumen->file); ?>" class="fw-bold" target="_blank">download</a>.
					</div>
				</div>
			</div>
			<br>

			<div class="fv-row row">
				<div class="col-lg-12 col-md-12">
					<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Ubah</button>
				</div>

			</div>
		</div>
</div>

</div>
</form>
<!--end::Form-->
</div>