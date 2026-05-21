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

        <!-- Main Card -->
        <div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm">
            <!-- Card Header -->
            <div class="card-header border-0 pt-5 align-items-center">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 text-dark">Daftar Register Posyandu (SIP 6)</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Sistem Informasi Posyandu - Pendaftaran & Profil Wilayah</span>
                </h3>
                <div class="card-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-light mb-0">
                        <li class="nav-item">
                            <a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 active fw-bolder me-2" data-bs-toggle="tab" href="#tab_detail">Daftar Posyandu</a>
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
                        <button type="button" class="btn btn-primary fw-bolder ms-4" data-bs-toggle="modal" data-bs-target="#modal_add_posyandu">
                            <i class="fa fa-plus me-2"></i> Tambah Posyandu
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body py-3">
                <div class="tab-content">
                    
                    <!-- TAB DETAIL -->
                    <div class="tab-pane fade show active" id="tab_detail" role="tabpanel">
                        <div class="table-responsive">
                            <table id="posyanduTable" class="table table-striped table-row-bordered align-middle gy-5 gs-7">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-150px">Nama Posyandu</th>
                                        <th class="min-w-150px">Pengelola</th>
                                        <th class="min-w-150px">Sekretaris</th>
                                        <th class="min-w-120px">Jenis Posyandu</th>
                                        <th class="min-w-100px text-center">Jumlah Kader</th>
                                        <th class="min-w-200px">Wilayah Regional</th>
                                        <?php if ($can_write): ?>
                                            <th class="min-w-120px text-end">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($posyandu_list)): ?>
                                        <tr>
                                            <td colspan="<?php echo $can_write ? 8 : 7; ?>" class="text-center text-muted py-10">
                                                <i class="fa fa-folder-open fa-3x text-gray-300 mb-3 d-block"></i>
                                                Belum ada data Posyandu untuk wilayah Anda.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; foreach ($posyandu_list as $row): ?>
                                            <tr>
                                                <td class="fw-bold"><?php echo $no++; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-3">
                                                            <span class="symbol-label bg-light-primary text-primary fw-bolder">
                                                                <i class="fa fa-heartbeat text-primary"></i>
                                                            </span>
                                                        </div>
                                                        <span class="text-dark fw-bolder text-hover-primary fs-6"><?php echo htmlspecialchars($row->nama_posyandu); ?></span>
                                                    </div>
                                                </td>
                                                <td class="text-gray-700 fw-bold"><?php echo htmlspecialchars($row->pengelola); ?></td>
                                                <td class="text-gray-700"><?php echo htmlspecialchars($row->sekretaris); ?></td>
                                                <td>
                                                    <?php 
                                                    $badge_class = 'badge-light-primary';
                                                    if ($row->jenis_posyandu == 'Mandiri') $badge_class = 'badge-success';
                                                    elseif ($row->jenis_posyandu == 'Purnama') $badge_class = 'badge-info';
                                                    elseif ($row->jenis_posyandu == 'Madya') $badge_class = 'badge-warning';
                                                    elseif ($row->jenis_posyandu == 'Pratama') $badge_class = 'badge-secondary';
                                                    ?>
                                                    <span class="badge <?php echo $badge_class; ?> fw-bold px-3 py-2"><?php echo $row->jenis_posyandu; ?></span>
                                                </td>
                                                <td class="text-center fw-bold text-primary fs-6"><?php echo $row->jumlah_kader; ?> orang</td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-gray-800 fw-bold fs-7">Desa: <?php echo htmlspecialchars($row->Nama_Desa); ?></span>
                                                        <span class="text-muted fs-8">Kec: <?php echo htmlspecialchars($row->Nama_Kecamatan); ?></span>
                                                        <span class="text-muted fs-8">Dusun: <?php echo htmlspecialchars($row->nama_dusun ? $row->nama_dusun : '-'); ?> | RW: <?php echo htmlspecialchars($row->rw); ?><?php echo $row->rt ? ' | RT: '.htmlspecialchars($row->rt) : ''; ?></span>
                                                    </div>
                                                </td>
                                                <?php if ($can_write): ?>
                                                    <td class="text-end">
                                                        <button class="btn btn-icon btn-light-twitter me-2 shadow-sm btn-sm" data-bs-toggle="modal" data-bs-target="#modal_edit_<?php echo $row->id; ?>" title="Edit">
                                                            <i class="fa fa-edit text-primary fs-6"></i>
                                                        </button>
                                                        <button class="btn btn-icon btn-light-facebook shadow-sm btn-sm" onclick="confirmDelete(<?php echo $row->id; ?>, '<?php echo addslashes($row->nama_posyandu); ?>')" title="Hapus">
                                                            <i class="fa fa-trash text-danger fs-6"></i>
                                                        </button>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB DUSUN -->
                    <?php if ($user_level <= 5 && !empty($recap_dusun)): ?>
                    <div class="tab-pane fade" id="tab_dusun" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-striped table-row-bordered align-middle gy-5 gs-7 dataTable-recap">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-200px">Nama Dusun</th>
                                        <th class="min-w-150px">Desa</th>
                                        <th class="min-w-100px text-center">Total Posyandu</th>
                                        <th class="min-w-100px text-center">Total Kader</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($recap_dusun as $r): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td class="fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                        <td><?php echo htmlspecialchars($r->parent ? $r->parent : '-'); ?></td>
                                        <td class="text-center fw-bold fs-6"><?php echo $r->total_posyandu; ?></td>
                                        <td class="text-center fw-bold fs-6 text-success"><?php echo $r->total_kader; ?></td>
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
                            <table class="table table-striped table-row-bordered align-middle gy-5 gs-7 dataTable-recap">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-200px">Nama Desa</th>
                                        <th class="min-w-150px">Kecamatan</th>
                                        <th class="min-w-100px text-center">Total Posyandu</th>
                                        <th class="min-w-100px text-center">Total Kader</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($recap_desa as $r): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td class="fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                        <td><?php echo htmlspecialchars($r->parent ? $r->parent : '-'); ?></td>
                                        <td class="text-center fw-bold fs-6"><?php echo $r->total_posyandu; ?></td>
                                        <td class="text-center fw-bold fs-6 text-success"><?php echo $r->total_kader; ?></td>
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
                            <table class="table table-striped table-row-bordered align-middle gy-5 gs-7 dataTable-recap">
                                <thead>
                                    <tr class="fw-bolder fs-7 text-gray-800 text-uppercase border-bottom border-gray-200 bg-light">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-200px">Nama Kecamatan</th>
                                        <th class="min-w-100px text-center">Total Posyandu</th>
                                        <th class="min-w-100px text-center">Total Kader</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($recap_kecamatan as $r): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td class="fw-bolder text-primary fs-6"><?php echo htmlspecialchars($r->wilayah ? $r->wilayah : '-'); ?></td>
                                        <td class="text-center fw-bold fs-6"><?php echo $r->total_posyandu; ?></td>
                                        <td class="text-center fw-bold fs-6 text-success"><?php echo $r->total_kader; ?></td>
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
    </div>
