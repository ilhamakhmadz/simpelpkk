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
            <div class="card-body">
                <form action="<?php echo site_url('sip/sip7'); ?>" method="get" class="form row align-items-end g-3">
                    <!-- Posyandu Selector -->
                    <div class="col-md-5">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Pilih Posyandu</label>
                        <select class="form-select form-select-solid" name="posyandu_id" required>
                            <option value="">-- Pilih Posyandu --</option>
                            <?php foreach ($posyandu_list as $pos): ?>
                                <option value="<?php echo $pos->id; ?>" <?php echo $selected_posyandu == $pos->id ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($pos->nama_posyandu); ?> (Desa: <?php echo htmlspecialchars($pos->Nama_Desa); ?>, RW: <?php echo htmlspecialchars($pos->rw); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Bulan Selector -->
                    <div class="col-md-3">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Pilih Bulan</label>
                        <select class="form-select form-select-solid" name="bulan" required>
                            <?php foreach ($months as $num => $name): ?>
                                <option value="<?php echo $num; ?>" <?php echo $selected_bulan == $num ? 'selected' : ''; ?>>
                                    <?php echo $name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tahun Selector -->
                    <div class="col-md-2">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Pilih Tahun</label>
                        <select class="form-select form-select-solid" name="tahun" required>
                            <?php foreach ($years as $yr): ?>
                                <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                    <?php echo $yr; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary fw-bolder">
                            <i class="fa fa-search me-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (empty($selected_posyandu)): ?>
            <!-- Blank State -->
            <div class="card mb-5 mb-xl-8 shadow-sm">
                <div class="card-body text-center py-20 text-muted">
                    <i class="fa fa-heartbeat fa-5x text-light-danger mb-5"></i>
                    <h3 class="text-dark fw-bolder">Rekapitulasi Hasil Kegiatan Posyandu (SIP 7)</h3>
                    <p class="fs-6 text-gray-600 mt-2">Silakan pilih Posyandu, Bulan, dan Tahun pada filter di atas untuk menampilkan laporan kegiatan.</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Posyandu Info Banner -->
            <?php if ($posyandu_details): ?>
                <div class="card mb-5 mb-xl-8 shadow-sm border-start border-primary border-4">
                    <div class="card-body py-5">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="text-dark fw-bolder mb-1">
                                    <i class="fa fa-hospital-o text-primary me-2"></i><?php echo htmlspecialchars($posyandu_details->nama_posyandu); ?>
                                </h3>
                                <div class="text-muted fs-7">
                                    Kecamatan: <strong><?php echo htmlspecialchars($posyandu_details->Nama_Kecamatan); ?></strong> | 
                                    Desa: <strong><?php echo htmlspecialchars($posyandu_details->Nama_Desa); ?></strong> | 
                                    Dusun: <strong><?php echo htmlspecialchars($posyandu_details->nama_dusun ? $posyandu_details->nama_dusun : '-'); ?></strong> | 
                                    RW: <strong><?php echo htmlspecialchars($posyandu_details->rw); ?></strong><?php echo $posyandu_details->rt ? ' | RT: <strong>'.htmlspecialchars($posyandu_details->rt).'</strong>' : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <span class="badge badge-light-primary fw-bolder fs-7 px-3 py-2 me-2">Jenis: <?php echo $posyandu_details->jenis_posyandu; ?></span>
                                <span class="badge badge-light-success fw-bolder fs-7 px-3 py-2">Kader: <?php echo $posyandu_details->jumlah_kader; ?> Orang</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Kegiatan Table Card -->
            <div class="card mb-5 mb-xl-8 shadow-sm">
                <!-- Card Header -->
                <div class="card-header border-0 pt-5 align-items-center">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 text-dark">
                            Rekapitulasi Layanan Bulan: <?php echo $months[intval($selected_bulan)]; ?> <?php echo $selected_tahun; ?>
                        </span>
                        <span class="text-muted mt-1 fw-bold fs-7">Format Laporan Lampiran 4.14.4e Standar PKK</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-light mb-0 me-4">
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 active fw-bolder me-2" data-bs-toggle="tab" href="#tab_detail">Data Detail</a>
                            </li>
                            <?php if ($user_level <= 5 && !empty($recap_dusun)): ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#tab_dusun">Rekap Dusun</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($user_level <= 4 && !empty($recap_desa)): ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#tab_desa">Rekap Desa</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($user_level <= 3 && !empty($recap_kecamatan)): ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#tab_kecamatan">Rekap Kec</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    
                        <?php if ($can_write): ?>
                            <button type="button" class="btn btn-primary fw-bolder me-3" data-bs-toggle="modal" data-bs-target="#modal_entry_kegiatan">
                                <i class="fa fa-edit me-2"></i> Input / Update Kegiatan
                            </button>
                        <?php endif; ?>
                        
                        <a href="<?php echo site_url("sip/sip7_pdf?posyandu_id={$selected_posyandu}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-light-danger fw-bolder">
                            <i class="fa fa-file-pdf-o me-2"></i> Cetak PDF
                        </a>
                    </div>
                </div>

                <!-- Table Body -->
                <div class="card-body py-3">
                    <div class="tab-content">
                        
                        <!-- TAB DETAIL -->
                        <div class="tab-pane fade show active" id="tab_detail" role="tabpanel">
                            <div class="table-responsive">
                                <table id="sip7Table" class="table table-bordered table-striped align-middle text-center gy-4 gs-7">
                            <thead>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                    <th rowspan="2" class="align-middle min-w-50px text-center">No</th>
                                    <th rowspan="2" class="align-middle min-w-200px text-start">Jenis Layanan / Kegiatan</th>
                                    <th rowspan="2" class="align-middle min-w-100px text-center">Frekuensi Pelayanan</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Jumlah Pengunjung</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Petugas / Kader Hadir</th>
                                    <th rowspan="2" class="align-middle min-w-150px text-start">Keterangan</th>
                                </tr>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase bg-light">
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($activities as $act): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo $no++; ?></td>
                                        <td class="text-start fw-bold text-dark">
                                            <i class="fa fa-check-circle text-primary me-2"></i><?php echo htmlspecialchars($act['jenis_kegiatan']); ?>
                                        </td>
                                        <td class="fw-bold fs-6 text-primary"><?php echo $act['frekuensi']; ?> kali</td>
                                        <td class="fs-6"><?php echo $act['pengunjung_l']; ?></td>
                                        <td class="fs-6"><?php echo $act['pengunjung_p']; ?></td>
                                        <td class="fs-6"><?php echo $act['petugas_l']; ?></td>
                                        <td class="fs-6"><?php echo $act['petugas_p']; ?></td>
                                        <td class="text-start text-muted fs-7"><?php echo htmlspecialchars($act['keterangan'] ? $act['keterangan'] : '-'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- TAB DUSUN -->
                <?php if ($user_level <= 5 && !empty($recap_dusun)): ?>
                <div class="tab-pane fade" id="tab_dusun" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center gy-4 gs-7 dataTable-recap-sip7">
                            <thead>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                    <th rowspan="2" class="align-middle min-w-50px text-center">No</th>
                                    <th rowspan="2" class="align-middle min-w-150px text-start">Wilayah</th>
                                    <th rowspan="2" class="align-middle min-w-100px text-center">Total Frekuensi</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Pengunjung</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Petugas</th>
                                </tr>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase bg-light">
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($recap_dusun as $r): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                    <td class="fw-bold fs-6 text-primary"><?php echo $r->sum_frekuensi; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_p; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_p; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>

                <!-- TAB DESA -->
                <?php if ($user_level <= 4 && !empty($recap_desa)): ?>
                <div class="tab-pane fade" id="tab_desa" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center gy-4 gs-7 dataTable-recap-sip7">
                            <thead>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                    <th rowspan="2" class="align-middle min-w-50px text-center">No</th>
                                    <th rowspan="2" class="align-middle min-w-150px text-start">Wilayah</th>
                                    <th rowspan="2" class="align-middle min-w-100px text-center">Total Frekuensi</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Pengunjung</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Petugas</th>
                                </tr>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase bg-light">
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($recap_desa as $r): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                    <td class="fw-bold fs-6 text-primary"><?php echo $r->sum_frekuensi; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_p; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_p; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>

                <!-- TAB KECAMATAN -->
                <?php if ($user_level <= 3 && !empty($recap_kecamatan)): ?>
                <div class="tab-pane fade" id="tab_kecamatan" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center gy-4 gs-7 dataTable-recap-sip7">
                            <thead>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                    <th rowspan="2" class="align-middle min-w-50px text-center">No</th>
                                    <th rowspan="2" class="align-middle min-w-150px text-start">Wilayah</th>
                                    <th rowspan="2" class="align-middle min-w-100px text-center">Total Frekuensi</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Pengunjung</th>
                                    <th colspan="2" class="min-w-150px text-center border-bottom">Total Petugas</th>
                                </tr>
                                <tr class="fw-bolder fs-7 text-gray-800 text-uppercase bg-light">
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                    <th class="border-top text-center min-w-75px">L</th>
                                    <th class="border-top text-center min-w-75px">P</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($recap_kecamatan as $r): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                    <td class="fw-bold fs-6 text-primary"><?php echo $r->sum_frekuensi; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_pengunjung_p; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_l; ?></td>
                                    <td class="fs-6"><?php echo $r->sum_petugas_p; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

            <!-- Visualization Charts Card -->
            <div class="card mb-5 mb-xl-8 shadow-sm">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 text-dark"><i class="fa fa-bar-chart text-success me-2"></i>Visualisasi Data Kegiatan Bulanan</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Grafik analisis komparatif jumlah pengunjung dan petugas</span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="height: 350px; position: relative;">
                                <canvas id="chartActivities"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($can_write && !empty($selected_posyandu)): ?>
    <!-- Modal Entry / Update Kegiatan -->
    <div class="modal fade" id="modal_entry_kegiatan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded shadow-lg">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fa fa-times fs-4"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="<?php echo site_url('sip/sip7_save'); ?>" method="post" class="form">
                        <input type="hidden" name="posyandu_id" value="<?php echo $selected_posyandu; ?>" />
                        <input type="hidden" name="bulan" value="<?php echo $selected_bulan; ?>" />
                        <input type="hidden" name="tahun" value="<?php echo $selected_tahun; ?>" />

                        <div class="mb-13 text-center">
                            <h1 class="mb-3 text-primary"><i class="fa fa-edit text-primary me-2"></i>Input Kegiatan Bulanan Posyandu</h1>
                            <div class="text-muted fw-bold fs-5">
                                Posyandu: <strong class="text-dark"><?php echo htmlspecialchars($posyandu_details->nama_posyandu); ?></strong> | 
                                Periode: <strong class="text-primary"><?php echo $months[intval($selected_bulan)]; ?> <?php echo $selected_tahun; ?></strong>
                            </div>
                        </div>

                        <!-- Info Alert -->
                        <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0">
                                <i class="fa fa-info-circle fa-2x text-primary"></i>
                            </span>
                            <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
                                <h4 class="fw-bold text-primary">Petunjuk Pengisian</h4>
                                <span>Silakan isikan data frekuensi pelayanan, jumlah pengunjung laki-laki/perempuan, jumlah petugas kader pendamping laki-laki/perempuan, beserta keterangan jika ada, untuk masing-masing dari 6 Layanan Standar di bawah ini.</span>
                            </div>
                        </div>

                        <!-- Kegiatan Row Inputs -->
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle text-center gy-4 gs-5">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-uppercase bg-light">
                                        <th class="text-start min-w-250px">Jenis Layanan / Kegiatan</th>
                                        <th class="min-w-80px">Frekuensi</th>
                                        <th class="min-w-80px">Pengunjung (L)</th>
                                        <th class="min-w-80px">Pengunjung (P)</th>
                                        <th class="min-w-80px">Petugas (L)</th>
                                        <th class="min-w-80px">Petugas (P)</th>
                                        <th class="min-w-180px text-start">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($activities as $act): ?>
                                        <tr>
                                            <td class="text-start fw-bold text-gray-800 fs-6">
                                                <i class="fa fa-caret-right text-primary me-2"></i><?php echo htmlspecialchars($act['jenis_kegiatan']); ?>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-solid text-center" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][frekuensi]" 
                                                       min="0" value="<?php echo $act['frekuensi']; ?>" required />
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-solid text-center" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][pengunjung_l]" 
                                                       min="0" value="<?php echo $act['pengunjung_l']; ?>" required />
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-solid text-center" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][pengunjung_p]" 
                                                       min="0" value="<?php echo $act['pengunjung_p']; ?>" required />
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-solid text-center" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][petugas_l]" 
                                                       min="0" value="<?php echo $act['petugas_l']; ?>" required />
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-solid text-center" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][petugas_p]" 
                                                       min="0" value="<?php echo $act['petugas_p']; ?>" required />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-solid text-start" 
                                                       name="kegiatan[<?php echo str_replace(' ', '_', $act['jenis_kegiatan']); ?>][keterangan]" 
                                                       value="<?php echo htmlspecialchars($act['keterangan'] ? $act['keterangan'] : '-'); ?>" placeholder="Keterangan tambahan..." />
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Actions -->
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary px-8">
                                <span class="indicator-label"><i class="fa fa-save me-2"></i>Simpan Kegiatan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Chart rendering script -->
<?php if (!empty($selected_posyandu) && !empty($activities)): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const activitiesData = <?php echo json_encode($activities); ?>;
        
        const labels = activitiesData.map(item => item.jenis_kegiatan);
        const dataPengunjungL = activitiesData.map(item => parseInt(item.pengunjung_l));
        const dataPengunjungP = activitiesData.map(item => parseInt(item.pengunjung_p));
        const dataPetugasL = activitiesData.map(item => parseInt(item.petugas_l));
        const dataPetugasP = activitiesData.map(item => parseInt(item.petugas_p));
        const dataFrekuensi = activitiesData.map(item => parseInt(item.frekuensi));

        const ctx = document.getElementById('chartActivities').getContext('2d');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Pengunjung Laki-Laki',
                        data: dataPengunjungL,
                        backgroundColor: 'rgba(54, 162, 235, 0.75)', // Elegant blue
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1,
                        borderRadius: 4
                    },
                    {
                        label: 'Pengunjung Perempuan',
                        data: dataPengunjungP,
                        backgroundColor: 'rgba(255, 99, 132, 0.75)', // Rose pink
                        borderColor: 'rgb(255, 99, 132)',
                        borderWidth: 1,
                        borderRadius: 4
                    },
                    {
                        label: 'Petugas / Kader (Total)',
                        data: dataPetugasL.map((val, idx) => val + dataPetugasP[idx]),
                        backgroundColor: 'rgba(153, 102, 255, 0.75)', // Purple
                        borderColor: 'rgb(153, 102, 255)',
                        borderWidth: 1,
                        borderRadius: 4
                    },
                    {
                        label: 'Frekuensi Layanan',
                        data: dataFrekuensi,
                        backgroundColor: 'rgba(75, 192, 192, 0.75)', // Teal
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth: 1,
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                family: 'Inter, sans-serif',
                                size: 12,
                                weight: 'bold'
                            },
                            color: '#181C32'
                        }
                    },
                    tooltip: {
                        padding: 12,
                        cornerRadius: 8,
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 10,
                                weight: 'bold'
                            },
                            color: '#5E6278'
                        }
                    },
                    y: {
                        grid: {
                            borderDash: [5, 5],
                            color: '#E4E6EF'
                        },
                        ticks: {
                            beginAtZero: true,
                            font: {
                                size: 11
                            },
                            color: '#5E6278'
                        }
                    }
                }
            }
        });
    });
</script>
<?php endif; ?>
