<div class="card">
	<!--begin::Form-->
	<form class="form d-flex flex-center" id="form_add" name="form_add" method="post">
		<div class="card-body mw-1000px py-20">
			
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Jenis Pelatihan</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Pelatihan" name="id_pelatihan" id="id_pelatihan">
							<option></option>
							<?php
                            foreach ($pelatihan as $plt) {
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
						<input class="form-control form-control-lg form-control-solid" type="text" value="" id="nama" name="nama">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Peserta</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="text" value="" id="peserta" name="peserta">
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Jumlah Peserta</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right">
						<input class="form-control form-control-lg form-control-solid" type="text" value="" id="jumlah" name="jumlah">
					</div>
				</div>
			</div>
			<!--end::Form row-->


			<div class="fv-row row ">
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label fw-bolder text-dark ">Nama Kecamatan</label>
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec">
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
						<label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
						<select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa">
						</select>
					</div>
					<!--end::Form Group-->
				</div>
			</div>
			<br>
			<!--begin::Form row-->
			<div class="row mb-8">
				<label class="col-lg-3 col-form-label">Desa yang mengikuti</label>
				<div class="col-lg-9">
					<div class="spinner spinner-sm spinner-primary spinner-right hastag_peserta">
						<!-- <span class="badge badge-success fw-bold fs-9 px-2 ms-2 cursor-default ms-2" data-bs-toggle="tooltip" title="" >Exclusive <a href="#" ><i class="fa fa-close text-white"></i></a></span> -->
					</div>
				</div>
			</div>
			<!--end::Form row-->
			<!--begin::Form row-->
			<div class="fv-row mb-10">
				<a onclick="tambahPelatihan()" class="btn btn-icon btn-twitter btn-sm me-3">
					<i class="fas fa-plus"></i>
				</a>
			</div>
			<div class="border-top mt-5"></div><br>
			<!-- <div class="fv-row mb-12"> -->
			<div class="row mb-10 table-responsive">

			<table class="table table-row-dashed table-row-gray-300 gy-7" id="table-pelatihan">
				<thead>
					<tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
						<th>Jenis Pelatihan</th>
						<th>Nama Pelatihan</th>
						<th>Jumlah</th>
						<th>Peserta</th>
						<th>Desa yang Mengikuti</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			</div>
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