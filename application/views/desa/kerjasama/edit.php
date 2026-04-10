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
							<option value="<?=$kerjasama->kode_kecamatan?>"><?=$kerjasama->Nama_Kecamatan?></option>
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
							<option value="<?=$kerjasama->kode_desa?>"><?=$kerjasama->Nama_Desa?></option>
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
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kerjasama" name="bentuk_kerjasama" id="bentuk_kerjasama" disabled>
							<?php
                            if ($kerjasama->bentuk_kerjasama == "Kerjasama Antar Desa") {
                                echo '<option value="Kerjasama Antar Desa">Kerjasama Antar Desa</option>
							<option value="Kerjasama Antar Desa Dengan Pihak ketiga">Kerjasama Antar Desa Dengan Pihak ketiga</option>';
                            } else {
                                echo '<option value="Kerjasama Antar Desa Dengan Pihak ketiga">Kerjasama Antar Desa Dengan Pihak ketiga</option>
								<option value="Kerjasama Antar Desa">Kerjasama Antar Desa</option>';
                            }
                            ?>
							
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
							<option value="<?=$kerjasama->jenis_kerjasama?>"><?=$kerjasama->jenis_kerjasama?></option>
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
						<input type="hidden" id="id" name="id"  value="<?=$kerjasama->id?>">
						<input class="form-control form-control-lg form-control-solid" type="text" id="nama_pihak" name="nama_pihak"  value="<?=$kerjasama->nama_pihak?>">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Tanggal Kerjasama</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="date" id="tmt_kerjasama" name="tmt_kerjasama"  value="<?=$kerjasama->tmt_kerjasama?>">
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
							<?php
                            if ($kerjasama->lembaga_kerjasama == "Ada") {
                                echo '<option value="Ada">Ada</option>
								<option value="Tidak Ada">Tidak Ada</option>';
                            } else {
                                echo '<option value="Tidak Ada">Tidak Ada</option>
								<option value="Ada">Ada</option>';
                            }
                            ?>
							
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
						<input class="form-control form-control-lg form-control-solid" type="text" id="nomor_perdes" name="nomor_perdes"  value="<?=$kerjasama->nomor_perdes?>">
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
						<?php
                            if ($kerjasama->lembaga_bumdes == "Ada") {
                                echo '<option value="Ada">Ada</option>
								<option value="Tidak Ada">Tidak Ada</option>';
                            } else {
                                echo '<option value="Tidak Ada">Tidak Ada</option>
								<option value="Ada">Ada</option>';
                            }
                            ?>
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
						<input class="form-control form-control-lg form-control-solid" type="text" id="nama_bumdes" name="nama_bumdes"  value="<?=$kerjasama->nama_bumdes?>"> 
					</div>
				</div>
			</div>
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