</div>

<?php if ($can_write): ?>
    <!-- Modal Add Posyandu -->
    <div class="modal fade" id="modal_add_posyandu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fa fa-times fs-4"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="<?php echo site_url('sip/sip6_add'); ?>" method="post" class="form" id="form_add_posyandu">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3 text-primary"><i class="fa fa-heartbeat text-primary me-2"></i>Tambah Data Posyandu</h1>
                            <div class="text-muted fw-bold fs-5">Lengkapi data profil posyandu di wilayah RW Anda.</div>
                        </div>

                        <!-- Info Banner Regional (Auto-Filled) -->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <i class="fa fa-info-circle text-primary fa-2x me-4 mt-1"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-bold">
                                    <h4 class="text-gray-900 fw-bolder">Data Wilayah Terkunci Otomatis</h4>
                                    <div class="fs-6 text-gray-700">
                                        Kecamatan: <strong class="text-primary"><?php echo $this->session->userdata('kec_name') ? $this->session->userdata('kec_name') : 'Kecamatan Anda'; ?></strong> | 
                                        Desa: <strong class="text-primary"><?php echo $this->session->userdata('desa_name') ? $this->session->userdata('desa_name') : 'Desa Anda'; ?></strong> | 
                                        RW: <strong class="text-primary"><?php echo $this->session->userdata('rw'); ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Posyandu -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">Nama Posyandu</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Contoh: Posyandu Mawar I" name="nama_posyandu" required />
                        </div>

                        <div class="row g-9 mb-8">
                            <!-- Pengelola -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Nama Pengelola (Ketua)</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Nama lengkap pengelola" name="pengelola" required />
                            </div>
                            <!-- Sekretaris -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Nama Sekretaris</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Nama lengkap sekretaris" name="sekretaris" required />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <!-- Jenis Posyandu -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Jenis / Tingkat Posyandu</label>
                                <select class="form-select form-select-solid" name="jenis_posyandu" required>
                                    <option value="Pratama">Pratama</option>
                                    <option value="Madya">Madya</option>
                                    <option value="Purnama">Purnama</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <!-- Jumlah Kader -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-bold mb-2 required">Jumlah Kader Aktif</label>
                                <input type="number" class="form-control form-control-solid" name="jumlah_kader" min="0" value="0" required />
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan Data</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Posyandu (Generated for each item) -->
    <?php foreach ($posyandu_list as $row): ?>
        <div class="modal fade" id="modal_edit_<?php echo $row->id; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="fa fa-times fs-4"></i>
                        </div>
                    </div>
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <form action="<?php echo site_url('sip/sip6_edit/' . $row->id); ?>" method="post" class="form">
                            <div class="mb-13 text-center">
                                <h1 class="mb-3 text-primary"><i class="fa fa-edit text-primary me-2"></i>Ubah Data Posyandu</h1>
                                <div class="text-muted fw-bold fs-5">Edit profil posyandu <strong><?php echo htmlspecialchars($row->nama_posyandu); ?></strong>.</div>
                            </div>

                            <!-- Nama Posyandu -->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">Nama Posyandu</label>
                                <input type="text" class="form-control form-control-solid" value="<?php echo htmlspecialchars($row->nama_posyandu); ?>" name="nama_posyandu" required />
                            </div>

                            <div class="row g-9 mb-8">
                                <!-- Pengelola -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2 required">Nama Pengelola (Ketua)</label>
                                    <input type="text" class="form-control form-control-solid" value="<?php echo htmlspecialchars($row->pengelola); ?>" name="pengelola" required />
                                </div>
                                <!-- Sekretaris -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2 required">Nama Sekretaris</label>
                                    <input type="text" class="form-control form-control-solid" value="<?php echo htmlspecialchars($row->sekretaris); ?>" name="sekretaris" required />
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <!-- Jenis Posyandu -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2 required">Jenis / Tingkat Posyandu</label>
                                    <select class="form-select form-select-solid" name="jenis_posyandu" required>
                                        <option value="Pratama" <?php echo $row->jenis_posyandu == 'Pratama' ? 'selected' : ''; ?>>Pratama</option>
                                        <option value="Madya" <?php echo $row->jenis_posyandu == 'Madya' ? 'selected' : ''; ?>>Madya</option>
                                        <option value="Purnama" <?php echo $row->jenis_posyandu == 'Purnama' ? 'selected' : ''; ?>>Purnama</option>
                                        <option value="Mandiri" <?php echo $row->jenis_posyandu == 'Mandiri' ? 'selected' : ''; ?>>Mandiri</option>
                                    </select>
                                </div>
                                <!-- Jumlah Kader -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2 required">Jumlah Kader Aktif</label>
                                    <input type="number" class="form-control form-control-solid" name="jumlah_kader" min="0" value="<?php echo $row->jumlah_kader; ?>" required />
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Perbarui Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Datatable and sweet alert scripts -->
<script>
    $(document).ready(function() {
        if ($('#posyanduTable').length) {
            $('#posyanduTable').DataTable({
                responsive: true,
                language: {
                    search: "Cari Posyandu:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Tidak ditemukan data Posyandu yang cocok"
                }
            });
        }
        if ($('.dataTable-recap').length) {
            $('.dataTable-recap').DataTable({
                responsive: true,
                language: {
                    search: "Cari Wilayah:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    },
                    zeroRecords: "Tidak ditemukan data wilayah yang cocok"
                }
            });
        }
    });

    function confirmDelete(id, name) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": 0,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false
        };

        toastr.warning(
            "Yakin akan menghapus data Posyandu <b>" + name + "</b>?<br><br>" +
            "<a href='<?php echo site_url('sip/sip6_delete/'); ?>" + id + "' class='btn btn-danger btn-sm fw-bolder text-white me-2'>Hapus</a>" +
            "<button class='btn btn-outline-light btn-sm text-white' onclick='toastr.clear()'>Batal</button>", 
            "Hapus Data"
        );
    }
</script>
