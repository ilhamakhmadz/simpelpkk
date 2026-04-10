<div class="card card-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark fs-3"></span>
        </h3>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-2 pb-0 mt-n3">
        <div class="tab-content mt-5" id="myTabTables1">
            <!--begin::Table-->
            <div class="table-responsive">
                <table id="dataTable_anggota" class="table table-striped table-row-bordered gy-5 gs-7">
                    <thead>
                        <tr class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                            <th>Dibuat</th>
                            <th>NIK, Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat,Tgl Lahir</th>
                            <th>Pendidikan,Pekerjaan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anggota as $value): ?>
                        <tr>
                            <td class="text-end pt-10"><?=date("d-m-Y H:i:s", strtotime($value->created_date))?></td>
                            <td class="text-end pt-10"><?=$value->nik.', '.$value->nama_anggota?></td>
                            <td class="text-end pt-10"><?=$value->status_kawin?><br><?=$value->jenis_kelamin?></td>
                            <td class="text-end pt-10">
                                <?=$value->tempat_lahir?>,<?=date_format(date_create($value->tanggal_lahir), "d-m-Y")?>
                            </td>
                            <td class="text-end pt-10">
                                <b><?=$value->pendidikan?></b><br><?=$value->pekerjaan?>
                            </td>
                            <?php if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8):?>
                            <td class="text-end pt-10">
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#kt_view_<?=$value->id_data_keluarga_anggota?>"
                                    class="btn btn-icon btn-light-facebook me-5 ">
                                    <span class="svg-icon svg-icon-success svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                rx="1" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="#" onclick="deleteItemAnggota('<?=$value->id_data_keluarga_anggota?>')"
                                    class="btn btn-icon btn-light-google me-5 ">
                                    <span class="svg-icon svg-icon-danger svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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
                            <?php else: ?>
                            <td class="text-end pt-10">
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#kt_view_<?=$value->id_data_keluarga_anggota?>"
                                    class="btn btn-icon btn-light-facebook me-5 ">
                                    <span class="svg-icon svg-icon-success svg-icon-2hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                                        <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A2 2 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0"/>
                                    </svg>
                                    </span>
                                </a>
                            </td>

                            <?php endif; ?>
                        </tr>
                        <!-- MODEL view BEGIN -->
                        <div class="modal fade" tabindex="-1" id="kt_view_<?=$value->id_data_keluarga_anggota?>">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><?=($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8) ? 'Edit ' : 'View '?> Anggota Keluarga</h3>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <span class="svg-icon svg-icon-1"></span>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="fv-row row mb-5">
                                            <div class="col-lg-6 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">NIK</label>
                                                    <input type="input"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="editnik<?=$value->id_data_keluarga_anggota?>"
                                                        id="editnik<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->nik?>" />
                                                    <input type="hidden"
                                                        id="id_data_keluarga<?=$value->id_data_keluarga_anggota?>"
                                                        name="id_data_keluarga<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->id_data_keluarga?>">
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">No KK
                                                    </label>
                                                    <input type="input"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="editkk<?=$value->id_data_keluarga_anggota?>"
                                                        id="editkk<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->kk?>" />
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                        </div>
                                        <div class="fv-row row ">
                                            <div class="col-lg-4 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Nama
                                                    </label>
                                                    <input type="input"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="editnama<?=$value->id_data_keluarga_anggota?>"
                                                        id="editnama<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->nama_anggota?>" />
                                                    <input type="hidden"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>"
                                                        id="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->id_data_keluarga_anggota?>" />
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                                    </label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>"
                                                        id="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2" data-placeholder="Pilih Jenis Kelamin">
                                                        <option value="<?=$value->jenis_kelamin?>">
                                                            <?=$value->jenis_kelamin?></option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Agama
                                                    </label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editagama<?=$value->id_data_keluarga_anggota?>"
                                                        id="editagama<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2" data-placeholder="Pilih Agama">
                                                        <option value="<?=$value->agama?>"><?=$value->agama?></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Khonghucu">Khonghucu</option>
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
                                                    <label class="fs-6 form-label fw-bolder text-dark">Tempat
                                                        Lahir</label>
                                                    <input type="input"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="edittempat_lahir<?=$value->id_data_keluarga_anggota?>"
                                                        id="edittempat_lahir<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->tempat_lahir?>" />
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <!--end::Form Group-->
                                                <div class="">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                                                    </label>
                                                    <input type="date"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>"
                                                        id="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>"
                                                        value="<?=$value->tanggal_lahir?>" />
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
                                                    <label class="fs-6 form-label fw-bolder text-dark">Status dalam
                                                        keluarga</label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editstatus_dalam_keluarga<?=$value->id_data_keluarga_anggota?>"
                                                        id="editstatus_dalam_keluarga<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2" data-placeholder="Pilih Status Keluarga">
                                                        <option value="<?=$value->status_dalam_keluarga?>">
                                                            <?=$value->status_dalam_keluarga?></option>
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
                                                    <label class="fs-6 form-label fw-bolder text-dark">Status
                                                        Perkawinan</label>
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editstatus_kawin<?=$value->id_data_keluarga_anggota?>"
                                                        id="editstatus_kawin<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2" data-placeholder="Pilih Status Keluarga">
                                                        <option value="<?=$value->status_kawin?>">
                                                            <?=$value->status_kawin?></option>
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
                                                        name="editpendidikan<?=$value->id_data_keluarga_anggota?>"
                                                        id="editpendidikan<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2"
                                                        data-placeholder="Pilih Pendidikan Terakhir">
                                                        <option value="<?=$value->pendidikan?>"><?=$value->pendidikan?>
                                                        </option>
                                                        <option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK
                                                            TK/KELOMPOK
                                                            BERMAIN</option>
                                                        <option value="TK/KELOMPOK BERMAIN">TK/KELOMPOK BERMAIN
                                                        </option>
                                                        <option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH
                                                        </option>
                                                        <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                                        <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT
                                                            SD/SEDERAJAT</option>
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
                                                        <option
                                                            value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">
                                                            TIDAK DAPAT
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
                                                    <select class="form-control form-control-lg form-control-solid"
                                                        name="editpekerjaan<?=$value->id_data_keluarga_anggota?>"
                                                        id="editpekerjaan<?=$value->id_data_keluarga_anggota?>"
                                                        data-control="select2" data-placeholder="Pilih Pekerjaan">
                                                        <option value="<?=$value->pekerjaan?>"><?=$value->pekerjaan?>
                                                        </option>
                                                        <?php
                                                        foreach ($pekerjaan as $pek) {
                                                            echo "<option value='" . $pek->nama . "'>" . $pek->nama . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--end::Form Group-->
                                            </div>
                                            <div class="fv-row row ">
                                                <div class="col-lg-12 col-md-12 mt-5">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Kebutuhan
                                                            Khusus
                                                        </label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editcacat<?=$value->id_data_keluarga_anggota?>"
                                                            id="editcacat<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2"
                                                            data-placeholder="Pilih Kebutuhan Khusus">
                                                            <?php if($value->cacat == 0){ ?>
                                                            <option value="0">Tidak Berkebutuhan Khusus</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($kebutuhan_khusus as $keb) {
                                                                ?>
                                                                    <option <?= $value->cacat == $keb->id ? 'selected' : ''?> value='<?=$keb->id?>'><?=$keb->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                            </div>
                                            <!--end::Form Group-->
                                            <br>

                                            <div class="col-lg-6 col-md-6 mb-5 mt-8">
                                                <label class="fs-6 form-label fw-bolder"><b>Kegiatan PKK yang
                                                        diikuti</b></label>
                                            </div>
                                            <!--begin::Form Group-->
                                            <div class="fv-row row mb-5">
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Penghayatan
                                                            dan Pengamalan Pancasila</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editpancasila<?=$value->id_data_keluarga_anggota?>"
                                                            id="editpancasila<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->pancasila == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($pancasila as $panca) {
                                                            ?>
                                                                <option <?= $value->pancasila == $panca->id ? 'selected' : ''?> value='<?=$panca->id?>'><?=$panca->nama?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Gotong
                                                            Royong</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editgotong_royong<?=$value->id_data_keluarga_anggota?>"
                                                            id="editgotong_royong<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->gotong_royong == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                                foreach ($gotong_royong as $gotong) {
                                                            ?>
                                                                <option <?= $value->gotong_royong == $gotong->id ? 'selected' : ''?> value='<?=$gotong->id?>'><?=$gotong->nama?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                            </div>
                                            <!--begin::Form Group-->
                                            <div class="fv-row row mb-5">
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Pendidikan
                                                            dan ketrampilan</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editketrampilan<?=$value->id_data_keluarga_anggota?>"
                                                            id="editketrampilan<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->keterampilan == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($ketrampilan as $ketram) {
                                                                ?>
                                                                    <option <?= $value->keterampilan == $ketram->id ? 'selected' : ''?> value='<?=$ketram->id?>'><?=$ketram->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Pengembangan
                                                            Kehidupan Berkoperasi</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editkoperasi<?=$value->id_data_keluarga_anggota?>"
                                                            id="editkoperasi<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->koperasi == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($koperasi as $kop) {
                                                                ?>
                                                                    <option <?= $value->koperasi == $kop->id ? 'selected' : ''?> value='<?=$kop->id?>'><?=$kop->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                            </div>
                                            <!--begin::Form Group-->
                                            <div class="fv-row row mb-5">
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label
                                                            class="fs-6 form-label fw-bolder text-dark">Pangan</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editpangan<?=$value->id_data_keluarga_anggota?>"
                                                            id="editpangan<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->pangan == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($pangan as $pang) {
                                                                ?>
                                                                    <option <?= $value->pangan == $pang->id ? 'selected' : ''?> value='<?=$pang->id?>'><?=$pang->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label
                                                            class="fs-6 form-label fw-bolder text-dark">Sandang</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editsandang<?=$value->id_data_keluarga_anggota?>"
                                                            id="editsandang<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->sandang == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($sandang as $sand) {
                                                                ?>
                                                                    <option <?= $value->sandang == $sand->id ? 'selected' : ''?> value='<?=$sand->id?>'><?=$sand->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                            </div>
                                            <!--begin::Form Group-->
                                            <div class="fv-row row mb-5">
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label
                                                            class="fs-6 form-label fw-bolder text-dark">Kesehatan</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editkesehatan<?=$value->id_data_keluarga_anggota?>"
                                                            id="editkesehatan<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->kesehatan == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($kesehatan as $kes) {
                                                                ?>
                                                                    <option <?= $value->kesehatan == $kes->id ? 'selected' : ''?> value='<?=$kes->id?>'><?=$kes->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <!--end::Form Group-->
                                                    <div class="">
                                                        <label class="fs-6 form-label fw-bolder text-dark">Perencanaan
                                                            Sehat</label>
                                                        <select class="form-control form-control-lg form-control-solid"
                                                            name="editperencanaan_sehat<?=$value->id_data_keluarga_anggota?>"
                                                            id="editperencanaan_sehat<?=$value->id_data_keluarga_anggota?>"
                                                            data-control="select2" data-placeholder="Pilih Kegiatan">
                                                            <?php if($value->perencanaan_sehat == 0){ ?>
                                                            <option value="0">Tidak Ada</option>
                                                            <?php } ?>
                                                            <?php
                                                            foreach ($perencanaan_sehat as $perencanaan) {
                                                                ?>
                                                                    <option <?= $value->perencanaan_sehat == $perencanaan->id ? 'selected' : ''?> value='<?=$perencanaan->id?>'><?=$perencanaan->nama?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Form Group-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>

                                        <?php if ($this->session->userdata('level_id') == 7 && $this->session->userdata('role_id') == 8):?>
                                        <a onclick="editAnggota('<?=$value->id_data_keluarga_anggota?>')"
                                            class="btn btn-primary">Ubah</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Anggota Keluarga</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">NIK</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addnik"
                                id="addnik" />
                            <input type="hidden" name="id_data_keluarga" id="id_data_keluarga"
                                value="<?=$catatan_keluarga->id_data_keluarga?>">
                            <input type="hidden" name="level" id="level" value="<?=$catatan_keluarga->level?>">
                            <input type="hidden" name="kd_kec" id="kd_kec" value="<?=$catatan_keluarga->kecamatan?>">
                            <input type="hidden" name="kd_desa" id="kd_desa" value="<?=$catatan_keluarga->desa?>">
                            <input type="hidden" name="dusun" id="dusun" value="<?=$catatan_keluarga->dusun?>">
                            <input type="hidden" name="rw" id="rw" value="<?=$catatan_keluarga->rw?>">
                            <input type="hidden" name="rt" id="rt" value="<?=$catatan_keluarga->rt?>">
                            <input type="hidden" name="dasawisma" id="dasawisma"
                                value="<?=$catatan_keluarga->dasawisma?>">
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">No KK
                            </label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addkk"
                                id="addkk" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Nama
                            </label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addnama"
                                id="addnama" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addjenis_kelamin"
                                id="addjenis_kelamin" data-control="select2" data-placeholder="Pilih Jenis Kelamin">
                                <option></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Agama
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addagama"
                                id="addagama" data-control="select2" data-placeholder="Pilih Jenis Kelamin">
                                <option></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
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
                            <label class="fs-6 form-label fw-bolder text-dark">Status dalam keluarga</label>
                            <select class="form-control form-control-lg form-control-solid"
                                name="addstatus_dalam_keluarga" id="addstatus_dalam_keluarga" data-control="select2"
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
                            <select class="form-control form-control-lg form-control-solid" name="addstatus_kawin"
                                id="addstatus_kawin" data-control="select2" data-placeholder="Pilih Status Keluarga">
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
                            <select class="form-control form-control-lg form-control-solid" name="addpendidikan"
                                id="addpendidikan" data-control="select2" data-placeholder="Pilih Pendidikan Terakhir">
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
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-12 col-md-12 mt-5">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Kebutuhan Khusus
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addcacat"
                                id="addcacat" data-control="select2" data-placeholder="Pilih Kebutuhan Khusus">
                                <option value="0">Tidak Berkebutuhan Khusus</option>
                                <?php
                                            foreach ($kebutuhan_khusus as $value) {
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

                <div class="col-lg-6 col-md-6 mb-8">
                    <label class="fs-6 form-label fw-bolder"><b>Kegiatan PKK yang diikuti</b></label>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Penghayatan dan Pengamalan
                                Pancasila</label>
                            <select class="form-control form-control-lg form-control-solid" name="addpancasila"
                                id="addpancasila" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($pancasila as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Gotong Royong</label>
                            <select class="form-control form-control-lg form-control-solid" name="addgotong_royong"
                                id="addgotong_royong" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($gotong_royong as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pendidikan dan ketrampilan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addketrampilan"
                                id="addketrampilan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($ketrampilan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pengembangan Kehidupan
                                Berkoperasi</label>
                            <select class="form-control form-control-lg form-control-solid" name="addkoperasi"
                                id="addkoperasi" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($koperasi as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pangan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addpangan"
                                id="addpangan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($pangan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Sandang</label>
                            <select class="form-control form-control-lg form-control-solid" name="addsandang"
                                id="addsandang" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($sandang as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Kesehatan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addkesehatan"
                                id="addkesehatan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($kesehatan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Perencanaan Sehat</label>
                            <select class="form-control form-control-lg form-control-solid" name="addperencanaan_sehat"
                                id="addperencanaan_sehat" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($perencanaan_sehat as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <div class="fv-row row ">
                    <div class="col-lg-12 col-md-12">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Keterangan
                            </label>
                            <textarea class="form-control form-control-lg form-control-solid" name="addketerangan"
                                id="addketerangan"></textarea>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <a onclick="addAnggota()" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('delete-modal'); ?>

<script>

</script>