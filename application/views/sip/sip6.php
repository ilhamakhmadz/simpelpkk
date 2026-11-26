<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <!-- Session Alert Notifications -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 mb-10">
                <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
                    <i class="fa fa-check-circle fa-2x text-success"></i>
                </span>
                <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
                    <h4 class="fw-bold text-success">Berhasil!</h4>
                    <span><?php echo $this->session->flashdata('success'); ?></span>
                </div>
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="fa fa-times text-success"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
                    <i class="fa fa-times-circle fa-2x text-danger"></i>
                </span>
                <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
                    <h4 class="fw-bold text-danger">Gagal!</h4>
                    <span><?php echo $this->session->flashdata('error'); ?></span>
                </div>
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="fa fa-times text-danger"></i>
                </button>
            </div>
        <?php endif; ?>

        <!-- Filter Card -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Filter Wilayah, Bulan & Tahun</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Rekapitulasi Data/Buku Catatan Ibu Hamil, Melahirkan, Nifas, Ibu Meninggal, Kelahiran Bayi, Bayi Meninggal dan Kematian Balita</span>
                </h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('sip/sip6'); ?>" method="get" class="form row align-items-end g-3">
                    <?php if ($user_level <= 3): ?>
                        <div class="col-md-3">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Kecamatan</label>
                            <select class="form-select form-select-solid" name="kec_id" onchange="this.form.submit()">
                                <?php foreach ($kecamatan_list as $kec): ?>
                                    <option value="<?php echo $kec->Kd_Kec; ?>" <?php echo $selected_kec == $kec->Kd_Kec ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($kec->Nama_Kecamatan); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Desa / Kelurahan</label>
                            <select class="form-select form-select-solid" name="desa_id">
                                <?php foreach ($desa_list as $desa): ?>
                                    <option value="<?php echo $desa->Kd_Desa; ?>" <?php echo $selected_desa == $desa->Kd_Desa ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($desa->Nama_Desa); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="<?php echo ($user_level <= 3) ? 'col-md-2' : 'col-md-4'; ?>">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Bulan</label>
                        <select class="form-select form-select-solid" name="bulan">
                            <?php foreach ($months as $num => $name): ?>
                                <option value="<?php echo $num; ?>" <?php echo $selected_bulan == $num ? 'selected' : ''; ?>>
                                    <?php echo $name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="<?php echo ($user_level <= 3) ? 'col-md-2' : 'col-md-4'; ?>">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Tahun</label>
                        <select class="form-select form-select-solid" name="tahun">
                            <?php foreach ($years as $yr): ?>
                                <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                    <?php echo $yr; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="<?php echo ($user_level <= 3) ? 'col-md-2' : 'col-md-4'; ?> d-grid">
                        <button type="submit" class="btn btn-primary fw-bolder">
                            <i class="fa fa-search me-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sheet Card -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-4 mb-1">
                        CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, BAYI & BALITA
                    </span>
                    <span class="text-muted mt-1 fw-bold fs-7">
                        DESA/KEL: <strong class="text-primary"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?></strong> | 
                        BULAN: <strong class="text-dark"><?php echo strtoupper($months[intval($selected_bulan)]); ?></strong> | 
                        TAHUN: <strong class="text-primary"><?php echo $selected_tahun; ?></strong>
                    </span>
                </div>
                <div class="card-toolbar d-flex align-items-center gap-2">
                    <?php if (!empty($selected_desa)): ?>
                        <button type="button" class="btn btn-sm btn-primary fw-bolder" onclick="openModalTambah6()">
                            <i class="fa fa-plus me-1"></i> Input / Tambah Data
                        </button>
                        <a href="<?php echo site_url("sip/sip6_excel?desa_id={$selected_desa}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-light-success fw-bolder">
                            <i class="fa fa-file-excel-o me-1"></i> Cetak Excel
                        </a>
                        <a href="<?php echo site_url("sip/sip6_pdf?desa_id={$selected_desa}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-sm btn-light-danger fw-bolder">
                            <i class="fa fa-file-pdf-o me-1"></i> Cetak PDF
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body py-4">
                <!-- Header Metadata -->
                <div class="mb-5 p-4 bg-light rounded border border-gray-300">
                    <div class="row fs-6">
                        <div class="col-md-6">
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <td style="width: 170px;" class="fw-bolder">DESA / KELURAHAN</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold text-primary"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">KECAMATAN</td>
                                    <td>:</td>
                                    <td class="fw-bold"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <td style="width: 170px;" class="fw-bolder">KAB/KOTA & PROVINSI</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold">KABUPATEN BANDUNG, JAWA BARAT</td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">PERIODE</td>
                                    <td>:</td>
                                    <td class="fw-bold text-primary"><?php echo strtoupper($months[intval($selected_bulan)]) . ' ' . $selected_tahun; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tabel List Data Ringkas -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center gs-4 gy-3 fs-6 border-gray-300">
                        <thead class="bg-primary text-white fw-bolder">
                            <tr>
                                <th class="text-center align-middle" style="width: 50px;">NO</th>
                                <th class="text-start align-middle" style="min-width: 160px;">NAMA DUSUN / LINGKUNGAN</th>
                                <th class="text-center align-middle">RW / RT / DSW</th>
                                <th class="text-center align-middle">IBU HAMIL</th>
                                <th class="text-center align-middle">MELAHIRKAN</th>
                                <th class="text-center align-middle">NIFAS</th>
                                <th class="text-center align-middle">BAYI LAHIR</th>
                                <th class="text-center align-middle">MENINGGAL (IBU/BAYI/BALITA)</th>
                                <th class="text-center align-middle">KETERANGAN</th>
                                <th class="text-center align-middle" style="min-width: 220px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($catatan_ibu_bayi)): 
                                $no = 1;
                                foreach ($catatan_ibu_bayi as $item): 
                                    $bayi_lahir = $item->bayi_lahir_l + $item->bayi_lahir_p;
                                    $meninggal_total = $item->ibu_meninggal + $item->bayi_meninggal_l + $item->bayi_meninggal_p + $item->balita_meninggal_l + $item->balita_meninggal_p;
                                    $item_json = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-dark">
                                        <i class="fa fa-map-marker text-danger me-2"></i><?php echo htmlspecialchars(!empty($item->nama_dusun) ? $item->nama_dusun : ($info_desa ? $info_desa->Nama_Desa : '-')); ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-primary fw-bold"><?php echo $item->jml_rw; ?> RW</span>
                                        <span class="badge badge-light-info fw-bold"><?php echo $item->jml_rt; ?> RT</span>
                                        <span class="badge badge-light-warning fw-bold"><?php echo $item->jml_dasawisma; ?> DSW</span>
                                    </td>
                                    <td class="fw-bolder"><?php echo number_format($item->ibu_hamil, 0, ',', '.'); ?></td>
                                    <td class="fw-bolder"><?php echo number_format($item->ibu_melahirkan, 0, ',', '.'); ?></td>
                                    <td class="fw-bolder"><?php echo number_format($item->ibu_nifas, 0, ',', '.'); ?></td>
                                    <td>
                                        <span class="fw-bolder text-success"><?php echo number_format($bayi_lahir, 0, ',', '.'); ?> Bayi</span>
                                        <div class="text-muted fs-8">(L: <?php echo $item->bayi_lahir_l; ?>, P: <?php echo $item->bayi_lahir_p; ?>)</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bolder"><?php echo $meninggal_total; ?> Jiwa</span>
                                    </td>
                                    <td class="text-start fs-7"><?php echo htmlspecialchars($item->keterangan ? $item->keterangan : '-'); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                            <button type="button" class="btn btn-sm btn-primary px-2 py-1 fw-bold fs-8" title="Lihat Detail Lengkap 18 Kolom" onclick='openModalDetail6(<?php echo $item_json; ?>)'>
                                                <i class="fa fa-eye me-1"></i> Detail
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning px-2 py-1 fw-bold text-dark fs-8" title="Update Data" onclick='openModalEdit6(<?php echo $item_json; ?>)'>
                                                <i class="fa fa-edit me-1"></i> Update
                                            </button>
                                            <a href="<?php echo site_url("sip/sip6_delete/{$item->id}?kec_id={$selected_kec}&desa_id={$selected_desa}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-danger px-2 py-1 fw-bold fs-8" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash me-1"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center py-10 text-muted">
                                    <i class="fa fa-folder-open-o fa-3x mb-3 text-gray-400"></i>
                                    <p class="fs-6 fw-bold mb-2">Belum ada data catatan ibu hamil & bayi untuk periode ini.</p>
                                    <button type="button" class="btn btn-sm btn-primary fw-bolder" onclick="openModalTambah6()">
                                        <i class="fa fa-plus me-1"></i> Input Data Baru
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL DETAIL LENGKAP 18 KOLOM                            -->
<!-- ======================================================== -->
<div class="modal fade" id="modal_detail_sip6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark py-4">
                <h4 class="modal-title text-white fw-bolder" id="detail6_modal_title">
                    <i class="fa fa-file-text-o text-white me-2"></i> Detail Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita
                </h4>
                <button type="button" class="btn btn-icon btn-sm btn-active-light-primary text-white ms-auto" data-bs-dismiss="modal">
                    <i class="fa fa-times text-white"></i>
                </button>
            </div>
            <div class="modal-body py-6 px-8">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center gs-2 gy-2 fs-7 border-gray-400">
                        <thead class="bg-secondary text-dark fw-bolder align-middle">
                            <tr>
                                <th rowspan="3" style="min-width: 130px;">NAMA DUSUN / LINGKUNGAN</th>
                                <th colspan="3">JUMLAH</th>
                                <th colspan="4">JUMLAH IBU</th>
                                <th colspan="6">JUMLAH BAYI</th>
                                <th colspan="2" rowspan="2">JML BALITA MENINGGAL</th>
                                <th rowspan="3" style="min-width: 100px;">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th rowspan="2">RW</th>
                                <th rowspan="2">RT</th>
                                <th rowspan="2">DASA WISMA</th>
                                <th rowspan="2">HAMIL</th>
                                <th rowspan="2">MELAHIRKAN</th>
                                <th rowspan="2">NIFAS</th>
                                <th rowspan="2">MENINGGAL</th>
                                <th colspan="2">LAHIR</th>
                                <th colspan="2">AKTE KELAHIRAN</th>
                                <th colspan="2">MENINGGAL</th>
                            </tr>
                            <tr>
                                <th>L</th><th>P</th><th>ADA</th><th>TIDAK ADA</th><th>L</th><th>P</th><th>L</th><th>P</th>
                            </tr>
                            <tr class="bg-light-dark text-muted fs-8">
                                <?php for ($c = 2; $c <= 18; $c++): ?>
                                    <th><?php echo $c; ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody id="detail6_table_body"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-light py-3">
                <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL FORM CRUD CATATAN IBU HAMIL & BAYI   -->
