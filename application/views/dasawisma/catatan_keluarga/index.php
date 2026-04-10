<div class="card card-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark fs-3"></span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-light">
                <?php
                if ($this->session->userdata('level_id') == 3 || $this->session->userdata('level_id') == 2 || $this->session->userdata('level_id') == 1) {
                    ?>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2 active"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_1">Kecamatan</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_2">Desa</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_3">Dusun</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_4">RW</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_5">RT</button>
                </li>
                <?php
                }
                ?>
                <?php
                if ($this->session->userdata('level_id') == 4) {
                    ?>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2 active"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_2">Desa</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_3">Dusun</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_4">RW</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_5">RT</button>
                </li>
                <?php
                }
                ?>
                <?php
                if ($this->session->userdata('level_id') == 5) {
                    ?>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_3">Dusun</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_4">RW</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_5">RT</button>
                </li>
                <?php
                }
                ?>
                <?php
                if ($this->session->userdata('level_id') == 6) {
                    ?>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_4">RW</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_5">RT</button>
                </li>
                <?php
                }
                ?>
                <?php
                if ($this->session->userdata('level_id') == 7) {
                    ?>
                <li class="nav-item">
                    <button class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2"
                        data-bs-toggle="tab" href="#kt_tab_pane_1_5">RT</button>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-2 pb-0 mt-n3">
        <div class="tab-content mt-5" id="myTabTables1">
                    <?php
                        if ($this->session->userdata('level_id') != 4) {
                    ?>
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade active show" id="kt_tab_pane_1_1" role="tabpanel"
                        aria-labelledby="kt_tab_pane_1_1">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTable_kecamatan" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Tahun Pendataan</th>
                                        <th>Kecamatan</th>
                                        <th>Kepala</th>
                                        <th>Jumlah KK</th>
                                        <th>Kreteria Rumah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_1_2" role="tabpanel" aria-labelledby="kt_tab_pane_1_2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTable_desa" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Tahun Pendataan</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Kepala</th>
                                        <th>Jumlah KK</th>
                                        <th>Kreteria Rumah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->

                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTable_dusun" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Tahun Pendataan</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Dusun</th>
                                        <th>Kepala</th>
                                        <th>Jumlah KK</th>
                                        <th>Kreteria Rumah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTable_rw" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Tahun Pendataan</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Dusun/RW</th>
                                        <th>Kepala</th>
                                        <th>Jumlah KK</th>
                                        <th>Kreteria Rumah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_1_5" role="tabpanel" aria-labelledby="kt_tab_pane_1_5">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="dataTable_rt" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th>Tahun Pendataan</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Dusun/RW/RT</th>
                                        <th>Kepala</th>
                                        <th>Jumlah KK</th>
                                        <th>Kreteria Rumah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->    
                            
                    <?php
                        }
                    ?>

                    
        </div>
    </div>
</div>

<?php $this->load->view('delete-modal'); ?>

<script>

</script>
