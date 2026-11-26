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
                    <span class="card-label fw-bolder fs-3 mb-1">Filter Wilayah & Tahun</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Pilih Kecamatan, Desa, dan Tahun untuk mengelola data catatan kegiatan warga (Total Desa/Kelurahan)</span>
                </h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('sip/sip7'); ?>" method="get" class="form row align-items-end g-3">
                    <?php if ($user_level <= 3): ?>
                        <div class="col-md-4">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Kecamatan</label>
                            <select class="form-select form-select-solid" name="kec_id" id="filter_kec_id" onchange="this.form.submit()">
                                <?php foreach ($kecamatan_list as $kec): ?>
                                    <option value="<?php echo $kec->Kd_Kec; ?>" <?php echo $selected_kec == $kec->Kd_Kec ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($kec->Nama_Kecamatan); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if ($user_level <= 3): ?>
                        <div class="col-md-4">
                            <label class="fs-6 fw-bold text-gray-700 mb-2">Desa / Kelurahan</label>
                            <select class="form-select form-select-solid" name="desa_id" id="filter_desa_id">
                                <?php foreach ($desa_list as $desa): ?>
                                    <option value="<?php echo $desa->Kd_Desa; ?>" <?php echo $selected_desa == $desa->Kd_Desa ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($desa->Nama_Desa); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

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

                    <div class="<?php echo ($user_level <= 3) ? 'col-md-2' : 'col-md-3'; ?> d-grid">
                        <button type="submit" class="btn btn-primary fw-bolder">
                            <i class="fa fa-search me-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sheet Card (List Data Total Desa/Kelurahan) -->
        <div class="card mb-5 mb-xl-8 shadow-sm">
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">
                        CATATAN DATA DAN KEGIATAN WARGA TP PKK
                    </span>
                    <span class="text-muted mt-1 fw-bold fs-7">
                        TP PKK DESA/KEL: <strong class="text-primary"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?></strong> | 
                        KECAMATAN: <strong class="text-dark"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></strong> | 
                        KAB: <strong>BANDUNG</strong> | TAHUN: <strong class="text-primary"><?php echo $selected_tahun; ?></strong>
                    </span>
                </div>
                <div class="card-toolbar d-flex align-items-center gap-2">
                    <?php if (!empty($selected_desa)): ?>
                        <button type="button" class="btn btn-sm btn-primary fw-bolder" onclick="openModalTambah()">
                            <i class="fa fa-plus me-1"></i> Input / Tambah Data
                        </button>
                        <a href="<?php echo site_url("sip/sip7_excel?desa_id={$selected_desa}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-light-success fw-bolder">
                            <i class="fa fa-file-excel-o me-1"></i> Cetak Excel
                        </a>
                        <a href="<?php echo site_url("sip/sip7_pdf?desa_id={$selected_desa}&tahun={$selected_tahun}"); ?>" target="_blank" class="btn btn-sm btn-light-danger fw-bolder">
                            <i class="fa fa-file-pdf-o me-1"></i> Cetak PDF
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body py-4">
                <!-- Header Metadata Ringkas -->
                <div class="mb-5 p-4 bg-light rounded border border-gray-300">
                    <div class="row fs-6">
                        <div class="col-md-6">
                            <table class="table table-borderless table-sm mb-0">
                                <tr>
                                    <td style="width: 170px;" class="fw-bolder">TP PKK DESA/KEL</td>
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
                                    <td style="width: 170px;" class="fw-bolder">KAB/KOTA</td>
                                    <td style="width: 15px;">:</td>
                                    <td class="fw-bold">KABUPATEN BANDUNG</td>
                                </tr>
                                <tr>
                                    <td class="fw-bolder">PROVINSI</td>
                                    <td>:</td>
                                    <td class="fw-bold">JAWA BARAT</td>
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
                                <th class="text-start align-middle" style="min-width: 160px;">DESA / KELURAHAN</th>
                                <th class="text-center align-middle">TAHUN</th>
                                <th class="text-center align-middle">JUML RW</th>
                                <th class="text-center align-middle">JUML RT</th>
                                <th class="text-center align-middle">DASAWISMA</th>
                                <th class="text-center align-middle">JUML KK</th>
                                <th class="text-center align-middle">TOTAL WARGA</th>
                                <th class="text-center align-middle">RUMAH SEHAT</th>
                                <th class="text-center align-middle">KETERANGAN</th>
                                <th class="text-center align-middle" style="min-width: 220px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($catatan_warga)): 
                                $no = 1;
                                foreach ($catatan_warga as $item): 
                                    $warga_total = $item->total_l + $item->total_p;
                                    $item_json = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td class="text-start fw-bolder text-dark">
                                        <i class="fa fa-building text-primary me-2"></i><?php echo htmlspecialchars($item->Nama_Desa ? $item->Nama_Desa : ($info_desa ? $info_desa->Nama_Desa : '-')); ?>
                                    </td>
                                    <td><span class="badge badge-light-dark fw-bold fs-7"><?php echo $item->tahun; ?></span></td>
                                    <td><span class="badge badge-light-primary fw-bold fs-7"><?php echo number_format($item->jml_rw, 0, ',', '.'); ?> RW</span></td>
                                    <td><span class="badge badge-light-info fw-bold fs-7"><?php echo number_format($item->jml_rt, 0, ',', '.'); ?> RT</span></td>
                                    <td><span class="badge badge-light-warning fw-bold fs-7"><?php echo number_format($item->jml_dasawisma, 0, ',', '.'); ?></span></td>
                                    <td class="fw-bolder"><?php echo number_format($item->jml_kk, 0, ',', '.'); ?> KK</td>
                                    <td>
                                        <span class="fw-bolder text-dark"><?php echo number_format($warga_total, 0, ',', '.'); ?> Jiwa</span>
                                        <div class="text-muted fs-8">(L: <?php echo $item->total_l; ?>, P: <?php echo $item->total_p; ?>)</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fw-bolder"><?php echo number_format($item->sehat_layak_huni, 0, ',', '.'); ?> Unit</span>
                                    </td>
                                    <td class="text-start fs-7"><?php echo htmlspecialchars($item->keterangan ? $item->keterangan : '-'); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                            <!-- Tombol Detail Lengkap 33 Kolom -->
                                            <button type="button" class="btn btn-sm btn-primary px-2 py-1 fw-bold fs-8" title="Lihat Detail Lengkap 33 Indikator" onclick='openModalDetail(<?php echo $item_json; ?>)'>
                                                <i class="fa fa-eye me-1"></i> Detail
                                            </button>

                                            <!-- Tombol Update / Edit -->
                                            <button type="button" class="btn btn-sm btn-warning px-2 py-1 fw-bold text-dark fs-8" title="Update / Edit Data" onclick='openModalEdit(<?php echo $item_json; ?>)'>
                                                <i class="fa fa-edit me-1"></i> Update
                                            </button>

                                            <!-- Tombol Hapus / Delete -->
                                            <a href="<?php echo site_url("sip/sip7_delete/{$item->id}?kec_id={$selected_kec}&desa_id={$selected_desa}&tahun={$selected_tahun}"); ?>" class="btn btn-sm btn-danger px-2 py-1 fw-bold fs-8" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data catatan warga ini?')">
                                                <i class="fa fa-trash me-1"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center py-10 text-muted">
                                    <i class="fa fa-folder-open-o fa-3x mb-3 text-gray-400"></i>
                                    <p class="fs-6 fw-bold mb-2">Belum ada data catatan kegiatan warga untuk Desa dan Tahun ini.</p>
                                    <button type="button" class="btn btn-sm btn-primary fw-bolder" onclick="openModalTambah()">
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
<!-- MODAL DETAIL LENGKAP CATATAN WARGA (33 INDIKATOR FORMAL) -->
<!-- ======================================================== -->
<div class="modal fade" id="modal_detail_sip7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark py-4">
                <h4 class="modal-title text-white fw-bolder" id="detail_modal_title">
                    <i class="fa fa-file-text-o text-white me-2"></i> Detail Catatan Data & Kegiatan Warga
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
                                <th rowspan="3" style="min-width: 140px;">DESA / KELURAHAN</th>
                                <th rowspan="3">JUML RW</th>
                                <th rowspan="3">JUML RT</th>
                                <th rowspan="3">JUML DASAWISMA</th>
                                <th rowspan="3">JUML KRT</th>
                                <th rowspan="3">JUML KK</th>
                                <th colspan="10">JUMLAH ANGGOTA KELUARGA</th>
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
                                <th rowspan="2">3 BUTA</th>
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
                                <th rowspan="2">PEMANFAATAN TANAH</th>
                                <th rowspan="2">INDUSTRI RUMAH TANGGA</th>
                                <th rowspan="2">KESLING</th>
                            </tr>
                            <tr>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                            </tr>
                            <tr class="bg-light-dark text-muted fs-8">
                                <th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th><th>21</th><th>22</th><th>23</th><th>24</th><th>25</th><th>26</th><th>27</th><th>28</th><th>29</th><th>30</th><th>31</th><th>32</th><th>33</th>
                            </tr>
                        </thead>
                        <tbody id="detail_table_body">
                            <!-- Injected via JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Info Cards Breakdown -->
                <div class="row g-3 mt-4" id="detail_cards_breakdown">
                    <!-- Injected via JavaScript -->
                </div>
            </div>
            <div class="modal-footer bg-light py-3">
                <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- MODAL FORM CRUD CATATAN DATA WARGA DESA    -->
