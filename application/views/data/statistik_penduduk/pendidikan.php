<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="wrapper main-wrapper row">

        <div class="col-xs-12">
            <div class="page-title">

                <div class="pull-left">
                    <!-- PAGE HEADING TAG - START -->
                    <h1 class="title">Penduduk <?= empty($all_penduduk->nama_desa) ? ' Kabupaten Bandung' : 'Desa ' . $all_penduduk->nama_desa; ?></h1>
                    <!-- PAGE HEADING TAG - END -->
                </div>

                <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url() . 'welcome/list' ?>"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url() . 'migration/statistikPenduduk' ?>">Statistik</a>
                        </li>
                        <li class="active">
                            <strong>Pendidikan</strong>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <!-- MAIN CONTENT AREA STARTS -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <section class="box has-border-left-3">
                        <div class="content-body">
                            <div class="row">
                                <div class="form-container mt-20 no-padding-right no-padding-left over-h">
                                    <!-- <form id="icon_validate" action="#" novalidate="novalidate"> -->
                                    <div class=" col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Kecamatan</label>
                                                    <div class="controls">
                                                        <i class=""></i>
                                                        <select name="kec_id" id="kec_id" class="form-control">
                                                            <option value="">-- Pilih Kecamatan --</option>
                                                            <?php
                                                            foreach ($kecamatan as $nama) {
                                                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Desa</label>
                                                    <!-- <span class="desc">e.g. "info@example.com"</span> -->
                                                    <div class="controls">
                                                        <i class=""></i>
                                                        <select name="Kd_Desa" id="Kd_Desa" class="form-control"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Pendidikan</h2>
                    <div class="actions panel_actions pull-right">
                        <a class="box_toggle fa fa-chevron-down"></a>
                        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                        <a class="box_close fa fa-times"></a>
                    </div>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="pendidikan" class="table vm trans table-small-font no-mb table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2" style="text-align:left;">Kelompok</th>
                                            <th colspan="2">Jumlah</th>
                                            <th colspan="2">Laki-laki</th>
                                            <th colspan="2">Perempuan</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($pendidikan)) {
                                            foreach ($pendidikan as $data_pendidikan) {
                                        ?>
                                                <tr>
                                                    <td><?= $i++ ?> </td>
                                                    <td><?= $data_pendidikan->nama ?></td>
                                                    <td><?= $data_pendidikan->jumlah ?></td>
                                                    <td><?= $data_pendidikan->persen ?></td>
                                                    <td><?= $data_pendidikan->laki ?></td>
                                                    <td><?= $data_pendidikan->persen1 ?></td>
                                                    <td><?= $data_pendidikan->laki ?></td>
                                                    <td><?= $data_pendidikan->persen2 ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div class="col-lg-12">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Pendidikan Sedang Ditempuh</h2>
                    <div class="actions panel_actions pull-right">
                        <a class="box_toggle fa fa-chevron-down"></a>
                        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                        <a class="box_close fa fa-times"></a>
                    </div>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="pendidikan_ditempuh" class="table vm trans table-small-font no-mb table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2" style="text-align:left;">Kelompok</th>
                                            <th colspan="2">Jumlah</th>
                                            <th colspan="2">Laki-laki</th>
                                            <th colspan="2">Perempuan</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                            <th style="text-align:right">n</th>
                                            <th style="text-align:right">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($pendidikan_ditempuh)) {
                                            foreach ($pendidikan_ditempuh as $data_pendidikan_ditempuh) {
                                        ?>
                                                <tr>
                                                    <td><?= $i++ ?> </td>
                                                    <td><?= $data_pendidikan_ditempuh->nama ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->jumlah ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->persen ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->laki ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->persen1 ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->laki ?></td>
                                                    <td><?= $data_pendidikan_ditempuh->persen2 ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
<!-- END CONTENT -->


<div class="chatapi-windows ">

</div>
</div>