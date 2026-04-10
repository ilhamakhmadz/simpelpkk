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
                    <table id="dataTable_kecamatan" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                             <tr class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
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
                                                <td class="text-end pt-10"><?=$value->nik.', '.$value->nama_anggota?></td>
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
                                                                name="editno_reg_tp_pkk<?=$value->id_data_keluarga_anggota?>" id="editno_reg_tp_pkk<?=$value->id_data_keluarga_anggota?>" disabled value="<?=$value->no_reg?>"/>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-5 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Nama
                                                            </label>
                                                            <input type="input" class="form-control form-control-lg form-control-solid"
                                                                name="editnama<?=$value->id_data_keluarga_anggota?>" id="editnama<?=$value->id_data_keluarga_anggota?>" disabled value="<?=$value->nama_anggota?>"/>
                                                            <input type="hidden" class="form-control form-control-lg form-control-solid"
                                                                name="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>" id="id_data_keluarga_anggota<?=$value->id_data_keluarga_anggota?>"   value="<?=$value->id_data_keluarga_anggota?>"/>
                                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                                name="id_data_keluarga" id="id_data_keluarga"   value="<?=$value->id_data_keluarga?>"/>
                                                        
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid"
                                                                name="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>" id="editjenis_kelamin<?=$value->id_data_keluarga_anggota?>" disabled  data-control="select2"
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
                                                                name="edittempat_lahir<?=$value->id_data_keluarga_anggota?>" id="edittempat_lahir<?=$value->id_data_keluarga_anggota?>" disabled  value="<?=$value->tempat_lahir?>"/>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                                                            </label>
                                                            <input type="date" class="form-control form-control-lg form-control-solid"
                                                                name="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>" id="edittanggal_lahir<?=$value->id_data_keluarga_anggota?>" disabled  value="<?=$value->tanggal_lahir?>"/>
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
                                                                id="editstatus<?=$value->id_data_keluarga_anggota?>" disabled  data-control="select2"
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
                                                                    id="editstatus_kawin<?=$value->id_data_keluarga_anggota?>" disabled  data-control="select2"
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
                                                <hr>
                                                <!--end::Form Group-->
                                                <!--begin::Form Group-->
                                                <div class="fv-row row ">
                                                    <div class="col-lg-12 col-md-12">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Berkebutuhan Khusus</label>
                                                            <select class="form-control form-control-lg" name="editcacat<?=$value->id_data_keluarga_anggota?>"
                                                                id="editcacat<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                                data-placeholder="Pilih Jenis Kebutuhan Khusus">
                                                                <option value="<?=$value->cacat?>"><?=$value->cacat?></option>
                                                                <option value="Tidak Cacat">Tidak Cacat</option>
                                                                <option value="Cacat Fisik">Cacat Fisik</option>
                                                                <option value="Cacat Fisik dan Mental">Cacat Fisik dan Mental</option>
                                                                <option value="Cacat Mental/Jiwa">Cacat Mental/Jiwa</option>
                                                                <option value="Cacat Netra/Buta">Cacat Netra/Buta</option>
                                                                <option value="Cacat Rungu/Wicara">Cacat Rungu/Wicara</option>
                                                                <option value="Cacat Lainnya">Cacat Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <p><i>Kegiatan yang diikuti oleh anggota keluarga pilih <b>Ya/Tidak</b> </i> </p>
                                                <div class="fv-row row ">
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Penghayatan dan Pengamalan Pancasila
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid"
                                                                name="editpancasila<?=$value->id_data_keluarga_anggota?>" id="editpancasila<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                                data-placeholder="Kegiatan Penghayatan dan Pengamalan Pancasila">
                                                                <option value="<?=$value->pancasila?>"><?=$value->pancasila?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Gotong Royong
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid" name="editgotong_royong<?=$value->id_data_keluarga_anggota?>"
                                                                id="editgotong_royong<?=$value->id_data_keluarga_anggota?>"  data-control="select2" data-placeholder="Kegiatan Pekerjaan">
                                                                <option value="<?=$value->gotong_royong?>"><?=$value->gotong_royong?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
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
                                                            <label class="fs-6 form-label fw-bolder text-dark">Pendidikan dan Keterampilan
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid"
                                                                name="editketerampilan<?=$value->id_data_keluarga_anggota?>" id="editketerampilan<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                                data-placeholder="Kegiatan Pendidikan dan Keterampilan">
                                                                <option value="<?=$value->keterampilan?>"><?=$value->keterampilan?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Pengembangan Kehidupan Berkoperasi
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid" name="editkoperasi<?=$value->id_data_keluarga_anggota?>"
                                                                id="editkoperasi<?=$value->id_data_keluarga_anggota?>"  data-control="select2" data-placeholder="Kegiatan Pengembangan Kehidupan Berkoperasi">
                                                                <option value="<?=$value->koperasi?>"><?=$value->koperasi?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
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
                                                            <label class="fs-6 form-label fw-bolder text-dark">Sandang
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid"
                                                                name="editsandang<?=$value->id_data_keluarga_anggota?>" id="editsandang<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                                data-placeholder="Kegiatan Sandang">
                                                                <option value="<?=$value->sandang?>"><?=$value->sandang?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Pangan
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid" name="editpangan<?=$value->id_data_keluarga_anggota?>"
                                                                id="editpangan<?=$value->id_data_keluarga_anggota?>"  data-control="select2" data-placeholder="Kegiatan Pangan">
                                                                <option value="<?=$value->pangan?>"><?=$value->pangan?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
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
                                                            <label class="fs-6 form-label fw-bolder text-dark">Kesehatan
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid"
                                                                name="editkesehatan<?=$value->id_data_keluarga_anggota?>" id="editkesehatan<?=$value->id_data_keluarga_anggota?>" data-control="select2"
                                                                data-placeholder="Kegiatan Kesehatan">
                                                                <option value="<?=$value->kesehatan?>"><?=$value->kesehatan?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Perencanaan Sehat
                                                            </label>
                                                            <select class="form-control form-control-lg form-control-solid" name="editperencanaan_sehat<?=$value->id_data_keluarga_anggota?>"
                                                                id="editperencanaan_sehat<?=$value->id_data_keluarga_anggota?>"  data-control="select2" data-placeholder="Kegiatan Perencanaan Sehat">
                                                                <option value="<?=$value->perencanaan_sehat?>"><?=$value->perencanaan_sehat?></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak">Tidak</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Form Group-->
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="fv-row row ">
                                                    <div class="col-lg-12 col-md-12">
                                                        <!--end::Form Group-->
                                                        <div class="">
                                                            <label class="fs-6 form-label fw-bolder text-dark">Keterangan
                                                            </label>
                                                            <textarea name="editket<?=$value->id_data_keluarga_anggota?>" id="editket<?=$value->id_data_keluarga_anggota?>" class="form-control form-control-lg form-control-solid"><?=$value->ket?></textarea>
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
                </div>
                <!--end::Table-->
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Informasi
                    <span class="badge badge-exclusive badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="In-house component" data-kt-initialized="1">Penting</span></h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                            <div class="fv-row row ">
                                    <div class="">
                                        <p><center>Tidak dapat menambahkan anggota keluarga di halaman ini, untuk menambahkan data anggota keluarga dapat di menekan tombol dibawah ini
                                            <br>
                                            <a type="button" class="btn btn-primary" href="<?= site_url('dasawisma/keluarga/edit/').$catatan_keluarga->id_data_keluarga; ?>">
                                                Link
                                            </a>
                                        </center></p>
                                    </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('delete-modal'); ?>

<script>

</script>
