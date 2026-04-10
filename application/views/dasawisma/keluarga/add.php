<div class="card">
    <!--begin::Card Body-->
    <div class="card-body p-10 p-lg-15 p-xxl-30">
            <!--begin::Content-->
            <div class="d-flex flex-row-fluid justify-content-center">
                <!--begin::Form-->
                <form class="pt-10 w-100 w-md-400px w-xl-800px" data-toggle="validator" name="form_add" method="post"
                    action="" id="kt_stepper_form">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                            <div class="fv-row row mt-5">
                                <div class="col-lg-12 col-md-12 mb-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
                                        <select class="form-select form-select-lg "
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
                                                    if($this->session->userdata('role_id') == 8){
                                                        echo '<option value="keluarga">Keluarga</option>';
                                                    }else{
                                                        echo '<option value="dasawisma">Dasawisma</option>';
                                                        echo '<option value="rt">RT</option>';
                                                    }
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
                                        <label class="fs-6 form-label fw-bolder text-dark required">Nama
                                            Kecamatan</label>
                                        <select class="form-select form-select-lg "
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique
                                            required>

//                                            <option value="">--Pilih Kecamatan--</option>
                                            <!-- <option></option> -->
                                            <?php
                                                             if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
                                                                 foreach ($kecamatan as $nama) {
echo "<option value=''>--Pilih Kecamatan--</option>";
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
                                            name="kd_desa" id="kd_desa" required>
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
                                            name="dusun" id="dusun" required>
                                            <option value="<?=!empty($dusun)?$dusun->id:''?>"><?=!empty($dusun)?$dusun->dusun:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <!--end::Form Group-->
                                    <div id="div-rw">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama RW</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih RW"
                                            name="rw" id="rw" required>
                                            <option value="<?=!empty($rw)?$rw->rw:''?>"><?=!empty($rw)?$rw->rw:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <!--end::Form Group-->
                                    <div id="div-rt">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama RT</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih RT"
                                            name="rt" id="rt" required>
                                            <option value="<?=!empty($rt)?$rt->rt:''?>"><?=!empty($rt)?$rt->rt:''?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>

                                <div class="col-lg-12 col-md-12 mt-5">
                                    <!--end::Form Group-->
                                    <div id="div-dasawisma">
                                        <label class="fs-6 form-label fw-bolder text-dark">Dasawisma</label>
                                        <select class="form-select form-select-lg "
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Dasawisma" name="dasawisma" id="dasawisma">
                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KK</label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="jumlah_kk"
                                            id="jumlah_kk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="jumlah_PUS"
                                            id="jumlah_PUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="jumlah_WUS"
                                            id="jumlah_WUS" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="total_laki"
                                            id="total_laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg "
                                            name="total_perempuan" id="total_perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="balita_laki"
                                            id="balita_laki" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg "
                                            name="balita_perempuan" id="balita_perempuan" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Anggota 3 Buta</label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="jumlah_buta"
                                            id="jumlah_buta" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg "
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg "
                                            name="jumlah_menyusui" id="jumlah_menyusui" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Lansia
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg " name="jumlah_lansia"
                                            id="jumlah_lansia" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Berkebutuhan Khusus
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg "
                                            name="berkebutuhan_khusus" id="berkebutuhan_khusus" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <?php 
                                $this->load->view('dasawisma/keluarga/_form');
                            ?>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Keterangan</label>
                                        <textarea class="form-control form-control-lg " name="ket"
                                            id="ket"></textarea>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <i class="text-danger">Jika terdapat data kosong atau tidak diketahui maka isi data dengan angka <b>0</b>, jangan mengosongkan data hal ini akan berpengaruh data tidak dapat disimpan</i>

                        </div>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between pt-10">
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
                            
                        </div>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
    </div>
    <!--end::Card Body-->
</div>
