<br> 
<div class="row g-0 g-xl-5 g-xxl-8">
        <div class="col-xl-7">
         <!--begin::Table Widget 2-->
            <div class="card">
                <div class="card-body p-0">
                 <!--begin::Invoice-->
                    <div class="row justify-content-center pt-8 px-8 pt-md-20 px-md-0">
                        <div class="col-md-10">
                            <!-- begin: Invoice header-->
                            <div class="d-flex justify-content-between flex-column flex-md-row">
                                <h1 class="display-6 text-dark fw-bolder mb-10">PROFIL KELUARGA</h1>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <span class="d-flex flex-column align-items-md-end fs-4 fw-bold text-muted">
                                        <span>PKK TINGKAT <?= strtoupper($catatan_keluarga->level)?></span>
                                        <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>

                                        <?php if ($catatan_keluarga->level == "desa"): ?>
                                        <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body p-20">
                <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Dasawisma</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">                    
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->dasawisma ?></span>                
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Kepala Keluarga</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->nama_kepala_keluarga ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Makanan Pokok
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->makanan_pokok ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Jamban Keluarga</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->jamban_keluarga ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Sumber Air
                        </label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->sumber_air_keluarga ?></span> 
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->    

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Pembuangan Sampah</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->pembuangan_sampah ?></span>  
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Saluran Air Limbah</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->saluran_air_limbah ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Stiker P4K</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->stiker_p4k ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Kreteria Rumah</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->kreteria_rumah ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Aktivitas UP2K</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->aktivitas_up2k ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Aktifitas Kesehatan </label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $catatan_keluarga->aktivitas_kesehatan_lingkungan ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    </div>
            </div>
        </div>
        <div class="col-xl-5">
            <!--begin::List Widget 1-->
            <div class="card mb-5 mb-xxl-8">
                                <div class="row border-bottom pb-0">
                                    <div class="card-body p-0">
                                        <div class="tab-content pt-2">            
                                            <div class="tab-pane fade active show" id="kt_chart_widget_1_tab_pane_1">
                                                <div class="row p-0 px-9">
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Anggota Keluarga</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="3899" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_anggota_keluarga ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Kartu Keluarga</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="72" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_kk ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Balita</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="291" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_balita ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">PUS</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_PUS ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">WUS</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_WUS ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Keluarga Buta</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_buta ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Hamil</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_ibu_hamil ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Menyusui</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_menyusui ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Lansia</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $catatan_keluarga->jumlah_lansia ?></span>
                                                            </div>
                                                        </div>
                                                </div>                                                          
                                            </div>
                                            <div class="tab-pane fade " id="kt_chart_widget_1_tab_pane_2">          
                                                <div class="row p-0 px-9">
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">User Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="2472">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Admin Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="34">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Author Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="419">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Failed Attempts</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="12">0</span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="px-4 mt-7" id="kt_charts_widget_1_chart_2" style="height: 350px"></div>                                                            
                                            </div>
                                            <div class="tab-pane fade " id="kt_chart_widget_1_tab_pane_3">     
                                                <div class="row p-0 px-9">
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">User Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="2917">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Admin Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="102">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Author Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="219">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Failed Attempts</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="15">0</span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="px-4 mt-7" id="kt_charts_widget_1_chart_3" style="height: 350px"></div>                                                              
                                            </div>
                                            <div class="tab-pane fade " id="kt_chart_widget_1_tab_pane_4">
                                                <div class="row p-0 px-9">
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">User Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="7392">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Admin Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="23">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Author Sign-in</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="418">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Failed Attempts</span>

                                                                <span class="fs-2x fw-bolder text-gray-800" data-kt-countup="true" data-kt-countup-value="11">0</span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="px-4 mt-7" id="kt_charts_widget_1_chart_4" style="height: 350px"></div>                                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
     <div class="col-xl-12">
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
                                 <div class="table-responsive">
                                     <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                         <thead>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th class="pt-5 pb-10 text-center">NIK</th>
                                                 <th class="pt-5 pb-10 text-center">Nama</th>
                                                 <th class="pt-5 pb-10 text-center">Jenis Kelamin, Status Keluarga</th>
                                                 <th class="pt-5 pb-10 text-center">Tempat,Tgl Lahir</th>
                                                 <th class="pt-5 pb-10 text-center">Pendidikan</th>
                                                 <th class="pt-5 pb-10 text-center">Pekerjaan</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php foreach ($anggota as $value): ?>
                                             <tr>
                                                 <td class="text-end pt-10"><?=$value->nik?></td>
                                                 <td class="text-end pt-10">
                                                     <b><?=$value->nama_anggota?></b><br><?=$value->status_kawin?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                    <b><?=$value->status_dalam_keluarga?></b>
                                                    <br>
                                                    <?=$value->jenis_kelamin?>
                                                </td>
                                                 <td class="text-end pt-10">
                                                     <?=$value->tempat_lahir?>,<?=date_format(date_create($value->tanggal_lahir), "d-m-Y")?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$value->pendidikan?></td>
                                                 <td class="text-end pt-10"><?=$value->pekerjaan?></td>
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
