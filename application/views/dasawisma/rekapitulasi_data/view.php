<br> 
<div class="row g-0 g-xl-5 g-xxl-8">
        <div class="col-xl-6">
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
                                        <span>PKK TINGKAT <?= strtoupper($rekapitulasi_data->level)?></span>
                                        <span>Kecamatan <?=$rekapitulasi_data->Nama_Kecamatan?></span>

                                        <?php if ($rekapitulasi_data->level == "desa"): ?>
                                        <span>Desa <?=$rekapitulasi_data->Nama_Desa?></span>
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
                            <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->dasawisma ?></span>                
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
                            <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->nama_kepala_keluarga ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Nama Suami</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->nama_suami ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Nama Ibu</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->nama_ibu ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                        
                    </div>
            </div>
        </div>
        <div class="col-xl-6">
         <!--begin::Table Widget 2-->
            <div class="card">
                <div class="card-body p-20">
                         <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                            </svg>
                            </span>
                            <!--end::Svg Icon-->        
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                                <!--begin::Content-->
                                                <div class=" fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">Data Tercatat Sebagai <b><?= $rekapitulasi_data->status ?></b></h4>
                                                </div>
                                                <!--end::Content-->
                                        </div>
                                <!--end::Wrapper-->  
                        </div>
                        <!--end::Input group-->
                        <br><br>
                    <?php if($rekapitulasi_data->status == 'Melahirkan'):?>
                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Nama Bayi
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->nama_bayi; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Jenis Kelamin
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->laki_laki == 1 ? 'Laki-Laki' : 'Perempuan'; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?= date('d F Y', strtotime($rekapitulasi_data->tanggal_lahir)); ?></span>         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Akte Kelahiran</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->ada_akte_kelahiran == 1 ? 'Ada' : 'Tidak'; ?></span>         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!--begin::List Widget 1-->
            <div class="card mb-5 mb-xxl-8">
                                <div class="row border-bottom pb-0">
                                    <div class="card-body p-0">
                                    <!--begin::Invoice-->
                                        <div class="row justify-content-center pt-8 px-8 pt-md-20 px-md-0">
                                            <div class="col-md-10">
                                                <!-- begin: Invoice header-->
                                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                                    <h1 class="display-6 text-dark fw-bolder mb-10">Catatan Kematian</h1>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="tab-content pt-2">            
                                            <div class="tab-pane fade active show" id="kt_chart_widget_1_tab_pane_1">
                                                <div class="row p-0 px-9">
                                                    
                                                <?php if(empty($rekapitulasi_data->nama_meninggal)):?>
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fw-semibold text-muted">Data catatan meninggal kosong</label>
                                                        <!--end::Label-->

                                                        
                                                    </div>
                                                <?php endif;?>
                                                <?php if(!empty($rekapitulasi_data->nama_meninggal)):?>
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fw-semibold text-muted">Nama Ibu/Bayi/Balita</label>
                                                        <!--end::Label-->

                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->nama_meninggal; ?></span>         
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fw-semibold text-muted">Jenis Kelamin</label>
                                                        <!--end::Label-->

                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->laki_laki_meninggal == 1 ? 'Laki-Laki' : 'Perempuan'; ?></span>         
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fw-semibold text-muted">Tanggal Meninggal</label>
                                                        <!--end::Label-->

                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800"><?= date('d F Y', strtotime($rekapitulasi_data->tanggal_meninggal)); ?></span>         
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fw-semibold text-muted">Sebab</label>
                                                        <!--end::Label-->

                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800"><?= $rekapitulasi_data->sebab_meninggal; ?></span>         
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                <?php endif;?>
                                                
                                                </div>                                                          
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
     
 </div>