<!-- ========================================== -->
<div class="modal fade" id="modal_form_sip7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="<?php echo site_url('sip/sip7_save'); ?>" method="post" id="form_sip7">
                <input type="hidden" name="id" id="crud_id" value="" />
                <input type="hidden" name="kec_id" value="<?php echo $selected_kec; ?>" />
                <input type="hidden" name="desa_id" value="<?php echo $selected_desa; ?>" />

                <div class="modal-header bg-primary py-4">
                    <h4 class="modal-title text-white fw-bolder" id="modal_title_sip7">
                        <i class="fa fa-edit text-white me-2"></i> Form Catatan Data & Kegiatan Warga TP PKK
                    </h4>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary text-white ms-auto" data-bs-dismiss="modal">
                        <i class="fa fa-times text-white"></i>
                    </button>
                </div>

                <div class="modal-body py-6 px-8">
                    <!-- Section 1: Wilayah (Dari Master Data) & Tahun -->
                    <div class="bg-light p-4 rounded mb-5 border border-gray-300">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="fs-7 fw-bold text-muted mb-1">Desa / Kelurahan (Master)</label>
                                <input type="text" class="form-control form-control-sm form-control-solid fw-bold" value="<?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?>" readonly />
                            </div>
                            <div class="col-md-4">
                                <label class="fs-7 fw-bold text-muted mb-1">Kecamatan (Master)</label>
                                <input type="text" class="form-control form-control-sm form-control-solid fw-bold" value="<?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?>" readonly />
                            </div>
                            <div class="col-md-4">
                                <label class="required fs-7 fw-bold mb-1">Tahun Pendataan</label>
                                <select class="form-select form-select-sm form-select-solid" name="tahun" id="crud_tahun" required>
                                    <?php foreach ($years as $yr): ?>
                                        <option value="<?php echo $yr; ?>" <?php echo $selected_tahun == $yr ? 'selected' : ''; ?>>
                                            <?php echo $yr; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Master Wilayah & Jumlah KK -->
                    <div class="card card-bordered mb-5">
                        <div class="card-header bg-light-primary py-2 min-h-40px">
                            <h5 class="card-title fs-6 fw-bolder text-primary mb-0">1. Data Wilayah (Otomatis dari Master) & Kepala Keluarga</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Jumlah RW</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="jml_rw" id="crud_jml_rw" min="0" value="<?php echo $master_counts->jml_rw; ?>" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Jumlah RT</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="jml_rt" id="crud_jml_rt" min="0" value="<?php echo $master_counts->jml_rt; ?>" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Jumlah Dasawisma</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="jml_dasawisma" id="crud_jml_dasawisma" min="0" value="<?php echo $master_counts->jml_dasawisma; ?>" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Jumlah KRT</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="jml_krt" id="crud_jml_krt" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Jumlah KK</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="jml_kk" id="crud_jml_kk" min="0" value="0" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Jumlah Anggota Keluarga -->
                    <div class="card card-bordered mb-5">
                        <div class="card-header bg-light-primary py-2 min-h-40px">
                            <h5 class="card-title fs-6 fw-bolder text-primary mb-0">2. Jumlah Anggota Keluarga</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Total Laki-laki (L)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="total_l" id="crud_total_l" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Total Perempuan (P)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="total_p" id="crud_total_p" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Balita Laki-laki (L)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="balita_l" id="crud_balita_l" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Balita Perempuan (P)</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="balita_p" id="crud_balita_p" min="0" value="0" />
                                </div>

                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">PUS</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="pus" id="crud_pus" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">WUS</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="wus" id="crud_wus" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Ibu Hamil</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_hamil" id="crud_ibu_hamil" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Ibu Menyusui</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="ibu_menyusui" id="crud_ibu_menyusui" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Lansia</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="lansia" id="crud_lansia" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">3 Buta</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="buta" id="crud_buta" min="0" value="0" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Kriteria Rumah & Sumber Air -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card card-bordered h-100">
                                <div class="card-header bg-light-success py-2 min-h-40px">
                                    <h5 class="card-title fs-6 fw-bolder text-success mb-0">3. Kriteria Rumah</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Sehat Layak Huni</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="sehat_layak_huni" id="crud_sehat_layak_huni" min="0" value="0" />
                                        </div>
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Tdk Sehat Layak Huni</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="tidak_sehat_layak_huni" id="crud_tidak_sehat_layak_huni" min="0" value="0" />
                                        </div>
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Memiliki Tmp Sampah</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="tempat_sampah" id="crud_tempat_sampah" min="0" value="0" />
                                        </div>
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Memiliki SPAL/Serapan</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="spal" id="crud_spal" min="0" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-bordered h-100">
                                <div class="card-header bg-light-info py-2 min-h-40px">
                                    <h5 class="card-title fs-6 fw-bolder text-info mb-0">4. Sumber Air & MCK</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">PDAM</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="pdam" id="crud_pdam" min="0" value="0" />
                                        </div>
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">Sumur</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="sumur" id="crud_sumur" min="0" value="0" />
                                        </div>
                                        <div class="col-4">
                                            <label class="fs-7 fw-bold">Sungai</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="sungai" id="crud_sungai" min="0" value="0" />
                                        </div>
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Sumber Air DLL</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="dll" id="crud_dll" min="0" value="0" />
                                        </div>
                                        <div class="col-6">
                                            <label class="fs-7 fw-bold">Jumlah Sarana MCK</label>
                                            <input type="number" class="form-control form-control-sm form-control-solid" name="jamban" id="crud_jamban" min="0" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Makanan Pokok & Partisipasi Kegiatan -->
                    <div class="card card-bordered mb-4">
                        <div class="card-header bg-light-warning py-2 min-h-40px">
                            <h5 class="card-title fs-6 fw-bolder text-warning mb-0">5. Makanan Pokok, Warga Mengikuti Kegiatan, & Keterangan</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Beras</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="beras" id="crud_beras" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">Non Beras</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="non_beras" id="crud_non_beras" min="0" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label class="fs-7 fw-bold text-gray-700">UP2K</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="up2k" id="crud_up2k" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Pemanfaatan Pekarangan</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="pemanfaatan_tanah" id="crud_pemanfaatan_tanah" min="0" value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label class="fs-7 fw-bold text-gray-700">Industri Rumah Tangga</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="industri_rumah_tangga" id="crud_industri_rumah_tangga" min="0" value="0" />
                                </div>
                                <div class="col-md-4">
                                    <label class="fs-7 fw-bold text-gray-700">Kesehatan Lingkungan</label>
                                    <input type="number" class="form-control form-control-sm form-control-solid" name="kesling" id="crud_kesling" min="0" value="0" />
                                </div>
                                <div class="col-md-8">
                                    <label class="fs-7 fw-bold text-gray-700">Keterangan Tambahan</label>
                                    <input type="text" class="form-control form-control-sm form-control-solid" name="keterangan" id="crud_keterangan" placeholder="Catatan tambahan (opsional)" />
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
function openModalDetail(item) {
    var namaDesa = item.Nama_Desa ? item.Nama_Desa : '<?php echo htmlspecialchars($info_desa ? $info_desa->Nama_Desa : "-"); ?>';
    document.getElementById('detail_modal_title').innerHTML = '<i class="fa fa-file-text-o text-white me-2"></i> Detail Catatan Warga: ' + namaDesa + ' (Tahun ' + item.tahun + ')';

    var htmlTable = '<tr>' +
        '<td class="text-start fw-bold">' + namaDesa + '</td>' +
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
        '<td>' + item.buta + '</td>' +
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
    document.getElementById('detail_table_body').innerHTML = htmlTable;

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
    document.getElementById('detail_cards_breakdown').innerHTML = htmlCards;

    var modal = new bootstrap.Modal(document.getElementById('modal_detail_sip7'));
    modal.show();
}

