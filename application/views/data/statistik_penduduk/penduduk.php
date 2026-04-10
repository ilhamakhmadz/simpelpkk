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
                            <strong>Penduduk Desa</strong>
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
        <div class="col-lg-4">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Statistik Penduduk</h2>
                    <!-- <div class="actions panel_actions pull-right">
                        <a class="box_toggle fa fa-chevron-down"></a>
                        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                        <a class="box_close fa fa-times"></a>
                    </div> -->
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="crypto-list col-lg-6 col-sm-6 col-xs-12 mt-15">
                                <div class="crpto-currency-box">
                                    <h4 class="boldy">Penduduk</h4>
                                    <h5 class="boldy"><?= $all_penduduk->total . ' Jiwa' ?></h5>
                                    <span class="checky-box"></span>
                                </div>
                                <div class="crpto-currency-box">
                                    <h4 class="boldy">Laki-Laki</h4>
                                    <h5 class="boldy"><?= $all_penduduk->laki . ' Jiwa' ?></h5>
                                    <span class="checky-box"></span>
                                </div>
                            </div>

                            <div class="payment-list col-lg-6 col-sm-6 col-xs-12 mt-15">
                                <div class="crpto-currency-box">
                                    <h4 class="boldy">Keluarga</h4>
                                    <h5 class="boldy"><?= $all_penduduk->keluarga . ' Jiwa' ?></h5>
                                    <span class="checky-box"></span>
                                </div>
                                <div class="crpto-currency-box">
                                    <h4 class="boldy">Perempuan</h4>
                                    <h5 class="boldy"><?= $all_penduduk->perempuan . ' Jiwa' ?></h5>
                                    <span class="checky-box"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </div>
        <div class="col-lg-8">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Pekerjaan</h2>
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
                                <table id="rentang_umur" class="table vm trans table-small-font no-mb table-bordered table-striped">
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
                                        // $i = 1;
                                        if (!empty($rentang_umur)) {
                                            foreach ($rentang_umur as $data_rentang_umur) {
                                        ?>
                                                <tr>
                                                    <td><?= $data_rentang_umur->no ?> </td>
                                                    <td><?= $data_rentang_umur->nama ?></td>
                                                    <td><?= $data_rentang_umur->jumlah ?></td>
                                                    <td><?= $data_rentang_umur->persen ?></td>
                                                    <td><?= $data_rentang_umur->laki ?></td>
                                                    <td><?= $data_rentang_umur->persen1 ?></td>
                                                    <td><?= $data_rentang_umur->laki ?></td>
                                                    <td><?= $data_rentang_umur->persen2 ?></td>
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
        <!-- <div class="col-lg-12">
            <section class="box">
                <header class="panel_header">
                    <h2 class="title pull-left">Activities History</h2>
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
                                <table id="k" class="table vm trans table-small-font no-mb table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Jumlah Keluarga</th>
                                            <th>Laki-Laki</th>
                                            <th>Perempuan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><small class="text-muted">HJD9R034JNN3N43</small></td>
                                            <td><small class="text-muted">10:23:45</small></td>
                                            <td><span class="badge  w-70 round-success">completed</span></td>
                                            <td class="green-text boldy">+0,041BTC</td>
                                        </tr>
                                        <tr>
                                            <td><small class="text-muted">HJD9R034JNN3N43</small></td>
                                            <td><small class="text-muted">10:23:45</small></td>
                                            <td><span class="badge  w-70 round-success">completed</span></td>
                                            <td class="green-text boldy">+0,041BTC</td>
                                        </tr>
                                        <tr>
                                            <td><small class="text-muted">HJD9R034JNN3N43</small></td>
                                            <td><small class="text-muted">10:23:45</small></td>
                                            <td><span class="badge  w-70 round-success">completed</span></td>
                                            <td class="green-text boldy">+0,041BTC</td>
                                        </tr>
                                        <tr>
                                            <td><small class="text-muted">HJD9R034JNN3N43</small></td>
                                            <td><small class="text-muted">10:23:45</small></td>
                                            <td><span class="badge  w-70 round-success">completed</span></td>
                                            <td class="green-text boldy">+0,041BTC</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div> -->
    </div>
</section>
<!-- END CONTENT -->


<div class="chatapi-windows ">

</div>
</div>