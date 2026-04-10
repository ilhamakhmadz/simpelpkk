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
                <!--begin::Step 2-->
                <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                    <!-- <div class="stepper-wrapper"> -->
                    <div class="stepper-line w-40px"></div>
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">2</span>
                    </div>
                    <div class="stepper-label">
                        <h3 class="stepper-title">Struktur Organisasi</h3>
                        <!-- <div class="stepper-desc">Isi data berkaitan jumlah penduduk</div> -->
                    </div>
                    <!-- </div> -->
                </div>
                <!--end::Step 2-->


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
                                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-control="select2" data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique required>
															 <?php
                                                             if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
                                                                 foreach ($kecamatan as $nama) {
                                                                     echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                                                 }
                                                             } elseif ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 4|| $this->session->userdata('level_id') == 5|| $this->session->userdata('level_id') == 6|| $this->session->userdata('level_id') == 7) {
                                                                 echo "<option value='" . $kecamatan->Kd_Kec . "'>" . $kecamatan->Nama_Kecamatan . "</option>";
                                                             }

                                            ?>
														</select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div id="div-desa">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih Desa"
                                            name="kd_desa" id="kd_desa">
                                            <option value="<?=!empty($desa)?$desa->Kd_Desa:''?>"><?=!empty($desa)?$desa->Nama_Desa:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div id="div-dusun">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih Dusun"
                                            name="kd_dusun" id="kd_dusun">
                                            <option value="<?=!empty($dusun)?$dusun->id:''?>"><?=!empty($dusun)?$dusun->dusun:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div id="div-rw">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama RW</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih RW"
                                            name="kd_rw" id="kd_rw">
                                            <option value="<?=!empty($rw)?$rw->rw:''?>"><?=!empty($rw)?$rw->rw:''?></option>

                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div id="div-rt">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama RT</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih RT"
                                            name="kd_rt" id="kd_rt">
                                            <option value="<?=!empty($rt)?$rt->rt:''?>"><?=!empty($rt)?$rt->rt:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">

                                <div class="col-lg-4 col-md-6">
                                    <!--end::Form Group-->
                                    <div id="div-formrw">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Kelompok RW</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kelompok_pkk_rw" id="jml_kelompok_pkk_rw" require <?=$this->session->userdata('level_id') == 7 ? 'value="0"' : '' ?> />
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Kelompok RT</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kelompok_pkk_rt" id="jml_kelompok_pkk_rt" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Kelompok
                                            Dasawisma</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kelompok_dasawisma" id="jml_kelompok_dasawisma" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KRT</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_krt" id="jml_krt" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KK
                                        </label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kk" id="jml_kk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Jiwa</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_laki" id="jml_laki" placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark"> &nbsp;
                                        </label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_perempuan" id="jml_perempuan" placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Anggota TP.PKK</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_anggota_tp_pkk_laki" id="jml_anggota_tp_pkk_laki"
                                            placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">&nbsp;</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_anggota_tp_pkk_perempuan" id="jml_anggota_tp_pkk_perempuan"
                                            placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Kader Umum</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kader_umum_laki" id="jml_kader_umum_laki"
                                            placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">&nbsp;</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kader_umum_perempuan" id="jml_kader_umum_perempuan"
                                            placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Kader Khusus</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kader_khusus_laki" id="jml_kader_khusus_laki"
                                            placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">&nbsp;</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_kader_khusus_perempuan" id="jml_kader_khusus_perempuan"
                                            placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Tenaga Sekertaris
                                            Honorer</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_tenaga_sek_honorer_laki" id="jml_tenaga_sek_honorer_laki"
                                            placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">&nbsp;</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_tenaga_sek_honorer_perempuan"
                                            id="jml_tenaga_sek_honorer_perempuan" placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Tenaga Sekertaris
                                            Bantuan</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_tenaga_sek_bantuan_laki" id="jml_tenaga_sek_bantuan_laki"
                                            placeholder="Laki-Laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">&nbsp;</label>
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                            name="jml_tenaga_sek_bantuan_perempuan"
                                            id="jml_tenaga_sek_bantuan_perempuan" placeholder="Perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <i class="text-danger">Jika terdapat data kosong atau tidak diketahui maka isi data dengan angka <b>0</b>, jangan mengosongkan data hal ini akan berpengaruh data tidak dapat disimpan</i>
                        </div>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div class="" data-kt-stepper-element="content">
                        <div class="w-100">
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Ketua PKK</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="kepala_desa" name="kepala_desa">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Wakil Ketua PKK</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="sekertariat_desa" name="sekertariat_desa">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Sekertaris</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="kaur_tu" name="kaur_tu">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Wakil Sekertaris</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="kaur_perencanaan" name="kaur_perencanaan">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Bendahara</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="kaur_keuangan" name="kaur_keuangan">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Wakil Bendahara</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="seksi_pemerintahan" name="seksi_pemerintahan">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Ketua Pokja I</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="seksi_kerjasama" name="seksi_kerjasama">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Ketua Pokja II</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="seksi_pelayanan" name="seksi_pelayanan">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Ketua Pokja III</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="staf_1" name="staf_1">
                                    </div>
                                </div>
                            </div>
                            <!--end::Form row-->
                            <!--begin::Form row-->
                            <div class="row mb-8">
                                <label class="col-lg-3 col-form-label required">Ketua Pokja IV</label>
                                <div class="col-lg-9">
                                    <div class="spinner spinner-sm spinner-primary spinner-right">
                                        <input class="form-control form-control-lg form-control-solid " type="text"
                                            value="" id="staf_2" name="staf_2">
                                    </div>
                                </div>
                            </div>
                            <i class="text-danger">Jika terdapat data kosong atau tidak diketahui maka isi data dengan tanda "<b>-</b>", jangan mengosongkan data hal ini akan berpengaruh data tidak dapat disimpan</i>
                        </div>
                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 3-->
                    
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
