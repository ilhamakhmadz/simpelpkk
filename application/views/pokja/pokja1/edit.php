<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        <div class="card-body mw-800px py-20">
			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12 mb-5">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
						<select class="form-select form-select-lg form-select-solid"
							data-control="select2" data-placeholder="Pilih Level" name="level"
							id="level" disabled>
							<option value="<?=$pokja1->level?>"><?=$pokja1->level?></option>
							<?php
								if ($this->session->userdata('level_id') == 3) {
									echo '<option value="kecamatan">Kecamatan</option>';
									echo '<option value="desa">Desa</option>';
									echo '<option value="dusun">Dusun</option>';
									echo '<option value="rw">RW</option>';
									echo '<option value="rt">RT</option>';
								} elseif ($this->session->userdata('level_id') == 4) {
									echo '<option value="desa">Desa</option>';
									echo '<option value="dusun">Dusun</option>';
									echo '<option value="rw">RW</option>';
									echo '<option value="rt">RT</option>';
								}elseif ($this->session->userdata('level_id') == 5) {
									echo '<option value="dusun">Dusun</option>';
									echo '<option value="rw">RW</option>';
									echo '<option value="rt">RT</option>';
								}elseif ($this->session->userdata('level_id') == 6) {
									echo '<option value="rw">RW</option>';
									echo '<option value="rt">RT</option>';
								}elseif ($this->session->userdata('level_id') == 7) {
									echo '<option value="rt">RT</option>';
								} elseif ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
									echo '<option value=""></option>';
									echo '<option value="kecamatan">Kecamatan</option>';
									echo '<option value="desa">Desa</option>';
									echo '<option value="dusun">Dusun</option>';
									echo '<option value="rw">RW</option>';
									echo '<option value="rt">RT</option>';
								}
							?>
						</select>
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4">
					<!--end::Form Group-->
					<div id="div-kec">
						<label class="fs-6 form-label fw-bolder text-dark">Nama Kecamatan</label>
						<select class="form-select form-select-lg form-select-solid"
							data-control="select2" data-control="select2"
							data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" disabled>
							<option value="<?=$pokja1->Kd_Kec?>"><?=$pokja1->Nama_Kecamatan?></option>
							<?php
							foreach ($kecamatan as $nama) {
								echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
							}
							?>
						</select>
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mb-5">
					<!--end::Form Group-->
					<div id="div-desa">
						<label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
						<input class="form-select form-select-lg form-select-solid" value="<?=$pokja1->kode_desa?>" disabled name="kd_desa" id="kd_desa">
					</div>
					<!--end::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4">
					<!--end::Form Group-->
					<div id="div-dusun">
						<label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
						<input class="form-select form-select-lg form-select-solid" value="<?=$pokja1->dusun?>" disabled name="kd_dusun" id="kd_dusun">
					</div>
					<!--end::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div id="div-rw">
						<label class="fs-6 form-label fw-bolder text-dark">Nama RW</label>
						<input class="form-select form-select-lg form-select-solid" value="<?=$pokja1->rw?>" disabled name="kd_rw" id="kd_rw">
					</div>
					<!--end::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6">
					<!--end::Form Group-->
					<div id="div-rt">
						<label class="fs-6 form-label fw-bolder text-dark">Nama RT</label>
						<input class="form-select form-select-lg form-select-solid" value="<?=$pokja1->rt?>" disabled name="kd_rt" id="kd_rt">
					</div>
					<!--end::Form Group-->
				</div>
			</div>
			<div class="fv-row row md-8">
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Kader PKBN</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kader_pkbn" name="kader_pkbn"  value="<?=$pokja1->kader_pkbn?>">
						<input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="Dusun I" id="id" name="id" value="<?=$pokja1->id?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Kader PKDRT</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kader_pkdrt" name="kader_pkdrt"  value="<?=$pokja1->kader_pkdrt?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Kader Pola Asuh</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kader_polaasuh" name="kader_polaasuh"  value="<?=$pokja1->kader_polaasuh?>">
					</div>
					<!--end::Form Group-->
				</div>
			</div>
			<div class="fv-row row md-8">
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Kel. Simulasi PKBN</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="pkbn_klpsimulasi" name="pkbn_klpsimulasi"  value="<?=$pokja1->pkbn_klpsimulasi?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Anggota PKBN</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="pkbn_angg" name="pkbn_angg"  value="<?=$pokja1->pkbn_angg?>">
					</div>
					<!--begin::Form Group-->
				</div>
			</div>
			<div class="fv-row row md-8">
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Kel. Simulasi PKDRT</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="pkdrt_klpsimulasi" name="pkdrt_klpsimulasi"  value="<?=$pokja1->pkdrt_klpsimulasi?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Anggota PKDRT</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="pkdrt_angg" name="pkdrt_angg"  value="<?=$pokja1->pkdrt_angg?>">
					</div>
					<!--begin::Form Group-->
				</div>
			</div>
			<div class="fv-row row md-8">
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Kelompok Pola Asuh</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="polaasuh_klp" name="polaasuh_klp"  value="<?=$pokja1->polaasuh_klp?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Anggota Pola Asuh</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="polaasuh_anggota" name="polaasuh_anggota"  value="<?=$pokja1->polaasuh_anggota?>">
					</div>
					<!--begin::Form Group-->
				</div>
			</div>
			<div class="fv-row row md-8">
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Kelompok Lansia</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="lansia_klp" name="lansia_klp"  value="<?=$pokja1->lansia_klp?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-6 col-md-6 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jumlah Anggota Lansia</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="lansia_angg" name="lansia_angg"  value="<?=$pokja1->lansia_angg?>">
					</div>
					<!--begin::Form Group-->
				</div>
			</div>
			<div class="col-lg-6 col-md-6 mt-8">
				<label class="fs-6 form-label fw-bolder">Kelompok Gotong Royong</label>
			</div>

			<div class="fv-row row md-8">
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Kerja Bakti</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kelompok_kerjabakti" name="kelompok_kerjabakti"  value="<?=$pokja1->kelompok_kerjabakti?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Rukun Kematian</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kelompok_kematian" name="kelompok_kematian"  value="<?=$pokja1->kelompok_kematian?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Keagamaan</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kelompok_keagamaan" name="kelompok_keagamaan"  value="<?=$pokja1->kelompok_keagamaan?>">
					</div>
					<!--end::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Jimpitan</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kelompok_jimpitan" name="kelompok_jimpitan"  value="<?=$pokja1->kelompok_jimpitan?>">
					</div>
					<!--begin::Form Group-->
				</div>
				<div class="col-lg-4 col-md-4 mt-6">
					<!--end::Form Group-->
					<div>
						<label class="fs-6 form-label required">Arisan</label>
						<input class="form-control form-control-lg form-control-solid required" type="number" id="kelompok_arisan" name="kelompok_arisan"  value="<?=$pokja1->kelompok_arisan?>">
					</div>
					<!--end::Form Group-->
				</div>
			</div>

			<!-- ===================== PROGRAM POKJA I SESUAI FORMAT PANDUAN ===================== -->
			<div class="col-lg-12 col-md-12 mt-8 mb-2">
				<div class="alert alert-secondary d-flex align-items-center p-3 mb-0">
					<div>
						<h5 class="mb-0 text-dark fw-bolder">Data Kegiatan Program POKJA I</h5>
						<span class="fs-7 text-muted">Penghayatan dan Pengamalan Pancasila dan Gotong Royong</span>
					</div>
				</div>
			</div>

			<?php
			$programs = [
				'kisah'  => 'KISAH (Penghayatan & Pengamalan Pancasila)',
				'krisan' => 'KRISAN (Kreasi Seni & Budaya)',
				'kijat'  => 'KIJAT (Kemitraan Jaringan Teknologi)',
				'kuat'   => 'KUAT (Kader Upaya Kemampuan)',
				'kisak'  => 'KISAK (Kemitraan Sosial Keagamaan)',
				'pkbn'   => 'PKBN (Pendidikan Pendahuluan Bela Negara)',
			];
			foreach ($programs as $kode => $label): 
				$f_kegiatan = $kode . '_kegiatan';
				$f_vol_keg = $kode . '_vol_keg';
				$f_metode = $kode . '_metode';
				$f_jml_sasaran = $kode . '_jml_sasaran';
			?>
			<div class="fv-row row mb-3">
				<div class="col-12 mt-4">
					<div class="p-2 rounded" style="background:#f1f3f8;border-left:4px solid #009ef7;">
						<label class="fs-7 fw-bolder text-dark mb-0"><?= $label ?></label>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 mt-2">
					<label class="fs-7 fw-bold">Kegiatan</label>
					<input class="form-control form-control-sm form-control-solid" type="number"
						value="<?= isset($pokja1->$f_kegiatan) ? $pokja1->$f_kegiatan : 0 ?>"
						id="<?= $kode ?>_kegiatan" name="<?= $kode ?>_kegiatan" min="0">
				</div>
				<div class="col-lg-3 col-md-3 mt-2">
					<label class="fs-7 fw-bold">Vol. Keg</label>
					<input class="form-control form-control-sm form-control-solid" type="number"
						value="<?= isset($pokja1->$f_vol_keg) ? $pokja1->$f_vol_keg : 0 ?>"
						id="<?= $kode ?>_vol_keg" name="<?= $kode ?>_vol_keg" min="0">
				</div>
				<div class="col-lg-3 col-md-3 mt-2">
					<label class="fs-7 fw-bold">Metode</label>
					<input class="form-control form-control-sm form-control-solid" type="text"
						value="<?= isset($pokja1->$f_metode) ? htmlspecialchars($pokja1->$f_metode) : '' ?>"
						id="<?= $kode ?>_metode" name="<?= $kode ?>_metode" placeholder="Ceramah / Simulasi / dll">
				</div>
				<div class="col-lg-3 col-md-3 mt-2">
					<label class="fs-7 fw-bold">Jml. Sasaran</label>
					<input class="form-control form-control-sm form-control-solid" type="number"
						value="<?= isset($pokja1->$f_jml_sasaran) ? $pokja1->$f_jml_sasaran : 0 ?>"
						id="<?= $kode ?>_jml_sasaran" name="<?= $kode ?>_jml_sasaran" min="0">
				</div>
			</div>
			<?php endforeach; ?>
			<!-- =================== AKHIR PROGRAM POKJA I =================== -->

			<div class="fv-row row ">
				<div class="col-lg-12 col-md-12">
					<!--end::Form Group-->
					<div class="">
						<label class="fs-6 form-label mt-6">Keterangan</label>
						<textarea class="form-control form-control-lg form-control-solid"
							name="keterangan" id="keterangan"><?=$pokja1->keterangan?></textarea>
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