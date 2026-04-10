<div class='col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Statistik - Data Pokja III</h1>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- SUMMARY CARDS -->
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-primary">
        <div class="content">
            <h2 id="total_kader_3"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Pokja III</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-success">
        <div class="content">
            <h2 id="total_industri"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Industri Rtg</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-warning">
        <div class="content">
            <h2 id="total_pangan"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Pangan Keluarga</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-danger">
        <div class="content">
            <h2 id="total_rumahsehat"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Rumah Sehat</span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- CHARTS ROW -->
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Kategori Kader Pokja III</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="kaderBarChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Industri Rumah Tangga</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="industriPieChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="clearfix"></div>

<div id="loading-spinner" class="text-center" style="padding: 50px; display: none;">
    <i class="fa fa-spinner fa-spin fa-3x" style="color: #666;"></i>
    <p style="margin-top:10px; font-weight:bold;">Memuat Visualisasi...</p>
</div>

<!-- MAIN DATATABLE AREA STARTS -->
<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">Data Detail Pokja III Tingkat Kecamatan Wilayah Kabupaten Bandung</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="pkk-pokja3" class="table table-striped dt-responsive display" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Kecamatan</th>
                                    <th colspan="3" class="text-center">Jumlah Kader</th>
                                    <th colspan="4" class="text-center">Pangan Keluarga</th>
                                    <th colspan="3" class="text-center">Industri Rtg</th>
                                    <th colspan="2" class="text-center">Rumah</th>
                                </tr>
                                <tr>
                                    <th>Pangan</th>
                                    <th>Sandang</th>
                                    <th>Tata Laksana</th>
                                    
                                    <th>Beras</th>
                                    <th>Non Beras</th>
                                    <th>Peternakan</th>
                                    <th>Perikanan</th>

                                    <th>Pangan</th>
                                    <th>Sandang</th>
                                    <th>Jasa</th>

                                    <th>Sehat</th>
                                    <th>Tidak Sehat</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
window.addEventListener('load', function() {
    fetch('<?= base_url('index.php/api/data/Api_pokja3') ?>')
    .then(res => res.json())
    .then(response => {
        let data = response.data || [];

        let kader_pangan = 0, kader_sandang = 0, kader_tata = 0;
        let industri_pangan = 0, industri_sandang = 0, industri_jasa = 0;
        let pangan_beras = 0, pangan_nonberas = 0, pangan_peternakan = 0, pangan_perikanan = 0;
        let rumah_sehat = 0;

        let tableHtml = '';

        data.forEach(item => {
            kader_pangan += parseInt(item.kader_pangan || 0);
            kader_sandang += parseInt(item.kader_sandang || 0);
            kader_tata += parseInt(item.kader_tatalaksana_rumahtangga || 0);

            industri_pangan += parseInt(item.industri_pangan || 0);
            industri_sandang += parseInt(item.insdustri_sandang || 0); // Typo di DB
            industri_jasa += parseInt(item.industri_jasa || 0);

            pangan_beras += parseInt(item.pangan_beras || 0);
            pangan_nonberas += parseInt(item.pangan_nonberas || 0);
            pangan_peternakan += parseInt(item.pangan_peternakan || 0);
            pangan_perikanan += parseInt(item.pangan_perikanan || 0);

            rumah_sehat += parseInt(item.rumah_sehat || 0);

            tableHtml += `<tr>
                <td>${item.Nama_Kecamatan || '-'}</td>
                <td>${parseInt(item.kader_pangan || 0)}</td>
                <td>${parseInt(item.kader_sandang || 0)}</td>
                <td>${parseInt(item.kader_tatalaksana_rumahtangga || 0)}</td>
                <td>${parseInt(item.pangan_beras || 0)}</td>
                <td>${parseInt(item.pangan_nonberas || 0)}</td>
                <td>${parseInt(item.pangan_peternakan || 0)}</td>
                <td>${parseInt(item.pangan_perikanan || 0)}</td>
                <td>${parseInt(item.industri_pangan || 0)}</td>
                <td>${parseInt(item.insdustri_sandang || 0)}</td>
                <td>${parseInt(item.industri_jasa || 0)}</td>
                <td>${parseInt(item.rumah_sehat || 0)}</td>
                <td>${parseInt(item.rumah_tidaksehat || 0)}</td>
            </tr>`;
        });

        document.getElementById('total_kader_3').innerText = (kader_pangan + kader_sandang + kader_tata).toLocaleString('id-ID');
        document.getElementById('total_industri').innerText = (industri_pangan + industri_sandang + industri_jasa).toLocaleString('id-ID');
        document.getElementById('total_pangan').innerText = (pangan_beras + pangan_nonberas + pangan_peternakan + pangan_perikanan).toLocaleString('id-ID');
        document.getElementById('total_rumahsehat').innerText = rumah_sehat.toLocaleString('id-ID');

        let tbody = document.querySelector('#pkk-pokja3 tbody');
        if(tbody) tbody.innerHTML = tableHtml;

        // Initialize ChartJS v1
        if (typeof Chart !== 'undefined') {
            // Bar Chart
            let ctxBar = document.getElementById("kaderBarChart").getContext("2d");
            let barChartData = {
                labels: ["Kader Pangan", "Kader Sandang", "Kader Tata Laksana"],
                datasets: [{
                    label: 'Jumlah Kader',
                    fillColor: 'rgba(54, 162, 235, 0.7)',
                    strokeColor: 'rgba(54, 162, 235, 1)',
                    highlightFill: 'rgba(54, 162, 235, 0.9)',
                    data: [kader_pangan, kader_sandang, kader_tata]
                }]
            };
            new Chart(ctxBar).Bar(barChartData, { responsive: true, maintainAspectRatio: false });

            // Pie Chart
            let ctxPie = document.getElementById("industriPieChart").getContext("2d");
            let pieData = [
                { value: industri_pangan, color: "#FF6384", highlight: "#FF8A9F", label: "Pangan" },
                { value: industri_sandang, color: "#36A2EB", highlight: "#42A5F5", label: "Sandang" },
                { value: industri_jasa, color: "#FFCE56", highlight: "#FFD54F", label: "Jasa" }
            ];
            new Chart(ctxPie).Pie(pieData, { responsive: true, maintainAspectRatio: false });
        }
    })
    .catch(err => {
        console.error("Terjadi kesalahan:", err);
        let spinner = document.getElementById('loading-spinner');
        if(spinner) {
            spinner.style.display = 'block';
            spinner.innerHTML = '<p class="text-danger">Gagal memuat visualisasi API.</p>';
        }
    });
});
</script>