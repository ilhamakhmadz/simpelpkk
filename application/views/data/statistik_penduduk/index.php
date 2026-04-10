<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="wrapper main-wrapper row">

        <div class="col-xs-12">
            <div class="page-title">

                <div class="pull-left">
                    <!-- PAGE HEADING TAG - START -->
                    <h1 class="title">Penduduk</h1>
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
                            <strong>Penduduk</strong>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <!-- MAIN CONTENT AREA STARTS -->

        <div class="col-lg-7">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Penduduk Kabupaten Bandung</h2>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php

                            $dataPoints = array(
                                array("label" => "Perempuan", "y" => $all_penduduk->perempuan),
                                array("label" => "Laki-Laki", "y" => $all_penduduk->laki)
                            )

                            ?>

                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-5">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Tiga Teratas</h2>
                    <div class="actions panel_actions pull-right">
                        <a class="box_toggle fa fa-chevron-down"></a>
                        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                        <a class="box_close fa fa-times"></a>
                    </div>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php

                            $laki = array(
                                array("label" => $top_tree[0]->nama_desa, "y" => $top_tree[0]->pria),
                                array("label" => $top_tree[1]->nama_desa, "y" => $top_tree[1]->pria),
                                array("label" => $top_tree[2]->nama_desa, "y" => $top_tree[2]->pria)
                            );

                            $perempuan = array(
                                array("label" => $top_tree[0]->nama_desa, "y" => $top_tree[0]->wanita),
                                array("label" => $top_tree[1]->nama_desa, "y" => $top_tree[1]->wanita),
                                array("label" => $top_tree[2]->nama_desa, "y" => $top_tree[2]->wanita)
                            );

                            ?>
                            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- MAIN CONTENT AREA ENDS -->
    </div>
</section>
<!-- END CONTENT -->


<div class="chatapi-windows ">

</div>
</div>

<script>
    window.onload = function() {

        var chart1 = new CanvasJS.Chart("chartContainer2", {

            theme: "light2",
            animationEnabled: true,
            toolTip: {
                shared: true,
                reversed: true
            },

            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "stackedColumn",
                name: "Laki-Laki",
                showInLegend: true,
                yValueFormatString: "#,### Jiwa",
                dataPoints: <?php echo json_encode($laki, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "stackedColumn",
                name: "Perempuan",
                showInLegend: true,
                yValueFormatString: "#,### Jiwa",
                dataPoints: <?php echo json_encode($perempuan, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart1.render();

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart1.render();
        }

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,

            data: [{
                type: "pie",
                indexLabel: "{y}",
                yValueFormatString: "#,###\" jiwa\"",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "#36454F",
                indexLabelFontSize: 18,
                indexLabelFontWeight: "bolder",
                showInLegend: true,
                legendText: "{label}",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>