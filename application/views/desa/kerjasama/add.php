<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
		<div class="card-body mw-1000px py-20">
			<div class="fv-row row ">
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label fw-bolder text-dark required">Nama Kecamatan</label>
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" required>
							<option></option>
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
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa" required>
						</select>
					</div>
					<!--end::Form Group-->
				</div>
			</div>
			<br>
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Bentuk Kerjasama</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kerjasama" name="bentuk_kerjasama" id="bentuk_kerjasama">
							<option></option>
							<option value="Kerjasama Antar Desa">Kerjasama Antar Desa</option>
							<option value="Kerjasama Antar Desa Dengan Pihak ketiga">Kerjasama Antar Desa Dengan Pihak ketiga</option>
						</select>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Jenis Kerjasama</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Jenis Kerjasama" name="jenis_kerjasama" id="jenis_kerjasama">
							<option></option>
							<option value="Peningkatan Perekonomian Masyarakat Desa">Peningkatan Perekonomian Masyarakat Desa</option>
							<option value="Peningkatan Pelayanan Pendidikan">Peningkatan Pelayanan Pendidikan</option>
							<option value="Kesehatan">Kesehatan</option>
							<option value="Pertanian">Pertanian</option>
							<option value="Sosial Budaya">Sosial Budaya</option>
							<option value="Ketertiban">Ketertiban</option>
							<option value="Tenaga Kerja">Tenaga Kerja</option>
							<option value="Pekerjaan Umum">Pekerjaan Umum</option>
							<option value="Keuangan Mikro">Keuangan Mikro</option>
							<option value="Pemanfaatan Sumberdaya Alam dan Teknologi Tepat Guna Dengan Memperhatikan Kelestarian dan Keadilan Lingkungan">Pemanfaatan Sumberdaya Alam dan Teknologi Tepat Guna Dengan Memperhatikan Kelestarian dan Keadilan Lingkungan</option>
							<option value="Lain-Lain Bidang Kerjasama Yang Menjadi Kewenangan Desa">Lain-Lain Bidang Kerjasama Yang Menjadi Kewenangan Desa</option>

						</select>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Nama Desa/Pihak Ketiga</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="text" value="" id="nama_pihak" name="nama_pihak">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Tanggal Kerjasama</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="date" value="" id="tmt_kerjasama" name="tmt_kerjasama">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8" id="form_lembaga_kerjasama">
				<label class="col-lg-3 col-form-label">Lembaga Kerjasama</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Lembaga" name="lembaga_kerjasama" id="lembaga_kerjasama">
							<option value="Tidak Ada">Tidak Ada</option>
							<option value="Ada">Ada</option>
						</select>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8" id="form_nomor_perdes">
				<label class="col-lg-3 col-form-label">Nomor Perdes</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" value="-" type="text" value="" id="nomor_perdes" name="nomor_perdes">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8" id="form_lembaga_bumdes">
				<label class="col-lg-3 col-form-label">Lembaga Bumdes</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Bumdes" name="lembaga_bumdes" id="lembaga_bumdes">
							<option value="Tidak Ada">Tidak Ada</option>
							<option value="Ada">Ada</option>
						</select>
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8" id="form_nama_bumdes">
				<label class="col-lg-3 col-form-label">Nama Bumdes</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" value="-" type="text" value="" id="nama_bumdes" name="nama_bumdes">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<div class="fv-row mb-10">
				<a onclick="tambahKerjasama()" class="btn btn-icon btn-twitter btn-sm me-3">
					<i class="fas fa-plus"></i>
				</a>
			</div>
			<div class="border-top mt-5"></div><br>
			<!-- <div class="fv-row mb-12"> -->
			<table class="table gs-7 gy-7 gx-7" id="table-kerjasama">
				<thead>
					<tr class="fw-bolder fs-6 text-gray-800">
						<th>Bentuk Kerjasama</th>
						<th>Jenis Kerjasama</th>
						<th>Pihak Ketiga</th>
						<th>Tanggal Kerjasama</th>
						<th>Lembaga Kerjasama</th>
						<th>Nomor Perdes</th>
						<th>Lembaga Bumdes</th>
						<th>Nama Bumdes</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<!-- </div> -->
			<!--begin::Form row-->
			<div class="row">
				<label class="col-lg-3 col-form-label"></label>
				<div class="col-lg-9">
					<button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan</button>
				</div>
			</div>
			<!--end::Form row-->
		</div>
	</form>
	<!--end::Form-->
</div>