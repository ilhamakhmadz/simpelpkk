<div class="card">
    <!--begin::Card Body-->
    <div class="card-body p-10 p-lg-15 p-xxl-30">
        <!--begin::Stepper 1-->
        <div class="stepper stepper-pills" id="kt_stepper">
            <!--begin::Aside-->
            <!-- <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px"> -->
            <!--begin::Nav-->
            <div class="stepper-nav flex-center flex-wrap mb-10">
                <!--begin::Step 1-->
                <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
                    <!-- <div class="stepper-wrapper"> -->
                    <div class="stepper-line w-40px"></div>

                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">1</span>
                    </div>
                    <div class="stepper-label">
                        <h3 class="stepper-title">Profil PKK</h3>
                        <!-- <div class="stepper-desc">Isi data berkaitan profil desa</div> -->
                    </div>
                    <!-- </div> -->
                </div>
                <!--end::Step 1-->
                <!--begin::Step 3-->
                <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                    <!-- <div class="stepper-wrapper"> -->
                    <div class="stepper-line w-40px"></div>
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">2</span>
                    </div>
                    <div class="stepper-label">
                        <h3 class="stepper-title">Anggota Keluarga</h3>
                        <!-- <div class="stepper-desc">Isi data prasarana kesehatan dan pendidikan</div> -->
                    </div>
                    <!-- </div> -->
                </div>
                <!--end::Step 3-->

            </div>
            <!--end::Nav-->
            <!-- </div> -->
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="d-flex flex-row-fluid justify-content-center">
                <!--begin::Form-->
                <form class="pt-10 w-100 w-md-400px w-xl-800px" data-toggle="validator" name="form_add" method="post"
                    action="" id="kt_stepper_form">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                        <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12 mb-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih Level" name="level"
                                            id="level">
                                            <?php
                                                if ($this->session->userdata('level_id') == 3) {
                                                    echo '<option value="kecamatan">Kecamatan</option>';
                                                    echo '<option value="desa">Desa</option>';
                                                    echo '<option value="dusun">Dusun</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="rw">RW</option>';
                                                } elseif ($this->session->userdata('level_id') == 4) {
                                                    echo '<option value="desa">Desa</option>';
                                                    echo '<option value="dusun">Dusun</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="rw">RW</option>';
                                                } elseif ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
                                                    echo '<option value=""></option>';
                                                    echo '<option value="kecamatan">Kecamatan</option>';
                                                    echo '<option value="desa">Desa</option>';
                                                    echo '<option value="dusun">Dusun</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="rw">RW</option>';
                                                }
                                            ?>
                                           
                                            

                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <!--end::Form Group-->
                                    <div id="div-kec">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kecamatan</label>
                                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique required>
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
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih Desa"
                                            name="kd_desa" id="kd_desa">
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4 ">
									<!--end::Form Group-->
									<div id="div-dusun">
										<label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Dusun I" id="dusun" name="dusun">
                                    </div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rt">
										<label class="fs-6 form-label fw-bolder text-dark">RT</label>
										<input class="form-control form-control-lg form-control-solid" type="number" placeholder="007" id="rt" name="rt" >
                                    </div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rw">
										<label class="fs-6 form-label fw-bolder text-dark">RW</label>
										<input class="form-control form-control-lg form-control-solid" type="number" placeholder="007" id="rw" name="rw">
                                    </div>
									<!--end::Form Group-->
								</div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kepala Keluarga</label>
                                        <input type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="nama_kepala_keluarga" id="nama_kepala_keluarga" />
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Keluarga</label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Keluarga Laki-Laki
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_anggota_keluarga_laki" id="jumlah_anggota_keluarga_laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Keluarga Perempuan
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_anggota_keluarga_perempuan" id="jumlah_anggota_keluarga_perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KK</label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_kk" id="jumlah_kk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Balita
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_balita" id="jumlah_balita" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_PUS" id="jumlah_PUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_WUS" id="jumlah_WUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Anggota Buta</label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_buta" id="jumlah_buta" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_menyusui" id="jumlah_menyusui" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Lansia
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_lansia" id="jumlah_lansia" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Makanan Pokok</label>
                                        <select name="makanan_pokok" id="makanan_pokok" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Beras">Beras</option>
                                            <option value="Non Beras">Non Beras</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jamban Keluarga</label>
                                        <select name="jamban_keluarga" id="jamban_keluarga" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sumber Air</label>
                                        <select name="sumber_air_keluarga" id="sumber_air_keluarga" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="PDAM">PDAM</option>
                                            <option value="Sumur">Sumur</option>
                                            <option value="Sungai">Sungai</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pembuangan Sampah</label>
                                        <select name="pembuangan_sampah" id="pembuangan_sampah" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Saluran Air Limbah</label>
                                        <select name="saluran_air_limbah" id="saluran_air_limbah" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Menempel Stiker P4K</label>
                                        <select name="stiker_p4k" id="stiker_p4k" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Kreteria Rumah</label>
                                        <select name="kreteria_rumah" id="kreteria_rumah" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Sehat">Sehat</option>
                                            <option value="Kurang Sehat">Kurang Sehat</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>                                  
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Aktifitas UP2K</label>
                                        <select name="aktivitas_up2k" id="aktivitas_up2k" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Aktifitas Kegiatan Usaha Lingkungan</label>
                                        <select name="aktivitas_kesehatan_lingkungan" id="aktivitas_kesehatan_lingkungan" class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>   
                        </div>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 3-->
                    <div class="" data-kt-stepper-element="content">
                        <div class="w-100">
                            <!--begin::Form Group-->
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">No Registrasi TP.PKK</label>
                                        <input type="input" class="form-control form-control-lg form-control-solid"
                                            name="no_reg_tp_pkk" id="no_reg_tp_pkk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama
                                        </label>
                                        <input type="input" class="form-control form-control-lg form-control-solid"
                                            name="nama" id="nama" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                        </label>
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="jenis_kelamin" id="jenis_kelamin" data-control="select2"
                                            data-placeholder="Pilih Jenis Kelamin">
                                            <option></option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Tempat Lahir</label>
                                        <input type="input" class="form-control form-control-lg form-control-solid"
                                            name="tempat_lahir" id="tempat_lahir" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                                        </label>
                                        <input type="date" class="form-control form-control-lg form-control-solid"
                                            name="tanggal_lahir" id="tanggal_lahir" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Status dalam keluarga</label>
                                        <select class="form-control form-control-lg form-control-solid" name="status"
                                            id="status" data-control="select2"
                                            data-placeholder="Pilih Status Keluarga">
                                            <option></option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Cucu">Cucu</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Mertua">Mertua</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Famili">Famili</option>
                                            <option value="Menantu">Menantu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Status Perkawinan</label>
                                        <select class="form-control form-control-lg form-control-solid" name="status_kawin"
                                            id="status_kawin" data-control="select2"
                                            data-placeholder="Pilih Status Keluarga">
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <!--end::Form Group-->
                            <!--begin::Form Group-->
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pendidikan
                                        </label>
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="pendidikan" id="pendidikan" data-control="select2"
                                            data-placeholder="Pilih Pendidikan Terakhir">
                                            <option></option>
                                            <option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK TK/KELOMPOK
                                                BERMAIN</option>
                                            <option value="TK/KELOMPOK BERMAIN">TK/KELOMPOK BERMAIN
                                            </option>
                                            <option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH</option>
                                            <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                            <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
                                            <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                            <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                            <option value="D-1/SEDERAJAT">D-1/SEDERAJAT</option>
                                            <option value="D-2/SEDERAJAT">D-2/SEDERAJAT</option>
                                            <option value="D-3/SEDERAJAT">D-3/SEDERAJAT</option>
                                            <option value="S-1/SEDERAJAT">S-1/SEDERAJAT</option>
                                            <option value="S-2/SEDERAJAT">S-2/SEDERAJAT</option>
                                            <option value="S-3/SEDERAJAT">S-3/SEDERAJAT</option>
                                            <option value="SLB A/SEDERAJAT">SLB A/SEDERAJAT</option>
                                            <option value="SLB B/SEDERAJAT">SLB B/SEDERAJAT</option>
                                            <option value="SLB C/SEDERAJAT">SLB C/SEDERAJAT</option>
                                            <option value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">TIDAK DAPAT
                                                MEMBACA DAN MENULIS HURUF LATIN/ARAB</option>
                                            <option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>


                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pekerjaan
                                        </label>
                                        <select class="form-control form-control-lg form-control-solid" name="pekerjaan"
                                            id="pekerjaan" data-control="select2" data-placeholder="Pilih Pekerjaan">
                                            <option></option>
                                            <?php
                                            foreach ($pekerjaan as $value) {
                                                echo "<option value='" . $value->nama . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <!--end::Form Group-->
                            <br>
                            <!--end::Form Group-->
                            <div class="fv-row mb-10">
                                <a onclick="tambahPrasarana()" class="btn btn-icon btn-twitter btn-sm me-3">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <div class="border-top mt-5"></div><br>
                            <!-- <div class="fv-row mb-12"> -->
                            <table class="table gs-7 gy-7 gx-7" id="table-prasarana">
                                <thead>
                                    <tr class="fw-bolder fs-6 text-gray-800">
                                        <th>No.Reg, Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat,Tgl Lahir</th>
                                        <th>Pendidikan,Pekerjaan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!--end::Step 3-->


                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between pt-10">
                        <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary fw-bolder py-4 pe-8 me-3"
                                data-kt-stepper-action="previous">
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)"
                                                x="14" y="7" width="2" height="10" rx="1" />
                                            <path
                                                d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Previous
                            </button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder py-4 ps-8 me-3"
                                data-kt-stepper-action="submit">Simpan
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
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
                                <!--end::Svg Icon-->
                            </button>
                            <button type="button" class="btn btn-lg btn-primary fw-bolder py-4 ps-8 me-3"
                                data-kt-stepper-action="next">Next Step
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                <span class="svg-icon svg-icon-4 ms-1">
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
                                <!--end::Svg Icon-->
                            </button>
                        </div>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Stepper 1-->
    </div>
    <!--end::Card Body-->
</div>
