<?php
$mc = $module_counts;
$penduduk = $jumlah_penduduk ?: (object)['penduduk' => 0, 'laki' => 0, 'perempuan' => 0];
$user_name = $this->session->userdata('full_name');
$user_level = $this->session->userdata('role_name');

// Safe accessor for stat objects (get_*()->row() can return null)
$s = function ($obj, $prop) {
    return ($obj && isset($obj->$prop)) ? $obj->$prop : 0;
};
?>

<!--begin::Custom Dashboard Styles-->
<style>
.dash-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1.5rem;
    padding: 2.5rem;
    color: #fff;
    position: relative;
    overflow: hidden;
    margin-bottom: 2rem;
}
.dash-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}
.dash-hero::after {
    content: '';
    position: absolute;
    bottom: -60%;
    left: 30%;
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}
.stat-card {
    border-radius: 1.25rem;
    padding: 1.75rem;
    background: #fff;
    box-shadow: 0 4px 24px rgba(0,0,0,0.04);
    transition: all 0.3s cubic-bezier(.4,0,.2,1);
    border: 1px solid rgba(0,0,0,0.03);
    height: 100%;
}
.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.08);
}
.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
}
.stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.2;
}
.stat-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 0.25rem;
}
.module-card {
    border-radius: 1rem;
    padding: 1.5rem;
    background: #fff;
    border: 1px solid #f1f5f9;
    box-shadow: 0 2px 12px rgba(0,0,0,0.03);
    transition: all 0.25s ease;
    cursor: pointer;
    text-decoration: none;
    display: block;
}
.module-card:hover {
    border-color: #667eea;
    box-shadow: 0 8px 24px rgba(102,126,234,0.12);
    transform: translateY(-2px);
    text-decoration: none;
}
.module-icon-wrap {
    width: 44px;
    height: 44px;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.progress-ring {
    width: 40px;
    height: 40px;
}
.section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1.25rem;
}
.chart-container {
    position: relative;
    height: 280px;
}
</style>
<!--end::Custom Dashboard Styles-->

