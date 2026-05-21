<div class='col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Statistik - Data Pokja IV</h1>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- FILTER CONTAINER -->
<div class="col-xs-12" style="margin-bottom: 20px;">
    <div class="box" style="border: 1px solid #e5e5e5; border-radius: 8px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.05); margin-bottom: 0;">
        <div class="content-body" style="padding: 15px 20px;">
            <form id="filter-form" class="form-inline">
                <div class="form-group" style="margin-right: 25px; margin-bottom: 0;">
                    <label for="filter_kecamatan" style="font-weight: bold; margin-right: 10px; color: #444; font-size: 14px;">Kecamatan:</label>
                    <select id="filter_kecamatan" name="kec_id" class="form-control select2" style="min-width: 250px;">
                        <option value="">Semua Kecamatan</option>
                        <?php foreach($list_kecamatan as $kec): ?>
                            <option value="<?= $kec->Kd_Kec ?>"><?= htmlspecialchars($kec->Nama_Kecamatan) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="margin-right: 25px; margin-bottom: 0;">
                    <label for="filter_tahun" style="font-weight: bold; margin-right: 10px; color: #444; font-size: 14px;">Tahun:</label>
                    <select id="filter_tahun" name="year" class="form-control" style="min-width: 150px; height: 34px;">
                        <option value="">Semua Tahun</option>
                        <?php foreach($list_tahun as $thn): ?>
                            <option value="<?= $thn->tahun ?>"><?= $thn->tahun ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="font-weight: bold; padding: 6px 20px; border-radius: 4px; height: 34px; margin-bottom: 0;">
                    <i class="fa fa-filter"></i> Filter
                </button>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- SUMMARY CARDS -->
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-primary">
        <div class="content">
            <h2 id="total_kader_4"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Pokja IV</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-success">
        <div class="content">
            <h2 id="total_posyandu"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Posyandu</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-warning">
        <div class="content">
            <h2 id="total_akseptor"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Akseptor KB</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-danger">
        <div class="content">
            <h2 id="total_puswus"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total PUS & WUS</span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- CHARTS ROW -->
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Kategori Kader Pokja IV</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="kaderBarChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Sumber Air Keluarga</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="airPieChart" height="200"></canvas>
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
            <h2 class="title pull-left">Data Detail Pokja IV Tingkat Kecamatan Wilayah Kabupaten Bandung</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="pkk-pokja4" class="table table-striped dt-responsive display" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Kecamatan</th>
                                    <th colspan="6" class="text-center">Jumlah Kader</th>
                                    <th colspan="3" class="text-center">Kesehatan & Posyandu</th>
                                    <th colspan="3" class="text-center">Lingkungan / Sanitasi</th>
                                    <th colspan="3" class="text-center">Sumber Air</th>
                                    <th colspan="4" class="text-center">Keluarga Berencana (KB)</th>
                                </tr>
                                <tr>
                                    <!-- Kader -->
                                    <th>Posyandu</th>
                                    <th>Gizi</th>
                                    <th>Kesling</th>
                                    <th>Narkoba</th>
                                    <th>PHBS</th>
                                    <th>KB</th>
                                    
                                    <!-- Kesehatan -->
                                    <th>Jml Posyandu</th>
                                    <th>Terintegrasi</th>
                                    <th>Lansia Anggota</th>
                                    
                                    <!-- Lingkungan -->
                                    <th>Jamban</th>
                                    <th>SPAI</th>
                                    <th>Sampah</th>
                                    
                                    <!-- Air -->
                                    <th>PDAM</th>
                                    <th>Sumur</th>
                                    <th>Lainnya</th>

                                    <!-- KB -->
                                    <th>PUS</th>
                                    <th>WUS</th>
                                    <th>Akseptor (L)</th>
                                    <th>Akseptor (P)</th>
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
function loadData(year = '', kecId = '') {
    // Show spinner in cards
    document.getElementById('total_kader_4').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_posyandu').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_akseptor').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_puswus').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

    let url = '<?= base_url('index.php/api/data/Api_pokja4') ?>' + '?year=' + year + '&kec_id=' + kecId;
    fetch(url)
    .then(res => res.json())
    .then(response => {
        let data = Array.isArray(response) ? response : (response.data || []);

        let kader_pos = 0, kader_gizi = 0, kader_kesling = 0, kader_narkoba = 0, kader_phbs = 0, kader_kb = 0;
        let posyandu_jml = 0, akseptor_kb = 0, pus_wus = 0;
        let air_pdam = 0, air_sumur = 0, air_lainnya = 0;

        let tableHtml = '';

        data.forEach(item => {
            let pos = parseInt(item.kader_posyandu || 0);
            let gz = parseInt(item.kader_gizi || 0);
            let kl = parseInt(item.kader_kesling || 0);
            let nk = parseInt(item.kader_penyuluhan_narkoba || 0);
            let pbs = parseInt(item.kader_phbs || 0);
            let kb = parseInt(item.kader_kb || 0);

            kader_pos += pos;
            kader_gizi += gz;
            kader_kesling += kl;
            kader_narkoba += nk;
            kader_phbs += pbs;
            kader_kb += kb;

            posyandu_jml += parseInt(item.kes_posyandu_jml || 0);
            
            akseptor_kb += parseInt(item.akseptor_kb_l || 0) + parseInt(item.akseptor_kb_p || 0);
            pus_wus += parseInt(item.jum_pus || 0) + parseInt(item.jum_wus || 0);

            air_pdam += parseInt(item.krt_pdam || 0);
            air_sumur += parseInt(item.krt_sumur || 0);
            air_lainnya += parseInt(item.krt_lainnya || 0);

            tableHtml += `<tr>
                <td>${item.Nama_Kecamatan || '-'}</td>
                <td>${pos}</td>
                <td>${gz}</td>
                <td>${kl}</td>
                <td>${nk}</td>
                <td>${pbs}</td>
                <td>${kb}</td>
                <td>${parseInt(item.kes_posyandu_jml || 0)}</td>
                <td>${parseInt(item.kes_posyandu_terintegrasi || 0)}</td>
                <td>${parseInt(item.kes_posyandu_lansia_anggota || 0)}</td>
                <td>${parseInt(item.rumah_jamban || 0)}</td>
                <td>${parseInt(item.rumah_spai || 0)}</td>
                <td>${parseInt(item.rumah_pembuangan_sampah || 0)}</td>
                <td>${parseInt(item.krt_pdam || 0)}</td>
                <td>${parseInt(item.krt_sumur || 0)}</td>
                <td>${parseInt(item.krt_lainnya || 0)}</td>
                <td>${parseInt(item.jum_pus || 0)}</td>
                <td>${parseInt(item.jum_wus || 0)}</td>
                <td>${parseInt(item.akseptor_kb_l || 0)}</td>
                <td>${parseInt(item.akseptor_kb_p || 0)}</td>
            </tr>`;
        });

        document.getElementById('total_kader_4').innerText = (kader_pos + kader_gizi + kader_kesling + kader_narkoba + kader_phbs + kader_kb).toLocaleString('id-ID');
        document.getElementById('total_posyandu').innerText = posyandu_jml.toLocaleString('id-ID');
        document.getElementById('total_akseptor').innerText = akseptor_kb.toLocaleString('id-ID');
        document.getElementById('total_puswus').innerText = pus_wus.toLocaleString('id-ID');

        let tbody = document.querySelector('#pkk-pokja4 tbody');
        if(tbody) tbody.innerHTML = tableHtml;

        // Initialize ChartJS v1
        if (typeof Chart !== 'undefined') {
            // Bar Chart
            let ctxBar = document.getElementById("kaderBarChart").getContext("2d");
            let barChartData = {
                labels: ["Posyandu", "Gizi", "Kesling", "Narkoba", "PHBS", "KB"],
                datasets: [{
                    label: 'Jumlah Kader',
                    fillColor: 'rgba(54, 162, 235, 0.7)',
                    strokeColor: 'rgba(54, 162, 235, 1)',
                    highlightFill: 'rgba(54, 162, 235, 0.9)',
                    data: [kader_pos, kader_gizi, kader_kesling, kader_narkoba, kader_phbs, kader_kb]
                }]
            };
            if (window.myBarChart) {
                window.myBarChart.destroy();
            }
            window.myBarChart = new Chart(ctxBar).Bar(barChartData, { responsive: true, maintainAspectRatio: false });

            // Pie Chart
            let ctxPie = document.getElementById("airPieChart").getContext("2d");
            let totalAir = air_pdam + air_sumur + air_lainnya;
            let pieData = totalAir > 0 ? [
                { value: air_pdam, color: "#36A2EB", highlight: "#42A5F5", label: "PDAM" },
                { value: air_sumur, color: "#4BC0C0", highlight: "#26A69A", label: "Sumur" },
                { value: air_lainnya, color: "#FFCE56", highlight: "#FFD54F", label: "Lainnya" }
            ] : [
                { value: 1, color: "#EEEEEE", highlight: "#E0E0E0", label: "Belum Ada Data Air" }
            ];
            if (window.myPieChart) {
                window.myPieChart.destroy();
            }
            window.myPieChart = new Chart(ctxPie).Pie(pieData, { responsive: true, maintainAspectRatio: false });
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
}

window.addEventListener('load', function() {
    loadData();

    // Setup filter form submit listener
    let filterForm = document.getElementById('filter-form');
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            let year = document.getElementById('filter_tahun').value;
            let kecId = document.getElementById('filter_kecamatan').value;
            loadData(year, kecId);
        });
    }
});
</script>