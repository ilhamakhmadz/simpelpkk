 <style>
.timeline-label:before {
    content: "";
    position: absolute;
    left: 148px;
    width: 3px;
    top: 0;
    bottom: 0;
    background-color: #eff2f5;
    margin-right: 24px;
}

.timeline-label .timeline-label {
    width: 146px;
    flex-shrink: 0;
    position: relative;
    color: #3f4254;
}

 </style>
 <!--end: Invoice header-->
 <div class="row g-0 g-xl-5 g-xxl-8">
     <div class="col-xl-12">
         <!--begin::Table Widget 2-->
         <div class="card">
             <div class="card-body p-0">
                 <!--begin::Invoice-->
                 <div class="row justify-content-center pt-8 px-8 pt-md-20 px-md-0">
                     <div class="col-md-10">
                         <!-- begin: Invoice header-->
                         <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                             <h1 class="display-6 text-dark fw-bolder mb-10">PROFIL PKK</h1>
                             <div class="d-flex flex-column align-items-md-end px-0">
                                 <span class="d-flex flex-column align-items-md-end fs-4 fw-bold text-muted">
                                     <span>PKK TINGKAT <?= strtoupper($profil->level)?></span>
                                     <span>Kecamatan <?=$profil->Nama_Kecamatan?></span>

                                     <?php if ($profil->level == "desa"): ?>
                                     <span>Desa <?=$profil->Nama_Desa?></span>
                                     <?php endif; ?>
                                 </span>
                             </div>
                         </div>

                         <!--begin: Invoice body-->
                         <div class="row border-bottom pb-10">
                             <div class="col-md-12 py-md-10 pe-md-10">
                                 <div class="table-responsive">
                                     <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                         <thead>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th colspan="3" class="pt-5 pb-10 text-center">Jumlah Kelompok</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Jumlah</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Jumlah Jiwa</th>
                                                 <th colspan="6" class="pt-5 pb-10 text-center">Jumlah Kader</th>
                                                 <th colspan="4" class="pt-5 pb-10 text-center">Jumlah Tenaga
                                                     Sekertariat
                                                 </th>
                                                 <th rowspan="3" class="pt-5 pb-10 text-center">Keterangan</th>
                                             </tr>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">PKK RW</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">PKK RT</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">Dasa<BR>wisma</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">KRT</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">KK</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">L</th>
                                                 <th rowspan="2" class="pt-5 pb-10 text-center">P</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Anggota TP.PKK</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Umum</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Khusus</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Honorer</th>
                                                 <th colspan="2" class="pt-5 pb-10 text-center">Bantuan</th>
                                             </tr>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th class="pt-5 pb-10 text-center">L</th>
                                                 <th class="pt-5 pb-10 text-center">P</th>
                                                 <th class="pt-5 pb-10 text-center">L</th>
                                                 <th class="pt-5 pb-10 text-center">P</th>
                                                 <th class="pt-5 pb-10 text-center">L</th>
                                                 <th class="pt-5 pb-10 text-center">P</th>
                                                 <th class="pt-5 pb-10 text-center">L</th>
                                                 <th class="pt-5 pb-10 text-center">P</th>
                                                 <th class="pt-5 pb-10 text-center">L</th>
                                                 <th class="pt-5 pb-10 text-center">P</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td class="text-end pt-10"><?=$profil->jml_kelompok_pkk_rw?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kelompok_pkk_rt?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kelompok_dasawisma?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_krt?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kk?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_laki?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_perempuan?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_anggota_tp_pkk_laki?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_anggota_tp_pkk_perempuan?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kader_umum_laki?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kader_umum_perempuan?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kader_khusus_laki?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_kader_khusus_perempuan?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$profil->jml_tenaga_sek_honorer_laki?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                     <?=$profil->jml_tenaga_sek_honorer_perempuan?></td>
                                                 <td class="text-end pt-10"><?=$profil->jml_tenaga_sek_bantuan_laki?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                     <?=$profil->jml_tenaga_sek_bantuan_perempuan?></td>
                                                 <td class="text-end pt-10"><?=$profil->keterangan?></td>
                                             </tr>

                                         </tbody>
                                     </table>
                                 </div>

                             </div>
                         </div>
                         <!--end: Invoice body-->
                     </div>
                 </div>

                 <!--end::Invoice-->
             </div>
         </div>
         <!--end::Table Widget 2-->
     </div>
     <div class="col-xl-4">
         <!--begin::List Widget 1-->
         <div class="card card-stretch mb-5 mb-xxl-8">
             <!--begin::Header-->
             <div class="card-header align-items-center border-0 mt-5">
                 <h3 class="card-title align-items-start flex-column">
                     <span class="fw-bolder text-dark fs-3">Struktur Kepengurusan PKK</span>
                 </h3>
             </div>
             <!--end::Header-->
             <!--begin::Body-->
             <div class="card-body pt-3">
                 <!--begin::Timeline-->
                 <div class="timeline-label">
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Ketua</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-primary fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Text-->
                         <div class="timeline-content d-flex text-muted ps-3"><?=empty($aparatur->kepala_desa) ? 'Belum Diisi' : $aparatur->kepala_desa?>
                         </div>
                         <!--end::Text-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Wakil Ketua</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-success fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Content-->
                         <div class="timeline-content fw-mormal text-muted ps-3"><?=empty($aparatur->sekertariat_desa) ? 'Belum Diisi' : $aparatur->sekertariat_desa?></div>
                         <!--end::Content-->
                     </div>
                     <!--end::Item-->

                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Sekertaris</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-primary fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Text-->
                         <div class="timeline-content d-flex text-muted ps-3"><?=empty($aparatur->kaur_tu) ? 'Belum Diisi' : $aparatur->kaur_tu?>
                         </div>
                         <!--end::Text-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Wakil Sekertaris</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-success fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Content-->
                         <div class="timeline-content fw-mormal text-muted ps-3"><?=empty($aparatur->kaur_perencanaan) ? 'Belum Diisi' : $aparatur->kaur_perencanaan?></div>
                         <!--end::Content-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Bendahara</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-primary fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Text-->
                         <div class="timeline-content d-flex text-muted ps-3"><?=empty($aparatur->kaur_keuangan) ? 'Belum Diisi' : $aparatur->kaur_keuangan?>
                         </div>
                         <!--end::Text-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Wakil Bendahara</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-success fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Content-->
                         <div class="timeline-content fw-mormal text-muted ps-3"><?=empty($aparatur->seksi_pemerintahan) ? 'Belum Diisi' : $aparatur->seksi_pemerintahan?>
                         </div>
                         <!--end::Content-->
                     </div>
                     <!--end::Item-->




                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Ketua Pokja I</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-danger fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Desc-->
                         <div class="timeline-content text-muted ps-3"><?=empty($aparatur->seksi_kerjasama) ? 'Belum Diisi' : $aparatur->seksi_kerjasama?>
                         </div>
                         <!--end::Desc-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Ketua Pokja II</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-danger fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Desc-->
                         <div class="timeline-content text-muted ps-3"><?=empty($aparatur->seksi_pelayanan) ? 'Belum Diisi' : $aparatur->seksi_pelayanan?>
                         </div>
                         <!--end::Desc-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Ketua Pokja III</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-danger fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Desc-->
                         <div class="timeline-content text-muted ps-3"><?=empty($aparatur->staf_1) ? 'Belum Diisi' : $aparatur->staf_1?>
                         </div>
                         <!--end::Desc-->
                     </div>
                     <!--end::Item-->
                     <!--begin::Item-->
                     <div class="timeline-item">
                         <!--begin::Label-->
                         <div class="timeline-label fw-bolder text-gray-800 fs-6">Ketua Pokja IV</div>
                         <!--end::Label-->
                         <!--begin::Badge-->
                         <div class="timeline-badge">
                             <i class="fa fa-genderless text-danger fs-1"></i>
                         </div>
                         <!--end::Badge-->
                         <!--begin::Desc-->
                         <div class="timeline-content text-muted ps-3"><?=empty($aparatur->staf_2) ? 'Belum Diisi' : $aparatur->staf_2?>
                         </div>
                         <!--end::Desc-->
                     </div>
                     <!--end::Item-->


                 </div>
                 <!--end::Timeline-->
             </div>
             <!--end: Card Body-->
         </div>
         <!--end::List Widget 1-->
     </div>
     <div class="col-xl-8">
         <!--begin::Table Widget 2-->
         <div class="card">
             <div class="card-body p-0">
                 <!--begin::Invoice-->
                 <div class="row justify-content-center pt-8 px-8 pt-md-20 px-md-0">
                     <div class="col-md-10">
                         <!-- begin: Invoice header-->
                         <div class="d-flex justify-content-between  flex-column flex-md-row">
                             <h1 class="display-6 text-dark fw-bolder mb-2">BUKU ANGGOTA</h1>
                         </div>

                         <!--begin: Invoice body-->
                         <div class="row border-bottom pb-10">
                             <div class="col-md-12 py-md-10 pe-md-10">
                                 <div class="table-responsive ">
                                     <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="anggotaDatatble">
                                         <thead>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th class="pt-5 pb-10 text-center">No.Reg</th>
                                                 <th class="pt-5 pb-10 text-center">NIK & KK</th>
                                                 <th class="pt-5 pb-10 text-center">Nama</th>
                                                 <th class="pt-5 pb-10 text-center">Jenis Kelamin</th>
                                                 <th class="pt-5 pb-10 text-center">Tempat,Tgl Lahir</th>
                                                 <th class="pt-5 pb-10 text-center">Kedudukan Fungsi</th>
                                                 <th class="pt-5 pb-10 text-center">Pendidikan</th>
                                                 <th class="pt-5 pb-10 text-center">Pekerjaan</th>
                                                 <th class="pt-5 pb-10 text-center">Alamat</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php foreach ($anggota as $value): ?>
                                             <tr>
                                                 <td class="text-end pt-10"><?=$value->no_reg_tp_pkk?></td>
                                                 <td class="text-end pt-10"><?=$value->nik?><br><?=$value->kk?></td>
                                                 <td class="text-end pt-10">
                                                     <b><?=$value->nama?></b><br><?=$value->status?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$value->jenis_kelamin?></td>
                                                 <td class="text-end pt-10">
                                                     <?=$value->tempat_lahir?>,<?=date_format(date_create($value->tanggal_lahir), "d-m-Y")?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                     <b><?=$value->kedudukan_fungsi?></b><br><?=$value->jabatan?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$value->pendidikan?></td>
                                                 <td class="text-end pt-10"><?=$value->pekerjaan?></td>
                                                 <td class="text-end pt-10"><?=$value->alamat?></td>
                                             </tr>
                                             <?php endforeach;?>
                                         </tbody>
                                     </table>
                                 </div>

                             </div>
                         </div>
                         <!--end: Invoice body-->
                     </div>
                 </div>

                 <!--end::Invoice-->
             </div>
         </div>
         <!--end::Table Widget 2-->
     </div>
 </div>

 <script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        $("#anggotaDatatble").DataTable();
    });
 </script>