<!-- ========================================== -->
<div class="modal fade" id="modal_form_sip6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="<?php echo site_url('sip/sip6_save'); ?>" method="post" id="form_sip6">
                <input type="hidden" name="id" id="crud6_id" value="" />
                <input type="hidden" name="kec_id" value="<?php echo $selected_kec; ?>" />
                <input type="hidden" name="desa_id" value="<?php echo $selected_desa; ?>" />

                <div class="modal-header bg-primary py-4">
                    <h4 class="modal-title text-white fw-bolder" id="modal_title_sip6">
                        <i class="fa fa-edit text-white me-2"></i> Form Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita
                    </h4>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary text-white ms-auto" data-bs-dismiss="modal">
                        <i class="fa fa-times text-white"></i>
                    </button>
                </div>

                <div class="modal-body py-6 px-8">
                    <!-- Section 1: Wilayah & Periode -->
                    <div class="bg-light p-4 rounded mb-5 border border-gray-300">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="fs-7 fw-bold text-muted mb-1">Desa / Kelurahan (Master)</label>
                                <input type="text" class="form-control form-control-sm form-control-solid fw-bold" value="<?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?>" readonly />
                            </div>
                            <div class="col-md-3">
                                <label class="fs-7 fw-bold mb-1">Nama Dusun / Lingkungan</label>
                                <input type="text" class="form-control form-control-sm form-control-solid" name="nama_dusun" id="crud6_nama_dusun" placeholder="Contoh: Dusun 1 / Lingkungan" />
                            </div>
                            <div class="col-md-3">
                                <label class="required fs-7 fw-bold mb-1">Bulan</label>
                                <select class="form-select form-select-sm form-select-solid" name="bulan" id="crud6_bulan" required>
                                    <?php foreach ($months as $num => $name): ?>
                                        <option value="<?php echo $num; ?>" <?php echo $selected_bulan == $num ? 'selected' : ''; ?>>
                                            <?php echo $name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="required fs-7 fw-bold mb-1">Tahun</label>
                                <select class="form-select form-select-sm form-select-solid" name="tahun" id="crud6_tahun" required>
                                    <?php foreach ($years as $yr): ?>
                                        <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                            <?php echo $yr; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Master Wilayah & Jumlah Ibu -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-5">
                            <div class="card card-bordered h-100">
                                <div class="card-header bg-light-primary py-2 min-h-40px">
                                    <h5 class="card-title fs-6 fw-bolder text-primary mb-0">1. Jumlah Wilayah (Master)</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">RW</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="jml_rw" id="crud6_jml_rw" min="0" value="<?php echo $master_counts->jml_rw; ?>" />
                                        </div>
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">RT</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="jml_rt" id="crud6_jml_rt" min="0" value="<?php echo $master_counts->jml_rt; ?>" />
                                        </div>
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">Dasa Wisma</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="jml_dasawisma" id="crud6_jml_dasawisma" min="0" value="<?php echo $master_counts->jml_dasawisma; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="card card-bordered h-100">
                                <div class="card-header bg-light-info py-2 min-h-40px">
                                    <h5 class="card-title fs-6 fw-bolder text-info mb-0">2. Jumlah Ibu</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-2">
                                        <div class="col-3">
                                            <label class="fs-7 fw-bold">Hamil</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_hamil" id="crud6_ibu_hamil" min="0" value="0" />
                                        </div>
                                        <div class="col-3">
                                            <label class="fs-7 fw-bold">Melahirkan</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_melahirkan" id="crud6_ibu_melahirkan" min="0" value="0" />
                                        </div>
                                        <div class="col-3">
                                            <label class="fs-7 fw-bold">Nifas</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_nifas" id="crud6_ibu_nifas" min="0" value="0" />
                                        </div>
                                        <div class="col-3">
                                            <label class="fs-7 fw-bold">Meninggal</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_meninggal" id="crud6_ibu_meninggal" min="0" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Jumlah Bayi & Balita Meninggal -->
                    <div class="card card-bordered mb-4">
                        <div class="card-header bg-light-warning py-2 min-h-40px">
                            <h5 class="card-title fs-6 fw-bolder text-warning mb-0">3. Jumlah Bayi, Kematian Balita & Keterangan</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Bayi Lahir (L)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_lahir_l" id="crud6_bayi_lahir_l" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Bayi Lahir (P)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_lahir_p" id="crud6_bayi_lahir_p" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Akte Ada</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_akte_ada" id="crud6_bayi_akte_ada" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Akte Tidak Ada</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_akte_tidak" id="crud6_bayi_akte_tidak" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Bayi Meninggal (L)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_meninggal_l" id="crud6_bayi_meninggal_l" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Bayi Meninggal (P)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="bayi_meninggal_p" id="crud6_bayi_meninggal_p" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Balita Meninggal (L)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="balita_meninggal_l" id="crud6_balita_meninggal_l" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold">Balita Meninggal (P)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="balita_meninggal_p" id="crud6_balita_meninggal_p" min="0" value="0" />
                                </div>
                                <div class="col-md-8">
                                    <label class="fs-7 fw-bold">Keterangan</label>
                                    <input type="text" class="form-control form-control-sm form-control-solid" name="keterangan" id="crud6_keterangan" placeholder="Catatan tambahan (opsional)" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary fw-bolder">
                        <i class="fa fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModalDetail6(item) {
    var namaWilayah = item.nama_dusun ? item.nama_dusun : '<?php echo htmlspecialchars($info_desa ? $info_desa->Nama_Desa : "-"); ?>';
    document.getElementById('detail6_modal_title').innerHTML = '<i class="fa fa-file-text-o text-white me-2"></i> Detail Catatan: ' + namaWilayah;

    var htmlTable = '<tr>' +
        '<td class="text-start fw-bold">' + namaWilayah + '</td>' +
        '<td>' + item.jml_rw + '</td>' +
        '<td>' + item.jml_rt + '</td>' +
        '<td>' + item.jml_dasawisma + '</td>' +
        '<td>' + item.ibu_hamil + '</td>' +
        '<td>' + item.ibu_melahirkan + '</td>' +
        '<td>' + item.ibu_nifas + '</td>' +
        '<td>' + item.ibu_meninggal + '</td>' +
        '<td>' + item.bayi_lahir_l + '</td>' +
        '<td>' + item.bayi_lahir_p + '</td>' +
        '<td>' + item.bayi_akte_ada + '</td>' +
        '<td>' + item.bayi_akte_tidak + '</td>' +
        '<td>' + item.bayi_meninggal_l + '</td>' +
        '<td>' + item.bayi_meninggal_p + '</td>' +
        '<td>' + item.balita_meninggal_l + '</td>' +
        '<td>' + item.balita_meninggal_p + '</td>' +
        '<td class="text-start">' + (item.keterangan || '-') + '</td>' +
    '</tr>';
    document.getElementById('detail6_table_body').innerHTML = htmlTable;

    var modal = new bootstrap.Modal(document.getElementById('modal_detail_sip6'));
    modal.show();
}

