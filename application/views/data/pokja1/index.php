<div class='col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Statistik - Data Pokja I</h1>
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
            <h2 id="total_kader_1"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Pokja I</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-success">
        <div class="content">
            <h2 id="total_anggota_simulasi"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Anggota Simulasi & Pola Asuh</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-warning">
        <div class="content">
            <h2 id="total_lansia"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Anggota Lansia</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-danger">
        <div class="content">
            <h2 id="total_gotong_royong"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kelp. Gotong Royong</span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- CHARTS ROW -->
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Kategori Kader Pokja I</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="kaderBarChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Kelompok Gotong Royong</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="gotongRoyongPieChart" height="200"></canvas>
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
            <h2 class="title pull-left">Data Detail Pokja I Tingkat Kecamatan Wilayah Kabupaten Bandung</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="pkk-pokja1" class="table table-striped dt-responsive display" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Kecamatan</th>
                                    <th colspan="3" class="text-center">Jumlah Kader</th>
                                    <th colspan="4" class="text-center">Klp. Simulasi & Anggota</th>
                                    <th colspan="5" class="text-center">Kelompok Gotong Royong</th>
                                </tr>
                                <tr>
                                    <th>PKBN</th>
                                    <th>PKDRT</th>
                                    <th>Pola Asuh</th>
                                    
                                    <th>PKBN (Klp/Angg)</th>
                                    <th>PKDRT (Klp/Angg)</th>
                                    <th>P. Asuh (Klp/Angg)</th>
                                    <th>Lansia (Klp/Angg)</th>

                                    <th>Kerja Bakti</th>
                                    <th>Rukun Kematian</th>
                                    <th>Keagamaan</th>
                                    <th>Jimpitan</th>
                                    <th>Arisan</th>
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
    document.getElementById('total_kader_1').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_anggota_simulasi').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_lansia').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    document.getElementById('total_gotong_royong').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

    let url = '<?= base_url('index.php/api/data/Api_pokja1') ?>' + '?year=' + year + '&kec_id=' + kecId;
    fetch(url)
    .then(res => res.json())
    .then(response => {
        let data = Array.isArray(response) ? response : (response.data || []);

        let kader_pkbn = 0, kader_pkdrt = 0, kader_polaasuh = 0;
        let pkbn_angg = 0, pkdrt_angg = 0, polaasuh_angg = 0, lansia_angg = 0;
        let kerja_bakti = 0, kematian = 0, keagamaan = 0, jimpitan = 0, arisan = 0;

        let tableHtml = '';

        data.forEach(item => {
            kader_pkbn += parseInt(item.kader_pkbn || 0);
            kader_pkdrt += parseInt(item.kader_pkdrt || 0);
            kader_polaasuh += parseInt(item.kader_polaasuh || 0);

            pkbn_angg += parseInt(item.pkbn_angg || 0);
            pkdrt_angg += parseInt(item.pkdrt_angg || 0);
            polaasuh_angg += parseInt(item.polaasuh_anggota || 0);
            lansia_angg += parseInt(item.lansia_angg || 0);

            kerja_bakti += parseInt(item.kelompok_kerjabakti || 0);
            kematian += parseInt(item.kelompok_kematian || 0);
            keagamaan += parseInt(item.kelompok_keagamaan || 0);
            jimpitan += parseInt(item.kelompok_jimpitan || 0);
            arisan += parseInt(item.kelompok_arisan || 0);

            tableHtml += `<tr>
                <td>${item.Nama_Kecamatan || '-'}</td>
                <td>${parseInt(item.kader_pkbn || 0)}</td>
                <td>${parseInt(item.kader_pkdrt || 0)}</td>
                <td>${parseInt(item.kader_polaasuh || 0)}</td>
                <td>${parseInt(item.pkbn_klpsimulasi || 0)} / ${parseInt(item.pkbn_angg || 0)}</td>
                <td>${parseInt(item.pkdrt_klpsimulasi || 0)} / ${parseInt(item.pkdrt_angg || 0)}</td>
                <td>${parseInt(item.polaasuh_klp || 0)} / ${parseInt(item.polaasuh_anggota || 0)}</td>
                <td>${parseInt(item.lansia_klp || 0)} / ${parseInt(item.lansia_angg || 0)}</td>
                <td>${parseInt(item.kelompok_kerjabakti || 0)}</td>
                <td>${parseInt(item.kelompok_kematian || 0)}</td>
                <td>${parseInt(item.kelompok_keagamaan || 0)}</td>
                <td>${parseInt(item.kelompok_jimpitan || 0)}</td>
                <td>${parseInt(item.kelompok_arisan || 0)}</td>
            </tr>`;
        });

        document.getElementById('total_kader_1').innerText = (kader_pkbn + kader_pkdrt + kader_polaasuh).toLocaleString('id-ID');
        document.getElementById('total_anggota_simulasi').innerText = (pkbn_angg + pkdrt_angg + polaasuh_angg).toLocaleString('id-ID');
        document.getElementById('total_lansia').innerText = lansia_angg.toLocaleString('id-ID');
        document.getElementById('total_gotong_royong').innerText = (kerja_bakti + kematian + keagamaan + jimpitan + arisan).toLocaleString('id-ID');

        let tbody = document.querySelector('#pkk-pokja1 tbody');
        if(tbody) tbody.innerHTML = tableHtml;

        // Initialize ChartJS v1
        if (typeof Chart !== 'undefined') {
            // Bar Chart
            let ctxBar = document.getElementById("kaderBarChart").getContext("2d");
            let barChartData = {
                labels: ["PKBN", "PKDRT", "Pola Asuh"],
                datasets: [{
                    label: 'Jumlah Kader',
                    fillColor: 'rgba(54, 162, 235, 0.7)',
                    strokeColor: 'rgba(54, 162, 235, 1)',
                    highlightFill: 'rgba(54, 162, 235, 0.9)',
                    data: [kader_pkbn, kader_pkdrt, kader_polaasuh]
                }]
            };
            if (window.myBarChart) {
                window.myBarChart.destroy();
            }
            window.myBarChart = new Chart(ctxBar).Bar(barChartData, { responsive: true, maintainAspectRatio: false });

            // Pie Chart
            let ctxPie = document.getElementById("gotongRoyongPieChart").getContext("2d");
            let totalGotongRoyong = kerja_bakti + kematian + keagamaan + jimpitan + arisan;
            let pieData = totalGotongRoyong > 0 ? [
                { value: kerja_bakti, color: "#FF6384", highlight: "#FF8A9F", label: "Kerja Bakti" },
                { value: kematian, color: "#36A2EB", highlight: "#42A5F5", label: "Kematian" },
                { value: keagamaan, color: "#FFCE56", highlight: "#FFD54F", label: "Keagamaan" },
                { value: jimpitan, color: "#4BC0C0", highlight: "#26A69A", label: "Jimpitan" },
                { value: arisan, color: "#9966FF", highlight: "#B39DDB", label: "Arisan" }
            ] : [
                { value: 1, color: "#EEEEEE", highlight: "#E0E0E0", label: "Belum Ada Data" }
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