function openModalTambah() {
    document.getElementById('form_sip7').reset();
    document.getElementById('crud_id').value = '';
    document.getElementById('crud_jml_rw').value = '<?php echo $master_counts->jml_rw; ?>';
    document.getElementById('crud_jml_rt').value = '<?php echo $master_counts->jml_rt; ?>';
    document.getElementById('crud_jml_dasawisma').value = '<?php echo $master_counts->jml_dasawisma; ?>';
    document.getElementById('modal_title_sip7').innerHTML = '<i class="fa fa-plus text-white me-2"></i> Input / Tambah Data Catatan Warga Desa';
    var modal = new bootstrap.Modal(document.getElementById('modal_form_sip7'));
    modal.show();
}

function openModalEdit(item) {
    document.getElementById('form_sip7').reset();
    document.getElementById('crud_id').value = item.id;
    document.getElementById('crud_tahun').value = item.tahun;

    document.getElementById('crud_jml_rw').value = item.jml_rw || 0;
    document.getElementById('crud_jml_rt').value = item.jml_rt || 0;
    document.getElementById('crud_jml_dasawisma').value = item.jml_dasawisma || 0;
    document.getElementById('crud_jml_krt').value = item.jml_krt || 0;
    document.getElementById('crud_jml_kk').value = item.jml_kk || 0;

    document.getElementById('crud_total_l').value = item.total_l || 0;
    document.getElementById('crud_total_p').value = item.total_p || 0;
    document.getElementById('crud_balita_l').value = item.balita_l || 0;
    document.getElementById('crud_balita_p').value = item.balita_p || 0;
    document.getElementById('crud_pus').value = item.pus || 0;
    document.getElementById('crud_wus').value = item.wus || 0;
    document.getElementById('crud_ibu_hamil').value = item.ibu_hamil || 0;
    document.getElementById('crud_ibu_menyusui').value = item.ibu_menyusui || 0;
    document.getElementById('crud_lansia').value = item.lansia || 0;
    document.getElementById('crud_buta').value = item.buta || 0;

    document.getElementById('crud_sehat_layak_huni').value = item.sehat_layak_huni || 0;
    document.getElementById('crud_tidak_sehat_layak_huni').value = item.tidak_sehat_layak_huni || 0;
    document.getElementById('crud_tempat_sampah').value = item.tempat_sampah || 0;
    document.getElementById('crud_spal').value = item.spal || 0;

    document.getElementById('crud_pdam').value = item.pdam || 0;
    document.getElementById('crud_sumur').value = item.sumur || 0;
    document.getElementById('crud_sungai').value = item.sungai || 0;
    document.getElementById('crud_dll').value = item.dll || 0;
    document.getElementById('crud_jamban').value = item.jamban || 0;

    document.getElementById('crud_beras').value = item.beras || 0;
    document.getElementById('crud_non_beras').value = item.non_beras || 0;
    document.getElementById('crud_up2k').value = item.up2k || 0;
    document.getElementById('crud_pemanfaatan_tanah').value = item.pemanfaatan_tanah || 0;
    document.getElementById('crud_industri_rumah_tangga').value = item.industri_rumah_tangga || 0;
    document.getElementById('crud_kesling').value = item.kesling || 0;
    document.getElementById('crud_keterangan').value = item.keterangan || '';

    document.getElementById('modal_title_sip7').innerHTML = '<i class="fa fa-edit text-white me-2"></i> Update Data Catatan Warga (Tahun ' + item.tahun + ')';
    var modal = new bootstrap.Modal(document.getElementById('modal_form_sip7'));
    modal.show();
}
</script>
