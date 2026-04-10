<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
		<div class="card-body mw-800px py-20">
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<label class="fs-6 mt-5 form-label fw-bolder required">Jenis Dokumen</label>
					<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Dokumen" name="dokumen" id="dokumen" required>
						<option></option>
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
					<input class="form-control form-control-lg form-control-solid" type="text" id="nama" name="nama" required>
				</div>
			</div>
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<label class="fs-6 mt-5 form-label fw-bolder required">Upload File</label>
					<input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file">
				</div>
			</div>
			<br>
			<div class="fv-row row">
				<div class="col-lg-12 col-md-12">
					<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan</button>
				</div>

			</div>
		</div>
</div>

</div>
</form>
<!--end::Form-->
</div>