function openModalTambah6() {
    document.getElementById('form_sip6').reset();
    document.getElementById('crud6_id').value = '';
    document.getElementById('crud6_jml_rw').value = '<?php echo $master_counts->jml_rw; ?>';
    document.getElementById('crud6_jml_rt').value = '<?php echo $master_counts->jml_rt; ?>';
    document.getElementById('crud6_jml_dasawisma').value = '<?php echo $master_counts->jml_dasawisma; ?>';
    document.getElementById('modal_title_sip6').innerHTML = '<i class="fa fa-plus text-white me-2"></i> Input Data Catatan Ibu Hamil & Bayi';
    var modal = new bootstrap.Modal(document.getElementById('modal_form_sip6'));
    modal.show();
}

function openModalEdit6(item) {
    document.getElementById('form_sip6').reset();
    document.getElementById('crud6_id').value = item.id;
    document.getElementById('crud6_nama_dusun').value = item.nama_dusun || '';
    document.getElementById('crud6_bulan').value = item.bulan;
    document.getElementById('crud6_tahun').value = item.tahun;

    document.getElementById('crud6_jml_rw').value = item.jml_rw || 0;
    document.getElementById('crud6_jml_rt').value = item.jml_rt || 0;
    document.getElementById('crud6_jml_dasawisma').value = item.jml_dasawisma || 0;

    document.getElementById('crud6_ibu_hamil').value = item.ibu_hamil || 0;
    document.getElementById('crud6_ibu_melahirkan').value = item.ibu_melahirkan || 0;
    document.getElementById('crud6_ibu_nifas').value = item.ibu_nifas || 0;
    document.getElementById('crud6_ibu_meninggal').value = item.ibu_meninggal || 0;

    document.getElementById('crud6_bayi_lahir_l').value = item.bayi_lahir_l || 0;
    document.getElementById('crud6_bayi_lahir_p').value = item.bayi_lahir_p || 0;
    document.getElementById('crud6_bayi_akte_ada').value = item.bayi_akte_ada || 0;
    document.getElementById('crud6_bayi_akte_tidak').value = item.bayi_akte_tidak || 0;
    document.getElementById('crud6_bayi_meninggal_l').value = item.bayi_meninggal_l || 0;
    document.getElementById('crud6_bayi_meninggal_p').value = item.bayi_meninggal_p || 0;
    document.getElementById('crud6_balita_meninggal_l').value = item.balita_meninggal_l || 0;
    document.getElementById('crud6_balita_meninggal_p').value = item.balita_meninggal_p || 0;
    document.getElementById('crud6_keterangan').value = item.keterangan || '';

    document.getElementById('modal_title_sip6').innerHTML = '<i class="fa fa-edit text-white me-2"></i> Update Catatan Ibu Hamil & Bayi';
    var modal = new bootstrap.Modal(document.getElementById('modal_form_sip6'));
    modal.show();
}
</script>
