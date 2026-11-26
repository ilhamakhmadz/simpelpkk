<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <!-- Filter Card -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Filter Rekapitulasi Kecamatan</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Pilih Kecamatan dan Tahun untuk menampilkan Rekapitulasi Catatan Data dan Kegiatan Warga TP PKK Kecamatan</span>
                </h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('sip/rekap_kecamatan'); ?>" method="get" class="form row align-items-end g-3">
                    <?php if ($user_level < 3): ?>
                        <div class="col-md-5">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Kecamatan</label>
                            <select class="form-select form-select-solid" name="kec_id">
                                <?php foreach ($kecamatan_list as $kec): ?>
                                    <option value="<?php echo $kec->Kd_Kec; ?>" <?php echo $selected_kec == $kec->Kd_Kec ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($kec->Nama_Kecamatan); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="<?php echo ($user_level < 3) ? 'col-md-4' : 'col-md-8'; ?>">
                        <label class="fs-6 fw-bold text-gray-700 mb-2">Tahun</label>
                        <select class="form-select form-select-solid" name="tahun">
                            <?php foreach ($years as $yr): ?>
                                <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                    <?php echo $yr; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary fw-bolder">
                            <i class="fa fa-search me-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sheet Card (Tampilan List Ringkas Sama Seperti Desa) -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">
                        REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA TP PKK KECAMATAN
                    </span>
                    <span class="text-muted mt-1 fw-bold fs-7">
                        KECAMATAN: <strong class="text-primary"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></strong> | 
                        KAB/KOTA: <strong>BANDUNG</strong> | PROVINSI: <strong>JAWA BARAT</strong> | TAHUN: <strong class="text-primary"><?php echo $selected_tahun; ?></strong>
                    </span>
                </div>
                <div class="card-toolbar d-flex align-items-center gap-2">
                    <a href="<?php echo site_url("sip/rekap_kecamatan_excel?kec_id={$selected_kec}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-light-success fw-bolder">
                        <i class="fa fa-file-excel-o me-1"></i> Cetak Excel
                    </a>
                    <a href="<?php echo site_url("sip/rekap_kecamatan_pdf?kec_id={$selected_kec}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-sm btn-light-danger fw-bolder">
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
                                    <td style="width: 170px;" class="fw-bolder">TP PKK KECAMATAN</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold text-primary"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">KAB / KOTA</td>
                                    <td>:</td>
                                    <td class="fw-bold">KABUPATEN BANDUNG</td>
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
                                    <td class="fw-bolder">TAHUN</td>
                                    <td>:</td>
                                    <td class="fw-bold text-primary"><?php echo $selected_tahun; ?></td>
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
                                <th class="text-start align-middle" style="min-width: 160px;">NAMA TP PKK DESA / KEL</th>
                                <th class="text-center align-middle">JML DUSUN</th>
                                <th class="text-center align-middle">JUML RW</th>
                                <th class="text-center align-middle">JUML RT</th>
                                <th class="text-center align-middle">DASAWISMA</th>
                                <th class="text-center align-middle">JUML KK</th>
                                <th class="text-center align-middle">TOTAL WARGA</th>
                                <th class="text-center align-middle">RUMAH SEHAT</th>
                                <th class="text-center align-middle">KETERANGAN</th>
                                <th class="text-center align-middle" style="width: 120px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($rekap_kecamatan)): 
                                $no = 1;
                                $tot_dusun = 0; $tot_rw = 0; $tot_rt = 0; $tot_dasawisma = 0; $tot_kk = 0;
                                $tot_warga = 0; $tot_sehat = 0;

                                foreach ($rekap_kecamatan as $item): 
                                    $tot_dusun += $item->jml_dusun;
                                    $tot_rw += $item->jml_rw;
                                    $tot_rt += $item->jml_rt;
                                    $tot_dasawisma += $item->jml_dasawisma;
                                    $tot_kk += $item->jml_kk;
                                    $warga_desa = $item->total_l + $item->total_p;
                                    $tot_warga += $warga_desa;
                                    $tot_sehat += $item->sehat_layak_huni;

                                    $item_json = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-dark">
                                        <i class="fa fa-building text-primary me-2"></i><?php echo htmlspecialchars($item->Nama_Desa); ?>
                                    </td>
                                    <td><span class="badge badge-light-dark fw-bold fs-7"><?php echo number_format($item->jml_dusun, 0, ',', '.'); ?></span></td>
                                    <td><span class="badge badge-light-primary fw-bold fs-7"><?php echo number_format($item->jml_rw, 0, ',', '.'); ?> RW</span></td>
                                    <td><span class="badge badge-light-info fw-bold fs-7"><?php echo number_format($item->jml_rt, 0, ',', '.'); ?> RT</span></td>
                                    <td><span class="badge badge-light-warning fw-bold fs-7"><?php echo number_format($item->jml_dasawisma, 0, ',', '.'); ?></span></td>
                                    <td class="fw-bolder"><?php echo number_format($item->jml_kk, 0, ',', '.'); ?> KK</td>
                                    <td>
                                        <span class="fw-bolder text-dark"><?php echo number_format($warga_desa, 0, ',', '.'); ?> Jiwa</span>
                                        <div class="text-muted fs-8">(L: <?php echo $item->total_l; ?>, P: <?php echo $item->total_p; ?>)</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fw-bolder"><?php echo number_format($item->sehat_layak_huni, 0, ',', '.'); ?> Unit</span>
                                    </td>
                                    <td class="text-start fs-7"><?php echo htmlspecialchars($item->keterangan ? $item->keterangan : '-'); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary px-3 py-1 fw-bold fs-8" title="Lihat Detail Lengkap" onclick='openModalDetailKec(<?php echo $item_json; ?>)'>
                                            <i class="fa fa-eye me-1"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="bg-light-primary fw-bolder text-dark border-top-2 border-primary">
                            <tr>
                                <th colspan="2" class="text-center align-middle">JUMLAH</th>
                                <th><?php echo number_format($tot_dusun, 0, ',', '.'); ?></th>
                                <th><?php echo number_format($tot_rw, 0, ',', '.'); ?> RW</th>
                                <th><?php echo number_format($tot_rt, 0, ',', '.'); ?> RT</th>
                                <th><?php echo number_format($tot_dasawisma, 0, ',', '.'); ?></th>
                                <th><?php echo number_format($tot_kk, 0, ',', '.'); ?> KK</th>
                                <th><?php echo number_format($tot_warga, 0, ',', '.'); ?> Jiwa</th>
                                <th><?php echo number_format($tot_sehat, 0, ',', '.'); ?> Unit</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center py-10 text-muted">
                                    <i class="fa fa-folder-open-o fa-3x mb-3 text-gray-400"></i>
                                    <p class="fs-6 fw-bold">Belum ada data catatan kegiatan warga dari Desa/Kelurahan di Kecamatan ini untuk Tahun <?php echo $selected_tahun; ?>.</p>
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
<!-- MODAL DETAIL LENGKAP REKAP DESA DI KECAMATAN (34 KOLOM)  -->
<!-- ======================================================== -->
<div class="modal fade" id="modal_detail_kecamatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark py-4">
                <h4 class="modal-title text-white fw-bolder" id="detail_kec_modal_title">
                    <i class="fa fa-file-text-o text-white me-2"></i> Detail Rekapitulasi Desa/Kelurahan
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
                                <th rowspan="3" style="min-width: 130px;">NAMA TP PKK DESA / KEL</th>
                                <th rowspan="3">JML DUSUN</th>
                                <th rowspan="3">JUML RW</th>
                                <th rowspan="3">JUML RT</th>
                                <th rowspan="3">JUML DSW</th>
                                <th rowspan="3">JUML KRT</th>
                                <th rowspan="3">JUML KK</th>
                                <th colspan="11">JUMLAH ANGGOTA KELUARGA</th>
                                <th colspan="4">KRITERIA RUMAH</th>
                                <th colspan="4">SUMBER AIR KELUARGA</th>
                                <th rowspan="3">SARANA MCK</th>
                                <th colspan="2">MAKANAN POKOK</th>
                                <th colspan="4">WARGA MENGIKUTI KEGIATAN</th>
                                <th rowspan="3" style="min-width: 100px;">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th colspan="2">TOTAL</th>
                                <th colspan="2">BALITA</th>
                                <th rowspan="2">PUS</th>
                                <th rowspan="2">WUS</th>
                                <th rowspan="2">IBU HAMIL</th>
                                <th rowspan="2">IBU MENYUSUI</th>
                                <th rowspan="2">LANSIA</th>
                                <th colspan="2">3 BUTA</th>
                                <th rowspan="2">SEHAT</th>
                                <th rowspan="2">TDK SEHAT</th>
                                <th rowspan="2">TMP SAMPAH</th>
                                <th rowspan="2">SPAL</th>
                                <th rowspan="2">PDAM</th>
                                <th rowspan="2">SUMUR</th>
                                <th rowspan="2">SUNGAI</th>
                                <th rowspan="2">DLL</th>
                                <th rowspan="2">BERAS</th>
                                <th rowspan="2">NON BERAS</th>
                                <th rowspan="2">UP2K</th>
                                <th rowspan="2">TANAH PEK.</th>
                                <th rowspan="2">IRT</th>
                                <th rowspan="2">KESLING</th>
                            </tr>
                            <tr>
                                <th>L</th><th>P</th><th>L</th><th>P</th><th>L</th><th>P</th>
                            </tr>
                            <tr class="bg-light-dark text-muted fs-8">
                                <?php for ($c = 2; $c <= 35; $c++): ?>
                                    <th><?php echo $c; ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody id="detail_kec_table_body">
                            <!-- Injected via JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Breakdown Cards -->
                <div class="row g-3 mt-4" id="detail_kec_cards_breakdown">
                    <!-- Injected via JavaScript -->
                </div>
            </div>
            <div class="modal-footer bg-light py-3">
                <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function openModalDetailKec(item) {
    document.getElementById('detail_kec_modal_title').innerHTML = '<i class="fa fa-file-text-o text-white me-2"></i> Detail Rekap Desa: ' + item.Nama_Desa + ' (Tahun <?php echo $selected_tahun; ?>)';

    var htmlTable = '<tr>' +
        '<td class="text-start fw-bold">' + item.Nama_Desa + '</td>' +
        '<td>' + item.jml_dusun + '</td>' +
        '<td>' + item.jml_rw + '</td>' +
        '<td>' + item.jml_rt + '</td>' +
        '<td>' + item.jml_dasawisma + '</td>' +
        '<td>' + item.jml_krt + '</td>' +
        '<td>' + item.jml_kk + '</td>' +
        '<td>' + item.total_l + '</td>' +
        '<td>' + item.total_p + '</td>' +
        '<td>' + item.balita_l + '</td>' +
        '<td>' + item.balita_p + '</td>' +
        '<td>' + item.pus + '</td>' +
        '<td>' + item.wus + '</td>' +
        '<td>' + item.ibu_hamil + '</td>' +
        '<td>' + item.ibu_menyusui + '</td>' +
        '<td>' + item.lansia + '</td>' +
        '<td>' + (item.buta_l || 0) + '</td>' +
        '<td>' + (item.buta_p || 0) + '</td>' +
        '<td>' + item.sehat_layak_huni + '</td>' +
        '<td>' + item.tidak_sehat_layak_huni + '</td>' +
        '<td>' + item.tempat_sampah + '</td>' +
        '<td>' + item.spal + '</td>' +
        '<td>' + item.pdam + '</td>' +
        '<td>' + item.sumur + '</td>' +
        '<td>' + item.sungai + '</td>' +
        '<td>' + item.dll + '</td>' +
        '<td>' + item.jamban + '</td>' +
        '<td>' + item.beras + '</td>' +
        '<td>' + item.non_beras + '</td>' +
        '<td>' + item.up2k + '</td>' +
        '<td>' + item.pemanfaatan_tanah + '</td>' +
        '<td>' + item.industri_rumah_tangga + '</td>' +
        '<td>' + item.kesling + '</td>' +
        '<td class="text-start">' + (item.keterangan || '-') + '</td>' +
    '</tr>';
    document.getElementById('detail_kec_table_body').innerHTML = htmlTable;

    var totalWarga = parseInt(item.total_l) + parseInt(item.total_p);
    var htmlCards = 
        '<div class="col-md-3">' +
            '<div class="bg-light-primary p-3 rounded text-center border border-primary">' +
                '<div class="text-muted fs-7 fw-bold">TOTAL WARGA</div>' +
                '<div class="fs-4 fw-bolder text-primary">' + totalWarga + ' Jiwa</div>' +
                '<div class="fs-8 text-gray-600">Laki: ' + item.total_l + ' | Perempuan: ' + item.total_p + '</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-success p-3 rounded text-center border border-success">' +
                '<div class="text-muted fs-7 fw-bold">RUMAH SEHAT</div>' +
                '<div class="fs-4 fw-bolder text-success">' + item.sehat_layak_huni + ' Unit</div>' +
                '<div class="fs-8 text-gray-600">Tidak Sehat: ' + item.tidak_sehat_layak_huni + ' Unit</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-info p-3 rounded text-center border border-info">' +
                '<div class="text-muted fs-7 fw-bold">SUMBER AIR UTAMA</div>' +
                '<div class="fs-4 fw-bolder text-info">' + (parseInt(item.pdam) > parseInt(item.sumur) ? 'PDAM' : 'Sumur') + '</div>' +
                '<div class="fs-8 text-gray-600">PDAM: ' + item.pdam + ' | Sumur: ' + item.sumur + '</div>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
            '<div class="bg-light-warning p-3 rounded text-center border border-warning">' +
                '<div class="text-muted fs-7 fw-bold">MAKANAN POKOK</div>' +
                '<div class="fs-4 fw-bolder text-warning">Beras: ' + item.beras + '</div>' +
                '<div class="fs-8 text-gray-600">Non Beras: ' + item.non_beras + ' KK</div>' +
            '</div>' +
        '</div>';
    document.getElementById('detail_kec_cards_breakdown').innerHTML = htmlCards;

    var modal = new bootstrap.Modal(document.getElementById('modal_detail_kecamatan'));
    modal.show();
}
</script>
