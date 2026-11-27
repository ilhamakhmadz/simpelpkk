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

        <!-- Filter Card -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Filter Wilayah, Bulan & Tahun</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Rekapitulasi Data/Buku Catatan Ibu Hamil, Melahirkan, Nifas, Ibu Meninggal, Kelahiran Bayi, Bayi Meninggal dan Kematian Balita — TP PKK Kecamatan (Lampiran 4.19b)</span>
                </h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('sip/sip6'); ?>" method="get" class="form row align-items-end g-3">
                    <?php if ($user_level < 3): ?>
                        <div class="col-md-4">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Kecamatan</label>
                            <select class="form-select form-select-solid" name="kec_id" onchange="this.form.submit()">
                                <?php foreach ($kecamatan_list as $kec): ?>
                                    <option value="<?php echo $kec->Kd_Kec; ?>" <?php echo $selected_kec == $kec->Kd_Kec ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($kec->Nama_Kecamatan); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="<?php echo ($user_level < 3) ? 'col-md-3' : 'col-md-5'; ?>">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Bulan</label>
                        <select class="form-select form-select-solid" name="bulan">
                            <?php foreach ($months as $num => $name): ?>
                                <option value="<?php echo $num; ?>" <?php echo $selected_bulan == $num ? 'selected' : ''; ?>>
                                    <?php echo $name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="<?php echo ($user_level < 3) ? 'col-md-2' : 'col-md-4'; ?>">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Tahun</label>
                        <select class="form-select form-select-solid" name="tahun">
                            <?php foreach ($years as $yr): ?>
                                <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                    <?php echo $yr; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="<?php echo ($user_level < 3) ? 'col-md-3' : 'col-md-3'; ?> d-grid">
                        <button type="submit" class="btn btn-primary fw-bolder">
                            <i class="fa fa-search me-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Main Card -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-4 mb-1">
                        REKAPITULASI DATA/BUKU CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, BAYI & BALITA
                    </span>
                    <span class="text-muted mt-1 fw-bold fs-7">
                        KECAMATAN: <strong class="text-primary"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></strong> |
                        BULAN: <strong class="text-dark"><?php echo strtoupper($months[intval($selected_bulan)]); ?></strong> |
                        TAHUN: <strong class="text-primary"><?php echo $selected_tahun; ?></strong>
                    </span>
                </div>
                <div class="card-toolbar d-flex align-items-center gap-2">
                    <a href="<?php echo site_url("sip/rekap_ibu_bayi_kecamatan_excel?kec_id={$selected_kec}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-light-success fw-bolder">
                        <i class="fa fa-file-excel-o me-1"></i> Cetak Excel
                    </a>
                    <a href="<?php echo site_url("sip/rekap_ibu_bayi_kecamatan_pdf?kec_id={$selected_kec}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-sm btn-light-danger fw-bolder">
                        <i class="fa fa-file-pdf-o me-1"></i> Cetak PDF
                    </a>
                </div>
            </div>

            <div class="card-body py-4">
                <!-- Header Metadata -->
                <div class="mb-5 p-4 bg-light rounded border border-gray-300">
                    <div class="row fs-6">
                        <div class="col-md-6">
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <td style="width: 170px;" class="fw-bolder">KAB / KOTA</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold">KABUPATEN BANDUNG</td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">KECAMATAN</td>
                                    <td>:</td>
                                    <td class="fw-bold text-primary"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <td style="width: 170px;" class="fw-bolder">PROVINSI</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold">JAWA BARAT</td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">BULAN / TAHUN</td>
                                    <td>:</td>
                                    <td class="fw-bold text-primary"><?php echo strtoupper($months[intval($selected_bulan)]) . ' ' . $selected_tahun; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tabel List Data Ringkas Tingkat Kecamatan -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle gs-4 gy-3 fs-6 border-gray-300">
                        <thead class="bg-primary text-white fw-bolder">
                            <tr>
                                <th class="text-center align-middle" style="width: 50px;">NO</th>
                                <th class="text-start align-middle" style="min-width: 180px;">NAMA DESA / KELURAHAN</th>
                                <th class="text-center align-middle">JUMLAH WILAYAH</th>
                                <th class="text-center align-middle">IBU HAMIL</th>
                                <th class="text-center align-middle">KELAHIRAN BAYI</th>
                                <th class="text-center align-middle">KEMATIAN (IBU/BAYI/BALITA)</th>
                                <th class="text-center align-middle" style="width: 180px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($rekap_kecamatan)):
                                $no = 1;
                                foreach ($rekap_kecamatan as $item):
                                    $bayi_lahir = $item->bayi_lahir_l + $item->bayi_lahir_p;
                                    $total_kematian = $item->ibu_meninggal + $item->bayi_meninggal_l + $item->bayi_meninggal_p + $item->balita_meninggal_l + $item->balita_meninggal_p;
                                    $item_json = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
                            ?>
                                <tr>
                                    <td class="text-center fw-bold"><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-dark">
                                        <i class="fa fa-building text-primary me-2"></i><?php echo htmlspecialchars($item->Nama_Desa); ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light-dark fw-bold"><?php echo $item->jml_dusun; ?> Dusun</span>
                                        <span class="badge badge-light-primary fw-bold"><?php echo $item->jml_rw; ?> RW</span>
                                        <span class="badge badge-light-info fw-bold"><?php echo $item->jml_rt; ?> RT</span>
                                        <span class="badge badge-light-warning fw-bold"><?php echo $item->jml_dasawisma; ?> DSW</span>
                                    </td>
                                    <td class="text-center fw-bolder text-primary fs-5">
                                        <?php echo number_format($item->ibu_hamil, 0, ',', '.'); ?> Orang
                                        <div class="text-muted fs-8 fw-normal">Lahir: <?php echo $item->ibu_melahirkan; ?> | Nifas: <?php echo $item->ibu_nifas; ?></div>
                                    </td>
                                    <td class="text-center">
                                        <span class="fw-bolder text-success fs-5"><?php echo number_format($bayi_lahir, 0, ',', '.'); ?> Bayi</span>
                                        <div class="text-muted fs-8">(L: <?php echo $item->bayi_lahir_l; ?> | P: <?php echo $item->bayi_lahir_p; ?>)</div>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($total_kematian > 0): ?>
                                            <span class="badge badge-light-danger fw-bolder fs-7"><?php echo $total_kematian; ?> Kasus</span>
                                            <div class="text-muted fs-8">(Ibu: <?php echo $item->ibu_meninggal; ?>, Bayi: <?php echo ($item->bayi_meninggal_l + $item->bayi_meninggal_p); ?>, Balita: <?php echo ($item->balita_meninggal_l + $item->balita_meninggal_p); ?>)</div>
                                        <?php else: ?>
                                            <span class="badge badge-light-success fw-bold">Nihil (0)</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                            <button type="button" class="btn btn-sm btn-primary px-3 py-1 fw-bold fs-8" title="Lihat Semua Data 19 Kolom" onclick='openModalDetailKec6(<?php echo $item_json; ?>)'>
                                                <i class="fa fa-eye me-1"></i> Detail
                                            </button>
                                            <a href="<?php echo site_url("sip/sip6_pdf?desa_id={$item->Kd_Desa}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-sm btn-light-danger px-2 py-1 fw-bold fs-8" title="Cetak PDF Desa">
                                                <i class="fa fa-file-pdf-o me-1"></i> PDF
                                            </a>
                                            <a href="<?php echo site_url("sip/sip6_excel?desa_id={$item->Kd_Desa}&bulan={$selected_bulan}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-light-success px-2 py-1 fw-bold fs-8" title="Cetak Excel Desa">
                                                <i class="fa fa-file-excel-o me-1"></i> XLS
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-10 text-muted">
                                    <i class="fa fa-folder-open-o fa-3x mb-3 text-gray-400"></i>
                                    <p class="fs-6 fw-bold mb-2">Belum ada data rekap ibu hamil & bayi dari Desa/Kelurahan di Kecamatan ini untuk periode ini.</p>
                                    <p class="fs-7 text-muted">Pastikan data sudah diinput di tingkat Desa/Kelurahan pada SIP 6 terlebih dahulu.</p>
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
<!-- MODAL DETAIL LENGKAP REKAP IBU BAYI KECAMATAN (19 Kolom) -->
<!-- ======================================================== -->
<div class="modal fade" id="modal_detail_kec6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark py-4">
                <h4 class="modal-title text-white fw-bolder" id="detail_kec6_modal_title">
                    <i class="fa fa-file-text-o text-white me-2"></i> Detail Rekap Catatan Ibu Hamil, Bayi & Balita
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
                                <th rowspan="3" style="min-width: 100px;">NAMA DESA / KEL</th>
                                <th rowspan="3">DUSUN/<br>LINGK</th>
                                <th rowspan="3">RW</th>
                                <th rowspan="3">RT</th>
                                <th rowspan="3">DASA<br>WISMA</th>
                                <th colspan="4">JUMLAH IBU</th>
                                <th colspan="6">JUMLAH BAYI</th>
                                <th colspan="2" rowspan="2">JML BALITA<br>MENINGGAL</th>
                                <th rowspan="3" style="min-width: 90px;">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th rowspan="2">HAMIL</th>
                                <th rowspan="2">MELAHIR<br>KAN</th>
                                <th rowspan="2">NIFAS</th>
                                <th rowspan="2">MENIN<br>GGAL</th>
                                <th colspan="2">LAHIR</th>
                                <th colspan="2">AKTE KELAHIRAN</th>
                                <th colspan="2">MENINGGAL</th>
                            </tr>
                            <tr>
                                <th>L</th><th>P</th>
                                <th>ADA</th><th>TIDAK</th>
                                <th>L</th><th>P</th>
                                <th>L</th><th>P</th>
                            </tr>
                            <tr class="bg-light-dark text-muted fs-8">
                                <?php for ($c = 2; $c <= 19; $c++): ?>
                                    <th><?php echo $c; ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody id="detail_kec6_table_body"></tbody>
                    </table>
                </div>

                <!-- Summary cards -->
                <div class="row g-3 mt-3" id="detail_kec6_cards"></div>
            </div>
            <div class="modal-footer bg-light py-3 d-flex justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <a id="btn_modal_pdf_desa" href="#" target="_blank" class="btn btn-sm btn-danger fw-bolder">
                        <i class="fa fa-file-pdf-o me-1"></i> Cetak PDF Desa
                    </a>
                    <a id="btn_modal_excel_desa" href="#" class="btn btn-sm btn-success fw-bolder">
                        <i class="fa fa-file-excel-o me-1"></i> Cetak Excel Desa
                    </a>
                </div>
                <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function openModalDetailKec6(item) {
    document.getElementById('detail_kec6_modal_title').innerHTML =
        '<i class="fa fa-file-text-o text-white me-2"></i> Detail Rekap: ' + item.Nama_Desa +
        ' (<?php echo strtoupper($months[intval($selected_bulan)]); ?> <?php echo $selected_tahun; ?>)';

    var pdfUrl = '<?php echo site_url("sip/sip6_pdf"); ?>?desa_id=' + item.Kd_Desa + '&bulan=<?php echo $selected_bulan; ?>&tahun=<?php echo $selected_tahun; ?>';
    var excelUrl = '<?php echo site_url("sip/sip6_excel"); ?>?desa_id=' + item.Kd_Desa + '&bulan=<?php echo $selected_bulan; ?>&tahun=<?php echo $selected_tahun; ?>';
    document.getElementById('btn_modal_pdf_desa').setAttribute('href', pdfUrl);
    document.getElementById('btn_modal_excel_desa').setAttribute('href', excelUrl);

    var htmlTable = '<tr>' +
        '<td class="text-start fw-bold">' + item.Nama_Desa + '</td>' +
        '<td>' + (item.jml_dusun || 0) + '</td>' +
        '<td>' + (item.jml_rw || 0) + '</td>' +
        '<td>' + (item.jml_rt || 0) + '</td>' +
        '<td>' + (item.jml_dasawisma || 0) + '</td>' +
        '<td>' + (item.ibu_hamil || 0) + '</td>' +
        '<td>' + (item.ibu_melahirkan || 0) + '</td>' +
        '<td>' + (item.ibu_nifas || 0) + '</td>' +
        '<td>' + (item.ibu_meninggal || 0) + '</td>' +
        '<td>' + (item.bayi_lahir_l || 0) + '</td>' +
        '<td>' + (item.bayi_lahir_p || 0) + '</td>' +
        '<td>' + (item.bayi_akte_ada || 0) + '</td>' +
        '<td>' + (item.bayi_akte_tidak || 0) + '</td>' +
        '<td>' + (item.bayi_meninggal_l || 0) + '</td>' +
        '<td>' + (item.bayi_meninggal_p || 0) + '</td>' +
        '<td>' + (item.balita_meninggal_l || 0) + '</td>' +
        '<td>' + (item.balita_meninggal_p || 0) + '</td>' +
        '<td>' + (item.keterangan || '-') + '</td>' +
        '</tr>';
    document.getElementById('detail_kec6_table_body').innerHTML = htmlTable;

    var totalBayiLahir = parseInt(item.bayi_lahir_l || 0) + parseInt(item.bayi_lahir_p || 0);
    var totalBayiMen   = parseInt(item.bayi_meninggal_l || 0) + parseInt(item.bayi_meninggal_p || 0);
    var totalBalitaMen = parseInt(item.balita_meninggal_l || 0) + parseInt(item.balita_meninggal_p || 0);

    var htmlCards =
        '<div class="col-md-3">' +
            '<div class="bg-light-info p-3 rounded text-center border border-info">' +
                '<div class="text-muted fs-7 fw-bold">IBU HAMIL</div>' +
                '<div class="fs-4 fw-bolder text-info">' + (item.ibu_hamil || 0) + ' Orang</div>' +
                '<div class="fs-8 text-gray-600">Melahirkan: ' + (item.ibu_melahirkan || 0) + ' | Nifas: ' + (item.ibu_nifas || 0) + '</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-danger p-3 rounded text-center border border-danger">' +
                '<div class="text-muted fs-7 fw-bold">IBU MENINGGAL</div>' +
                '<div class="fs-4 fw-bolder text-danger">' + (item.ibu_meninggal || 0) + ' Orang</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-success p-3 rounded text-center border border-success">' +
                '<div class="text-muted fs-7 fw-bold">BAYI LAHIR</div>' +
                '<div class="fs-4 fw-bolder text-success">' + totalBayiLahir + ' Bayi</div>' +
                '<div class="fs-8 text-gray-600">L: ' + (item.bayi_lahir_l || 0) + ' | P: ' + (item.bayi_lahir_p || 0) + '</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-warning p-3 rounded text-center border border-warning">' +
                '<div class="text-muted fs-7 fw-bold">BAYI & BALITA MENINGGAL</div>' +
                '<div class="fs-4 fw-bolder text-warning">' + (totalBayiMen + totalBalitaMen) + ' Jiwa</div>' +
                '<div class="fs-8 text-gray-600">Bayi: ' + totalBayiMen + ' | Balita: ' + totalBalitaMen + '</div>' +
            '</div>' +
        '</div>';
    document.getElementById('detail_kec6_cards').innerHTML = htmlCards;

    var modal = new bootstrap.Modal(document.getElementById('modal_detail_kec6'));
    modal.show();
}
</script>
