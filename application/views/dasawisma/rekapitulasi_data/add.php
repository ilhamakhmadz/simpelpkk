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
									<div id="div-rt">
										<label class="fs-6 form-label fw-bolder text-dark">RT</label>
										<input class="form-control form-control-lg form-control-solid" type="number" 
                                        placeholder="007" id="rt" name="rt" >
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Ibu</label>
                                        <input required type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="nama_ibu" id="nama_ibu" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Suami
                                        </label>
                                        <input required type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="nama_suami" id="nama_suami" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Status
                                        </label>
                                        <select required name="status" id="status" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="Hamil">Hamil</option>
                                            <option value="Melahirkan">Melahirkan</option>
                                            <option value="Nifas">Nifas</option>
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Bayi
                                        </label>
                                        <input type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="nama_bayi" id="nama_bayi" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                        </label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir</label>
                                        <input type="date" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="tanggal_lahir" id="tanggal_lahir" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Akte Kelahiran
                                        </label>
                                        <select name="akte_kelahiran" id="akte_kelahiran" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Ada</option>
                                            <option value="2">Tidak Ada</option>
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Ibu/Bayi/Balita</label>
                                        <input type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="nama_meninggal" id="nama_meninggal" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin Meninggal
                                        </label>
                                        <select name="jenis_kelamin_meninggal" id="jenis_kelamin_meninggal" class="form-select form-select-lg form-select-solid" data-placeholder="Pilih">
                                            <option value="">Pilih</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Tanggal Meninggal
                                        </label>
                                        <input type="date" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="tanggal_meninggal" id="tanggal_meninggal" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>  
                            <br>
                            
                            <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sebab</label>
                                        <textarea class="form-control form-control-lg form-control-solid" name="sebab"
                                            id="sebab"></textarea>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Keterangan</label>
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
