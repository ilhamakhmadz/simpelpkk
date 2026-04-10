<div class="card">
    <!--begin::Card Body-->
    <div class="card-body p-10 p-lg-15 p-xxl-30">
        <!--begin::Stepper 1-->
            <div class="d-flex flex-row-fluid justify-content-center">
                <!--begin::Form-->
                <form class="pt-10 w-100 w-md-400px w-xl-800px" name="form_add" method="post"
                    action="" id="kt_stepper_form">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                            <div class="fv-row row mt-5">
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
                                                    echo '<option value="dasawisma">Dasawisma</option>';
                                                } elseif ($this->session->userdata('level_id') == 4) {
                                                    echo '<option value="desa">Desa</option>';
                                                    echo '<option value="dusun">Dusun</option>';
                                                    echo '<option value="rw">RW</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="dasawisma">Dasawisma</option>';

                                                }elseif ($this->session->userdata('level_id') == 5) {
                                                    echo '<option value="dusun">Dusun</option>';
                                                    echo '<option value="rw">RW</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="dasawisma">Dasawisma</option>';

                                                }elseif ($this->session->userdata('level_id') == 6) {
                                                    echo '<option value="rw">RW</option>';
                                                    echo '<option value="rt">RT</option>';
                                                    echo '<option value="dasawisma">Dasawisma</option>';

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
                                                    echo '<option value="dasawisma">Dasawisma</option>';
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
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" unique
                                            required>
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
                                            name="kd_desa" id="kd_desa" required>
                                            <option value="<?=$desa->Kd_Desa?>"><?=$desa->Nama_Desa?></option>
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
                                            <option value="<?=$dusun->id?>"><?=$dusun->dusun?></option>
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
                                            <option value="<?=$rw->rw?>"><?=$rw->rw?></option>
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
                                            <option value="<?=$rt->rt?>"><?=$rt->rt?></option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>

                                <div class="col-lg-12 col-md-12 mt-5">
                                    <!--end::Form Group-->
                                    <div id="div-dasawisma">
                                        <label class="fs-6 form-label fw-bolder text-dark">Dasawisma</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Dasawisma" name="dasawisma" id="dasawisma" required>
                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div id="div-nama">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kepala Rumah Tangga</label>
                                        <input type="text" placeholder="-"
                                            class="form-control form-control-lg form-control-solid"
                                            name="nama_kepala_keluarga" id="nama_kepala_keluarga" required/>
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
                                            class="form-control form-control-lg form-control-solid" name="jumlah_kk"
                                            id="jumlah_kk" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid" name="jumlah_PUS"
                                            id="jumlah_PUS" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid" name="jumlah_WUS"
                                            id="jumlah_WUS" required/>
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
                                            class="form-control form-control-lg form-control-solid" name="total_laki"
                                            id="total_laki" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid"
                                            name="total_perempuan" id="total_perempuan" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid" name="balita_laki"
                                            id="balita_laki" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid"
                                            name="balita_perempuan" id="balita_perempuan" required/>
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
                                            class="form-control form-control-lg form-control-solid" name="jumlah_buta"
                                            id="jumlah_buta" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid"
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid"
                                            name="jumlah_menyusui" id="jumlah_menyusui" required/>
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
                                            class="form-control form-control-lg form-control-solid" name="jumlah_lansia"
                                            id="jumlah_lansia" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Berkebutuhan Khusus
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control-solid"
                                            name="berkebutuhan_khusus" id="berkebutuhan_khusus" required/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div id="mode_dasawisma">

                            <?php 
                                $this->load->view('dasawisma/keluarga/_form_rt');
                            ?>
                            </div>
                            <div class="fv-row row mt-5">
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
                            <i class="text-danger">Jika terdapat data kosong atau tidak diketahui maka isi data dengan angka <b>0</b>, jangan mengosongkan data hal ini akan berpengaruh data tidak dapat disimpan</i>
                        </div>
                    </div>
                    <!--end::Step 1-->
                   


                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between pt-10">
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder py-4 ps-8 btn-left me-3"
                                data-kt-stepper-action="submit">Simpan
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
