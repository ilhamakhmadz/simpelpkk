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
                                        <span>PKK TINGKAT <?= strtoupper($Kelompok_dasawisma->level)?></span>
                                        <span>Kecamatan <?=$Kelompok_dasawisma->Nama_Kecamatan?></span>

                                        <?php if ($Kelompok_dasawisma->level == "desa"): ?>
                                        <span>Desa <?=$Kelompok_dasawisma->Nama_Desa?></span>
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
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->dasawisma ?></span>                
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
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->nama_kepala_keluarga ?></span>                         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Rumah Sehat Layak Huni
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_sehat_layak_huni == 1 ? 'YA' : 'TIDAK'; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Rumah Tidak Sehat Layak Huni
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_tidak_sehat_layak_huni == 1 ? 'YA' : 'TIDAK'; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Tempat Pembuangan Sampah</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_memiliki_tps == 1 ? 'YA' : 'TIDAK'; ?></span>         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Pembuangan Air Limbah
                        </label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_memiliki_spal ?></span> 
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
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_memiliki_jamban ?></span>  
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Menempelkan SP4K</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->rumah_menempel_sp4k ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
         <!--begin::Table Widget 2-->
            <div class="card">
                <div class="card-body p-20">
                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            PDAM
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->pdam == 1 ? 'YA' : 'TIDAK'; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                    <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Sumur
                        </label>
                        <!--end::Label-->
                        
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->sumur == 1 ? 'YA' : 'TIDAK'; ?></span>      
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Sumber Air Lainnya</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->sumber_air_lain == 1 ? 'YA' : 'TIDAK'; ?></span>         
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">
                            Mengikuti Aktifitas UP2K
                        </label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->mengikuti_up2k == 1 ? 'YA' : 'TIDAK'; ?></span> 
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->    

                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Pemanfaatan Tanah</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->pemanfaatan_tanah == 1 ? 'YA' : 'TIDAK'; ?></span>  
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Industri Rumah Tangga</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->industri_rumah_tangga == 1 ? 'YA' : 'TIDAK'; ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Mengikuti Kerja Bhakti</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->kerja_bhakti == 1 ? 'YA' : 'TIDAK'; ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                    <div class="row mb-10">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Keterangan Lainnya</label>
                        <!--begin::Label-->

                        <!--begin::Label-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800"><?= $Kelompok_dasawisma->ket ?></span> 
                        </div>
                        <!--begin::Label-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!--begin::List Widget 1-->
            <div class="card mb-5 mb-xxl-8">
                                <div class="row border-bottom pb-0">
                                    <div class="card-body p-0">
                                        <div class="tab-content pt-2">            
                                            <div class="tab-pane fade active show" id="kt_chart_widget_1_tab_pane_1">
                                                <div class="row p-0 px-9">
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Jumlah Kartu Keluarga</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="3899" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_kk ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Anggota Laki-Laki</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="291" data-kt-initialized="1"><?= $Kelompok_dasawisma->total_laki ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Anggota Perempuan</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->total_perempuan ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Balita Laki-Laki</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->total_laki ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Balita Perempuan</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->total_perempuan ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Hamil</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_ibu_hamil ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Menyusui</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_menyusui ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Jumlah PUS</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_PUS ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Jumlah WUS</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_WUS ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Hamil</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_ibu_hamil ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Ibu Menyusui</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_menyusui ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Lansia</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_lansia ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Buta</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->jumlah_buta ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="border border-dashed border-gray-300 text-center min-w-250px rounded pt-6 pb-4 my-3">
                                                                <span class="fs-4 fw-semibold text-gray-400 d-block">Berkebutuhan Khusus</span>

                                                                <span class="fs-2x fw-bolder text-gray-800 counted" data-kt-countup="true" data-kt-countup-value="6" data-kt-initialized="1"><?= $Kelompok_dasawisma->berkebutuhan_khusus ?></span>
                                                            </div>
                                                        </div>
                                                </div>                                                          
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
     
 </div>
