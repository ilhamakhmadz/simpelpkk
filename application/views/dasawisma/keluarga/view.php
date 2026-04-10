<div class="row g-0 mt-7 g-xl-5 g-xxl-8">
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
                                                <?php if($level_data == 'keluarga'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <span>Dusun <?=$catatan_keluarga->nama_dusun?></span>
                                                <span>RW : <?=$catatan_keluarga->rw?>,RT : <?=$catatan_keluarga->rt?></span>
                                                <span>Dasawisma <?=$catatan_keluarga->nama_dasawisma?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dasawisma'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <span>Dusun <?=$catatan_keluarga->nama_dusun?></span>
                                                <span>RW : <?=$catatan_keluarga->rw?>,RT : <?=$catatan_keluarga->rt?></span>
                                                <span>Dasawisma <?=$catatan_keluarga->nama_dasawisma?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rt'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <span>Dusun <?=$catatan_keluarga->nama_dusun?></span>
                                                <span>RW : <?=$catatan_keluarga->rw?>,RT : <?=$catatan_keluarga->rt?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rw'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <span>Dusun <?=$catatan_keluarga->nama_dusun?></span>
                                                <span>RW : <?=$catatan_keluarga->rw?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dusun'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <span>Dusun <?=$catatan_keluarga->nama_dusun?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'desa'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <span>Desa <?=$catatan_keluarga->Nama_Desa?></span>
                                                <?php endif; ?>
                                                <?php if($level_data == 'kecamatan'): ?>
                                                <span>Kecamatan <?=$catatan_keluarga->Nama_Kecamatan?></span>
                                                <?php endif; ?>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body p-20">
            <?php
            if($level_data == 'keluarga'){
                $this->load->view('dasawisma/keluarga/_view_rt');
            }else{
                $this->load->view('dasawisma/keluarga/_view');
            }
            ?>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card card-flush h-xl-100 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header py-7">
                <!--begin::Statistics-->
                <div class="m-0">
                    <!--begin::Description-->
                    <span class="fs-6 fw-semibold text-gray-500">Keterangan Tambahan</span>
                    <!--end::Description-->
                </div>
                <!--end::Statistics-->

            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-0">
                <div class="mb-0">
                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Anggota Keluarga</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->total_laki + $catatan_keluarga->total_perempuan?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Kartu Keluarga</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_kk?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Keluarga Laki-Laki</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->total_laki?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Keluarga Perempuan</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->total_perempuan?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Balita Laki-Laki</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->balita_laki?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Balita Perempuan</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->balita_perempuan?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Pasangan Usia Subur (PUS)</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_PUS?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Wanita Usia Subur (WUS)</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?= $catatan_keluarga->jumlah_WUS?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Ibu Hamil</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_ibu_hamil?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Ibu Menyusui</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_menyusui?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Lanjut Usia (Lansia)</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_lansia?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">3 Buta</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->jumlah_buta?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-stack mt-3">
                        <div class="d-flex align-items-center me-5">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="bi bi-bookmark-fill fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="me-5">
                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">Berkebutuhan Khusus</div>
                                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">jumlah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-center">
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                    <?=$catatan_keluarga->berkebutuhan_khusus?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
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
                                    <table id="dataTable_anggota" class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                        <thead>
                                            <tr
                                                class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                <?php if($level_data == 'keluarga'): ?>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dasawisma'): ?>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rt'): ?>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rw'): ?>
                                                <th class="pt-5 pb-10 text-center">RT</th>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dusun'): ?>
                                                <th class="pt-5 pb-10 text-center">RW/RT</th>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'desa'): ?>
                                                <th class="pt-5 pb-10 text-center">Dusun/RW/RT</th>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
                                                <?php if($level_data == 'kecamatan'): ?>
                                                <th class="pt-5 pb-10 text-center">Desa</th>
                                                <th class="pt-5 pb-10 text-center">Dusun/RW/RT</th>
                                                <th class="pt-5 pb-10 text-center">Dasawisma</th>
                                                <?php endif; ?>
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
                                                <?php if($level_data == 'keluarga'): ?>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dasawisma'): ?>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rt'): ?>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'rw'): ?>
                                                    <td class="text-end pt-10"><?='RT : '.$value->rt?></td>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'dusun'): ?>
                                                    <td class="text-end pt-10"><?='RW : '.$value->rw.' - RT : '. $value->rt?></td>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'desa'): ?>
                                                    <td class="text-end pt-10"><?='Dusun : '.$value->nama_dusun.' - RW : '. $value->rw.' - RT : '. $value->rt?></td>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
                                                <?php if($level_data == 'kecamatan'): ?>
                                                    <td class="text-end pt-10"><?=$value->Nama_Desa?></td>
                                                    <td class="text-end pt-10"><?='Dusun : '.$value->nama_dusun.' - RW : '. $value->rw.' - RT : '. $value->rt?></td>
                                                    <td class="text-end pt-10"><?=$value->nama_dasawisma?></td>
                                                <?php endif; ?>
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