<div class="d-flex flex-column flex-column-fluid">
    <div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
        <div class="container">

            <!--begin::Hero Welcome-->
            <div class="dash-hero">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center position-relative" style="z-index:1">
                    <div>
                        <h2 class="fw-bold mb-1 fs-2x text-white">Selamat Datang, <?= htmlspecialchars($user_name) ?></h2>
                        <p class="mb-0 opacity-75 fs-6">Sistem Informasi Manajemen PKK &mdash; <?= htmlspecialchars($user_level) ?></p>
                    </div>
                    <div class="mt-4 mt-lg-0 text-lg-end">
                        <span class="badge bg-white bg-opacity-25 text-white fs-7 px-4 py-2 rounded-pill">
                            <i class="fa fa-calendar me-2"></i><?= date('d F Y') ?>
                        </span>
                    </div>
                </div>
            </div>
            <!--end::Hero Welcome-->

            <!--begin::Core Stats Row-->
            <div class="row g-4 mb-6">
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(102,126,234,.1);color:#667eea;"><i class="fa fa-users"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($penduduk->penduduk ?? 0) ?></div>
                        <div class="stat-label">Total Penduduk</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(249,115,22,.1);color:#f97316;"><i class="fa fa-building"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($s($stat->jml_kec, 'jml_kec')) ?></div>
                        <div class="stat-label">Kecamatan</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(16,185,129,.1);color:#10b981;"><i class="fa fa-home"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($s($stat->jml_desa, 'jml_desa')) ?></div>
                        <div class="stat-label">Desa</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(139,92,246,.1);color:#8b5cf6;"><i class="fa fa-object-group"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($s($stat->jml_dasawisma, 'jml_dasawisma')) ?></div>
                        <div class="stat-label">Dasawisma</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(236,72,153,.1);color:#ec4899;"><i class="fa fa-child"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($s($stat->jml_kk, 'jml_kk')) ?></div>
                        <div class="stat-label">Kep. Keluarga</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon" style="background:rgba(20,184,166,.1);color:#14b8a6;"><i class="fa fa-user-circle"></i></div>
                        </div>
                        <div class="stat-value"><?= number_format($s($stat->jml_kader, 'jml_kader')) ?></div>
                        <div class="stat-label">Kader PKK</div>
                    </div>
                </div>
            </div>
            <!--end::Core Stats Row-->

            <!--begin::Charts & Demographics Row-->
            <div class="row g-4 mb-6">
                <!--Demographics Chart-->
                <div class="col-lg-4">
                    <div class="card border-0" style="border-radius:1.25rem;box-shadow:0 4px 24px rgba(0,0,0,0.04);">
                        <div class="card-header border-0 pt-5 pb-0">
                            <h3 class="card-title fw-bolder text-dark fs-5">
                                <i class="fa fa-venus-mars me-2 text-primary"></i>Demografi Penduduk
                            </h3>
                        </div>
                        <div class="card-body pt-4 pb-5">
                            <div class="chart-container d-flex flex-center">
                                <canvas id="kt_stats_widget_1_chart"></canvas>
                            </div>
                            <div class="d-flex justify-content-center gap-4 mt-3">
                                <span class="d-flex align-items-center fs-7">
                                    <span class="bullet bullet-dot bg-primary h-10px w-10px me-2"></span> Laki-laki: <?= number_format($penduduk->laki ?? 0) ?>
                                </span>
                                <span class="d-flex align-items-center fs-7">
                                    <span class="bullet bullet-dot bg-warning h-10px w-10px me-2"></span> Perempuan: <?= number_format($penduduk->perempuan ?? 0) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="perempuan" value="<?= $penduduk->perempuan ?? 0 ?>">
                    <input type="hidden" id="laki" value="<?= $penduduk->laki ?? 0 ?>">
                </div>

                <!--RT/RW Stats-->
                <div class="col-lg-4">
                    <div class="card border-0 h-100" style="border-radius:1.25rem;box-shadow:0 4px 24px rgba(0,0,0,0.04);">
                        <div class="card-header border-0 pt-5 pb-0">
                            <h3 class="card-title fw-bolder text-dark fs-5">
                                <i class="fa fa-sitemap me-2 text-success"></i>Struktur Kelompok
                            </h3>
                        </div>
                        <div class="card-body pt-4">
                            <div class="d-flex flex-column gap-4">
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#f8fafc;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <span class="symbol-label bg-light-primary text-primary fw-bold rounded-3"><i class="fa fa-layer-group"></i></span>
                                        </div>
                                    <div>
                                            <span class="fw-bold text-gray-800 fs-6">Kelompok PKK RW</span>
                                        </div>
                                    </div>
                                    <span class="fw-bolder fs-4 text-gray-800"><?= number_format($s($stat->jml_rw, 'jml_rw')) ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#f8fafc;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <span class="symbol-label bg-light-success text-success fw-bold rounded-3"><i class="fa fa-th"></i></span>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-gray-800 fs-6">Kelompok PKK RT</span>
                                        </div>
                                    </div>
                                    <span class="fw-bolder fs-4 text-gray-800"><?= number_format($s($stat->jml_rt, 'jml_rt')) ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#f8fafc;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <span class="symbol-label bg-light-warning text-warning fw-bold rounded-3"><i class="fa fa-users"></i></span>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-gray-800 fs-6">Dasawisma</span>
                                        </div>
                                    </div>
                                    <span class="fw-bolder fs-4 text-gray-800"><?= number_format($s($stat->jml_dasawisma, 'jml_dasawisma')) ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#f8fafc;">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-40px me-3">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold rounded-3"><i class="fa fa-house-user"></i></span>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-gray-800 fs-6">Kepala Rumah Tangga</span>
                                        </div>
                                    </div>
                                    <span class="fw-bolder fs-4 text-gray-800"><?= number_format($s($stat->jml_krt, 'jml_krt')) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Data Module Completion-->
                <div class="col-lg-4">
                    <div class="card border-0 h-100" style="border-radius:1.25rem;box-shadow:0 4px 24px rgba(0,0,0,0.04);">
                        <div class="card-header border-0 pt-5 pb-0">
                            <h3 class="card-title fw-bolder text-dark fs-5">
                                <i class="fa fa-database me-2 text-info"></i>Data per Modul
                            </h3>
                        </div>
                        <div class="card-body pt-4">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Anggota PKK</span>
                                    <span class="badge bg-light-primary text-primary fs-7"><?= number_format($mc->anggota ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-primary" style="width:<?= min(100, ($mc->anggota ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Struktur Organisasi</span>
                                    <span class="badge bg-light-success text-success fs-7"><?= number_format($mc->aparatur ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-success" style="width:<?= min(100, ($mc->aparatur ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Pokja I</span>
                                    <span class="badge bg-light-warning text-warning fs-7"><?= number_format($mc->pokja1 ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-warning" style="width:<?= min(100, ($mc->pokja1 ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Pokja II</span>
                                    <span class="badge bg-light-info text-info fs-7"><?= number_format($mc->pokja2 ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-info" style="width:<?= min(100, ($mc->pokja2 ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Pokja III</span>
                                    <span class="badge bg-light-danger text-danger fs-7"><?= number_format($mc->pokja3 ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-danger" style="width:<?= min(100, ($mc->pokja3 ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Pokja IV</span>
                                    <span class="badge bg-light-secondary text-secondary fs-7"><?= number_format($mc->pokja4 ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-secondary" style="width:<?= min(100, ($mc->pokja4 ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-7 fw-semibold text-gray-600">Data Keluarga</span>
                                    <span class="badge bg-light-success text-success fs-7"><?= number_format($mc->keluarga ?? 0) ?></span>
                                </div>
                                <div class="progress h-6px bg-gray-100 rounded-pill">
                                    <div class="progress-bar bg-success" style="width:<?= min(100, ($mc->keluarga ?? 0) > 0 ? 100 : 0) ?>%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Charts & Demographics Row-->

            <!--begin::Quick Access Modules-->
            <h4 class="section-title"><i class="fa fa-rocket me-2 text-primary"></i>Akses Cepat Modul</h4>
            <div class="row g-4 mb-6">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('desa/profil') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(102,126,234,.1);color:#667eea;">
                                <i class="fa fa-id-card"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Profil PKK</span>
                                <small class="text-muted">Data Desa</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('desa/anggota') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(16,185,129,.1);color:#10b981;">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Anggota</span>
                                <small class="text-muted">Buku PKK</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('pokja/pokja1') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(249,115,22,.1);color:#f97316;">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Pokja I</span>
                                <small class="text-muted">Pengelolaan</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('pokja/pokja2') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(139,92,246,.1);color:#8b5cf6;">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Pokja II</span>
                                <small class="text-muted">Gerakan</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('pokja/pokja3') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(20,184,166,.1);color:#14b8a6;">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Pokja III</span>
                                <small class="text-muted">Perekonomian</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('pokja/pokja4') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(236,72,153,.1);color:#ec4899;">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Pokja IV</span>
                                <small class="text-muted">Kegiatan</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('dasawisma/keluarga') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(99,102,241,.1);color:#6366f1;">
                                <i class="fa fa-home"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Dasawisma</span>
                                <small class="text-muted">Data Keluarga</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('sip/sip6') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(244,63,94,.1);color:#f43f5e;">
                                <i class="fa fa-heartbeat"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Posyandu</span>
                                <small class="text-muted">SIP</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('web/berita') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(34,211,238,.1);color:#22d3ee;">
                                <i class="fa fa-newspaper-o"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Website</span>
                                <small class="text-muted">Berita & Konten</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('laporan/data_umum') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(168,85,247,.1);color:#a855f7;">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Laporan</span>
                                <small class="text-muted">Data Umum</small>
                            </div>
                        </div>
                    </a>
                </div>
                <?php if ($level_id <= 3): ?>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('master/desa') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(234,179,8,.1);color:#eab308;">
                                <i class="fa fa-map"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Master</span>
                                <small class="text-muted">Wilayah</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <a href="<?= site_url('auth/user') ?>" class="module-card">
                        <div class="d-flex align-items-center">
                            <div class="module-icon-wrap me-3" style="background:rgba(100,116,139,.1);color:#64748b;">
                                <i class="fa fa-cog"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-gray-800 d-block fs-7">Admin</span>
                                <small class="text-muted">Pengelolaan</small>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <!--end::Quick Access Modules-->

            <!--begin::Population Table-->
            <div class="row g-4 mb-6">
                <div class="col-12">
                    <div class="card border-0" style="border-radius:1.25rem;box-shadow:0 4px 24px rgba(0,0,0,0.04);">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder text-dark fs-4"><i class="fa fa-bar-chart me-2 text-primary"></i>Peta Kependudukan</span>
                            </h3>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-light">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 active fw-bolder me-2" data-bs-toggle="tab" href="#kt_tab_pane_1_2">Kecamatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#kt_tab_pane_1_1">Desa</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-5">
                            <div class="tab-content mt-3" id="myTabTables1">
                                <div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="dataTable_Desa" class="table align-middle table-row-dashed fs-6">
                                            <thead>
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="p-0 w-200px">Nama Desa</th>
                                                    <th class="p-0 min-w-100px">Laki-Laki</th>
                                                    <th class="p-0 min-w-100px">Perempuan</th>
                                                    <th class="p-0 min-w-100px">Jumlah Penduduk</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <script>window.dataDesa = <?= json_encode($jumlah_by_desa) ?>;</script>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="kt_tab_pane_1_2" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="dataTable_Kecamatan" class="table align-middle table-row-dashed fs-6">
                                            <thead>
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="p-0 w-200px">Nama Kecamatan</th>
                                                    <th class="p-0 min-w-100px">Laki-Laki</th>
                                                    <th class="p-0 min-w-100px">Perempuan</th>
                                                    <th class="p-0 min-w-100px">Jumlah Penduduk</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <script>window.dataKecamatan = <?= json_encode($jumlah_by_kecamatan) ?>;</script>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Population Table-->

        </div>
    </div>
</div>
