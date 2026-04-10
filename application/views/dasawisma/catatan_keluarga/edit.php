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
                        <h3 class="stepper-title">keluarga PKK</h3>
                        <!-- <div class="stepper-desc">Isi data berkaitan keluarga desa</div> -->
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
                <form class="pt-10 w-100 w-md-400px w-xl-800px" data-toggle="validator" name="kt_stepper_form_edit" method="post"
                    action="" id="kt_stepper_form_edit">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                            <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12 mb-10">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih Level" name="level"
                                            id="level" disabled>
                                            <option value="<?=$catatan_keluarga->level?>"><?=$catatan_keluarga->level?></option>
                                            <option value="kecamatan">Kecamatan</option>
                                            <option value="desa">Desa</option>
                                            <option value="dusun">Dusun</option>
                                            <option value="rt">RT</option>
                                            <option value="rw">RW</option>

                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="div-kec">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kecamatan</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" disabled>
                                            <option value="<?=$catatan_keluarga->kecamatan?>"><?=$catatan_keluarga->Nama_Kecamatan?></option>
                                            <?php
                                            foreach ($kecamatan as $nama) {
                                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="div-desa">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih Desa"
                                            name="kd_desa" id="kd_desa" disabled>
                                            <?php
                                                if (!empty($catatan_keluarga->desa)) {
                                                    echo '<option value="'.$catatan_keluarga->desa.'">'.$catatan_keluarga->Nama_Desa.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4 ">
									<!--end::Form Group-->
									<div id="div-dusun">
										<label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
                                            <?php
                                                if (!empty($catatan_keluarga->dusun)) {
                                                    echo '<input disabled class="form-control form-control-lg form-control-solid" type="text" placeholder="Dusun I" id="dusun" name="dusun" value="'.$catatan_keluarga->dusun.'">';
                                                }
                                            ?>
										</div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rt">
										<label class="fs-6 form-label fw-bolder text-dark">RT</label>
										<input class="form-control form-control-lg form-control-solid" type="number" placeholder="007" id="rt" name="rt" value="<?=$catatan_keluarga->rt?>" disabled>
										<input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="007" id="id_data_keluarga" name="id_data_keluarga" value="<?=$catatan_keluarga->id_data_keluarga?>" disabled>
                                    </div>
									<!--end::Form Group-->
								</div>
                                <div class="col-lg-6 col-md-6 mt-6">
									<!--end::Form Group-->
									<div id="div-rw">
										<label class="fs-6 form-label fw-bolder text-dark">RW</label>
										<input class="form-control form-control-lg form-control-solid" type="number" placeholder="007" id="rw" name="rw" value="<?=$catatan_keluarga->rw?>" disabled>
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
                                            name="nama_kepala_keluarga" id="nama_kepala_keluarga" value="<?=$catatan_keluarga->nama_kepala_keluarga?>"/>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Dasawisma</label>
                                        <input type="text" placeholder="-" class="form-control form-control-lg form-control-solid"
                                            name="dasawisma" id="dasawisma" value="<?=$catatan_keluarga->dasawisma?>"/>
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
                                            name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga" value="<?=$catatan_keluarga->jumlah_anggota_keluarga?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Keluarga Laki-Laki
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_anggota_keluarga_laki" id="jumlah_anggota_keluarga_laki" value="<?=$catatan_keluarga->jumlah_anggota_keluarga_laki?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Keluarga Perempuan
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_anggota_keluarga_perempuan" id="jumlah_anggota_keluarga_perempuan" value="<?=$catatan_keluarga->jumlah_anggota_keluarga_perempuan?>"/>
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
                                            name="jumlah_kk" id="jumlah_kk" value="<?=$catatan_keluarga->jumlah_kk?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Balita
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_balita" id="jumlah_balita" value="<?=$catatan_keluarga->jumlah_balita?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_PUS" id="jumlah_PUS" value="<?=$catatan_keluarga->jumlah_PUS?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_WUS" id="jumlah_WUS" value="<?=$catatan_keluarga->jumlah_WUS?>"/>
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
                                            name="jumlah_buta" id="jumlah_buta" value="<?=$catatan_keluarga->jumlah_buta?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" value="<?=$catatan_keluarga->jumlah_ibu_hamil?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_menyusui" id="jumlah_menyusui" value="<?=$catatan_keluarga->jumlah_menyusui?>"/>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Lansia
                                        </label>
                                        <input type="number" placeholder="0" class="form-control form-control-lg form-control-solid"
                                            name="jumlah_lansia" id="jumlah_lansia" value="<?=$catatan_keluarga->jumlah_lansia?>"/>
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
                                            <option value="<?=$catatan_keluarga->makanan_pokok?>"><?=$catatan_keluarga->makanan_pokok?></option>
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
                                            <option value="<?=$catatan_keluarga->jamban_keluarga?>"><?=$catatan_keluarga->jamban_keluarga?></option>
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
                                            <option value="<?=$catatan_keluarga->sumber_air_keluarga?>"><?=$catatan_keluarga->sumber_air_keluarga?></option>
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
                                            <option value="<?=$catatan_keluarga->pembuangan_sampah?>"><?=$catatan_keluarga->pembuangan_sampah?></option>
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
                                            <option value="<?=$catatan_keluarga->saluran_air_limbah?>"><?=$catatan_keluarga->saluran_air_limbah?></option>
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
                                            <option value="<?=$catatan_keluarga->stiker_p4k?>"><?=$catatan_keluarga->stiker_p4k?></option>
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
                                            <option value="<?=$catatan_keluarga->kreteria_rumah?>"><?=$catatan_keluarga->kreteria_rumah?></option>
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
                                            <option value="<?=$catatan_keluarga->aktivitas_up2k?>"><?=$catatan_keluarga->aktivitas_up2k?></option>
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
                                            <option value="<?=$catatan_keluarga->aktivitas_kesehatan_lingkungan?>"><?=$catatan_keluarga->aktivitas_kesehatan_lingkungan?></option>
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
                            <div class="border-top mt-5"></div><br>
                            <!-- <div class="fv-row mb-12"> -->
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                Tambah Anggota Keluarga
                            </button>

                            <table class="table gs-7 gy-7 gx-7" id="table-prasarana">
                                <thead>
                                    <tr class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                        <th>No.Reg, Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat,Tgl Lahir</th>
                                        <th>Pendidikan,Pekerjaan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($anggota as $value): ?>
                                    <tr>
                                        <td class="text-end pt-10"><?=$value->no_reg.', '.$value->nama_anggota?></td>
                                        <td class="text-end pt-10"><?=$value->status_kawin?><br><?=$value->jenis_kelamin?></td>
                                        <td class="text-end pt-10">
                                            <?=$value->tempat_lahir?>,<?=date_format(date_create($value->tanggal_lahir), "d-m-Y")?>
                                        </td>
                                        <td class="text-end pt-10">
                                            <b><?=$value->pendidikan?></b><br><?=$value->pekerjaan?>
                                        </td>
                                        <td class="text-end pt-10">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#kt_edit_<?=$value->id_data_keluarga_anggota?>" class="btn btn-icon btn-light-facebook me-5 ">
                                                <span class="svg-icon svg-icon-success svg-icon-2hx">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                        <path
                                                            d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                            height="2" rx="1" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="#" onclick="deleteItemAnggota('<?=$value->id_data_keluarga_anggota?>')"
                                                class="btn btn-icon btn-light-google me-5 ">
                                                <span class="svg-icon svg-icon-danger svg-icon-2hx">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path
                                                                d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                     <!-- MODEL EDIT BEGIN -->
                                    <div class="modal fade" tabindex="-1" id="kt_edit_<?=$value->id_data_keluarga_anggota?>">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Anggota Keluarga</h3>
                                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <span class="svg-icon svg-icon-1"></span>
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                <div class="fv-row row ">
                                            <div class="col-lg-4 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">No Registrasi TP.PKK</label>
                                                    <input type="input" class="form-control form-control-lg form-control-solid"
                                                        name="editno_reg_tp_pkk<?=$value->id_data_keluarga_anggota?>" id="editno_reg_tp_pkk<?=$value->id_data_keluarga_anggota?>" value="<?=$value->no_reg?>"/>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-5 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Nama
                                                    </label>
                                                    <input type="input" class="form-control form-control-lg form-control-solid"
                                                        name="editnama<?=$value->id_data_keluarga_anggota?>" id="editnama<?=$value->id_data_keluarga_anggota?>" value="<?=$value->nama_anggota?>"/>
                                                    <input type="hidden" class="form-control form-control-lg form-control-solid"
                                                        name="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>" id="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>" value="<?=$value->id_data_keluarga_anggota?>"/>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                                    </label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>" id="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                        data-placeholder="Pilih Jenis Kelamin">
                                                        <option value="<?=$value->jenis_kelamin?>"><?=$value->jenis_kelamin?></option>
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
                                                        name="edittempat_lahir<?=$value->id_data_keluarga_anggota?>" id="edittempat_lahir<?=$value->id_data_keluarga_anggota?>" value="<?=$value->tempat_lahir?>"/>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                                                    </label>
                                                    <input type="date" class="form-control form-control-lg form-control-solid"
                                                        name="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>" id="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>" value="<?=$value->tanggal_lahir?>"/>
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
                                                    <select class="form-control form-control-lg form-control-solid" name="editstatus<?=$value->id_data_keluarga_anggota?>"
                                                        id="editstatus<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                        data-placeholder="Pilih Status Keluarga">
                                                        <option value="<?=$value->status_dalam_keluarga?>"><?=$value->status_dalam_keluarga?></option>
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
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Status Perkawinan</label>
                                                        <select class="form-control form-control-lg form-control-solid" name="editstatus_kawin<?=$value->id_data_keluarga_anggota?>"
                                                            id="editstatus_kawin<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                            data-placeholder="Pilih Status Keluarga">
                                                            <option value="<?=$value->status_kawin?>"><?=$value->status_kawin?></option>
                                                            <option value="Belum Kawin">Belum Kawin</option>
                                                            <option value="Kawin">Kawin</option>
                                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                                            <option value="Cerai Mati">Cerai Mati</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                            </div>
                                                <!--end::Form Group-->
                                        </div>
                                        <br>
                                        <div class="fv-row row ">
                                            <div class="col-lg-6 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Pendidikan
                                                    </label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editpendidikan<?=$value->id_data_keluarga_anggota?>" id="editpendidikan<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                        data-placeholder="Pilih Pendidikan Terakhir">
                                                        <option value="<?=$value->pendidikan?>"><?=$value->pendidikan?></option>
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
                                                    <select class="form-control form-control-lg form-control-solid" name="editpekerjaan<?=$value->id_data_keluarga_anggota?>"
                                                        id="editpekerjaan<?=$value->id_data_keluarga_anggota?>" data-control="select2" data-placeholder="Pilih Pekerjaan">
                                                        <option value="<?=$value->pekerjaan?>"><?=$value->pekerjaan?></option>
                                                        <?php
                                                        foreach ($pekerjaan as $pek) {
                                                            echo "<option value='" . $pek->nama . "'>" . $pek->nama . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                        </div>
                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <a onclick="editAnggota('<?=$value->id_data_keluarga_anggota?>')" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
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
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Anggota Keluarga</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                            <div class="fv-row row ">
                                <div class="col-lg-4 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">No Registrasi</label>
                                        <input type="input" class="form-control form-control-lg form-control-solid"
                                            name="addno_reg_tp_pkk" id="addno_reg_tp_pkk" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama
                                        </label>
                                        <input type="input" class="form-control form-control-lg form-control-solid"
                                            name="addnama" id="addnama" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                        </label>
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="addjenis_kelamin" id="addjenis_kelamin" data-control="select2"
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
                                            name="addtempat_lahir" id="addtempat_lahir" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                                        </label>
                                        <input type="date" class="form-control form-control-lg form-control-solid"
                                            name="addtanggal_lahir" id="addtanggal_lahir" />
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
                                        <label class="fs-6 form-label fw-bolder text-dark">Status</label>
                                        <select class="form-control form-control-lg form-control-solid" name="addstatus"
                                            id="addstatus" data-control="select2"
                                            data-placeholder="Pilih Status Perkawinan">
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
                                        <select class="form-control form-control-lg form-control-solid" name="addstatus_kawin"
                                            id="addstatus_kawin" data-control="select2"
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
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pendidikan
                                        </label>
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="addpendidikan" id="addpendidikan" data-control="select2"
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
                                        <select class="form-control form-control-lg form-control-solid" name="addpekerjaan"
                                            id="addpekerjaan" data-control="select2" data-placeholder="Pilih Pekerjaan">
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
                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <a onclick="addAnggota()" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>
