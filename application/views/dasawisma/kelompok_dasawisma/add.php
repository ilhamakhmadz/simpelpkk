<div class="card">
    <!--begin::Card Body-->
    <div class="card-body p-10 p-lg-15 p-xxl-30">
        <!--begin::Stepper 1-->
        <div class="stepper stepper-pills" id="kt_stepper">
            <!--begin::Content-->
            <div class="d-flex flex-row-fluid justify-content-center">
                <!--begin::Form-->
                <form class="pt-10 w-100 w-md-400px w-xl-800px" name="form_add" method="post"
                    action="" id="form_add">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                        <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12 mb-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
                                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Pilih Level" name="level"
                                            id="level">
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
                                <div class="fv-row row mb-5">
                                    <div class="col-lg-12 col-md-12">
                                        <!--end::Form Group-->
                                        <div class="">
                                            <label class="fs-6 form-label fw-bolder text-dark">Nama Kepala Keluarga</label>
                                            <select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Desa" name="nama_kepala_keluarga" id="nama_kepala_keluarga">
                                            <input type="hidden" class="form-select form-select-lg form-select-solid"  name="id_data_keluarga" id="id_data_keluarga">
                                        </select>
                                        </div>
                                        <!--begin::Form Group-->
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div id="div-kec">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kecamatan</label>
                                        <select class="form-select form-select-lg form-select-solid" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique required>
															<option></option>
															 <?php
                                                                if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
                                                                    foreach ($kecamatan as $nama) {
                                                                        echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                                                    }
                                                                } elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4) {
                                                                    echo "<option value='" . $kecamatan->Kd_Kec . "'>" . $kecamatan->Nama_Kecamatan . "</option>";
                                                                }
                                                            ?>
														</select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                
                                <div class="col-lg-4 col-md-4 ">
                                    <!--end::Form Group-->
                                    <div id="div-desa">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" data-placeholder="Pilih Desa" name="nama_desa" id="nama_desa">
                                        <input type="hidden" class="form-control form-control-lg form-control-solid" data-placeholder="Pilih Desa" name="kd_desa" id="kd_desa">
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4 ">
									<!--end::Form Group-->
									<div id="div-dusun">
										<label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
										<input class="form-control form-control-lg form-control-solid" type="text" 
                                        placeholder="Dusun I" id="dusun" name="dusun">
                                    </div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rw">
										<label class="fs-6 form-label fw-bolder text-dark">RW</label>
										<input class="form-control form-control-lg form-control-solid" type="number"
                                         placeholder="007" id="rw" name="rw">
                                    </div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rt">
										<label class="fs-6 form-label fw-bolder text-dark">RT</label>
										<input class="form-control form-control-lg form-control-solid" type="number" 
                                        placeholder="007" id="rt" name="rt" >
                                    </div>
									<!--end::Form Group-->
								</div>
                            </div>
                            <div class="fv-row row ">
                                    <div class="col-lg-12 col-md-12">
                                        <!--end::Form Group-->
                                        <div class="">
                                            <label class="fs-6 form-label fw-bolder text-dark">Dasawisma</label>
                                            <input type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                                name="dasawisma" id="dasawisma" />
                                        </div>
                                        <!--begin::Form Group-->
                                    </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KK</label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_kk" id="jumlah_kk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_PUS" id="jumlah_PUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_WUS" id="jumlah_WUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div> 
                            <div class="fv-row row ">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="total_laki" id="total_laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Perempuan
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="total_perempuan" id="total_perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="balita_laki" id="balita_laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Perempuan
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="balita_perempuan" id="balita_perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Anggota Buta</label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_buta" id="jumlah_buta" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_menyusui" id="jumlah_menyusui" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Lansia
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_lansia" id="jumlah_lansia" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Berkebutuhan Khusus
                                        </label>
                                        <input required type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="berkebutuhan_khusus" id="berkebutuhan_khusus" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Rumah Sehat</label>
                                        <select required name="rumah_sehat_layak_huni" id="rumah_sehat_layak_huni" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Rumah Tidak Sehat</label>
                                        <select required name="rumah_tidak_sehat_layak_huni" id="rumah_tidak_sehat_layak_huni" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Memiliki TPS</label>
                                        <select required name="rumah_memiliki_tps" id="rumah_memiliki_tps" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Memiliki SPAL</label>
                                        <select required name="rumah_memiliki_spal" id="rumah_memiliki_spal" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jamban Keluarga</label>
                                        <select required name="rumah_memiliki_jamban" id="rumah_memiliki_jamban" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Menempel Stiker P4K</label>
                                        <select required name="rumah_menempel_sp4k" id="rumah_menempel_sp4k" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">PDAM</label>
                                        <select required name="pdam" id="pdam" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sumur</label>
                                        <select required name="sumur" id="sumur" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sumber Lainnya</label>
                                        <select required name="sumber_air_lain" id="sumber_air_lain" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Beras</label>
                                        <select required name="beras" id="beras" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Non Beras</label>
                                        <select required name="non_beras" id="non_beras" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Aktifitas UP2K</label>
                                        <select required name="mengikuti_up2k" id="mengikuti_up2k" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pemanfaatan Tanah Pekarangan</label>
                                        <select required name="pemanfaatan_tanah" id="pemanfaatan_tanah" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Industri rumah tangga</label>
                                        <select required name="industri_rumah_tangga" id="industri_rumah_tangga" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Kerja Bhakti</label>
                                        <select required name="kerja_bhakti" id="kerja_bhakti" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                            <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Alamat</label>
                                        <textarea class="form-control form-control-lg form-control-solid" name="ket"
                                            id="ket"></textarea>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                        </div>
                        
                    <!--end::Actions-->
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Actions-->
                    <div>
                                <label class="col-lg-3 col-form-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Simpan 
                                        <span class="svg-icon svg-icon-4 ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5"
                                                        transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                        x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                    <path
                                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Stepper 1-->
    </div>
    <!--end::Card Body-->
</div>
