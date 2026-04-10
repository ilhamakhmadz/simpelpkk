<div class='col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Statistik - Data Umum PKK</h1>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- SUMMARY CARDS -->
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-primary">
        <div class="content">
            <h2 id="total_kk"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kepala Keluarga (KK)</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-success">
        <div class="content">
            <h2 id="total_jiwa"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Jiwa</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-warning">
        <div class="content">
            <h2 id="total_kader_umum"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Umum</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-danger">
        <div class="content">
            <h2 id="total_kader_khusus"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Khusus</span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div id="loading-spinner" class="text-center" style="padding: 50px; display: none;">
    <i class="fa fa-spinner fa-spin fa-3x" style="color: #666;"></i>
    <p style="margin-top:10px; font-weight:bold;">Memuat Visualisasi...</p>
</div>

<!-- CHARTS ROW -->
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Jenis Kelamin Kader</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="kaderBarChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Komposisi Penduduk Berdasarkan Gender</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="pendudukPieChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="clearfix"></div>

<!-- MAIN CONTENT AREA STARTS -->
<div class="col-lg-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Tabel Data Umum PKK Tingkat Kecamatan</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="pkk-umum" class="table vm trans table-small-font no-mb table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">Nama Kecamatan</th>
                                    <th colspan="3">Jumlah Kelompok</th>
                                    <th colspan="2">Jumlah KK</th>
                                    <th colspan="2">Jumlah Jiwa</th>
                                    <th colspan="2">Anggota TP PKK</th>
                                    <th colspan="2">Kader PKK Umum</th>
                                    <th colspan="2">Kader PKK Khusus</th>
                                </tr>
                                <tr>
                                    <th>PKK RW</th>
                                    <th>PKK RT</th>
                                    <th>DASA WISMA</th>
                                    <th>KRT</th>
                                    <th>KK</th>
                                    <th>L</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>P</th>
                                    <th>L</th>
                                    <th>P</th>
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
document.addEventListener("DOMContentLoaded", function() {
    fetch('<?= base_url('index.php/api/data/Api_umum') ?>')
    .then(res => res.json())
    .then(response => {
        let data = response.data || [];
        
        // --- Aggregations ---
        let totalKK = 0;
        let totalJiwaLaki = 0, totalJiwaPerempuan = 0;
        let kaderUmumLaki = 0, kaderUmumPerempuan = 0;
        let kaderKhususLaki = 0, kaderKhususPerempuan = 0;
        let tpLaki = 0, tpPerempuan = 0;

        let tableHtml = '';

        data.forEach(item => {
            totalKK += parseInt(item.jml_kk || 0);
            totalJiwaLaki += parseInt(item.jml_laki || 0);
            totalJiwaPerempuan += parseInt(item.jml_perempuan || 0);
            
            kaderUmumLaki += parseInt(item.jml_kader_umum_laki || 0);
            kaderUmumPerempuan += parseInt(item.jml_kader_umum_perempuan || 0);
            
            kaderKhususLaki += parseInt(item.jml_kader_khusus_laki || 0);
            kaderKhususPerempuan += parseInt(item.jml_kader_khusus_perempuan || 0);
            
            tpLaki += parseInt(item.jml_anggota_tp_pkk_laki || 0);
            tpPerempuan += parseInt(item.jml_anggota_tp_pkk_perempuan || 0);

            // Populate Table
            tableHtml += `<tr>
                <td>${item.Nama_Kecamatan || '-'}</td>
                <td>${parseInt(item.jml_kelompok_pkk_rw || 0)}</td>
                <td>${parseInt(item.jml_kelompok_pkk_rt || 0)}</td>
                <td>${parseInt(item.jml_kelompok_dasawisma || 0)}</td>
                <td>${parseInt(item.jml_krt || 0)}</td>
                <td>${parseInt(item.jml_kk || 0)}</td>
                <td>${parseInt(item.jml_laki || 0)}</td>
                <td>${parseInt(item.jml_perempuan || 0)}</td>
                <td>${parseInt(item.jml_anggota_tp_pkk_laki || 0)}</td>
                <td>${parseInt(item.jml_anggota_tp_pkk_perempuan || 0)}</td>
                <td>${parseInt(item.jml_kader_umum_laki || 0)}</td>
                <td>${parseInt(item.jml_kader_umum_perempuan || 0)}</td>
                <td>${parseInt(item.jml_kader_khusus_laki || 0)}</td>
                <td>${parseInt(item.jml_kader_khusus_perempuan || 0)}</td>
            </tr>`;
        });

        // Set Top Counters
        document.getElementById('total_kk').innerText = totalKK.toLocaleString('id-ID');
        document.getElementById('total_jiwa').innerText = (totalJiwaLaki + totalJiwaPerempuan).toLocaleString('id-ID');
        document.getElementById('total_kader_umum').innerText = (kaderUmumLaki + kaderUmumPerempuan).toLocaleString('id-ID');
        document.getElementById('total_kader_khusus').innerText = (kaderKhususLaki + kaderKhususPerempuan).toLocaleString('id-ID');

        // Set Table
        let tbody = document.querySelector('#pkk-umum tbody');
        if(tbody) tbody.innerHTML = tableHtml;

        // Initialize ChartJS v1
        if (typeof Chart !== 'undefined') {
            // 2. Bar Chart
            let ctxBar = document.getElementById("kaderBarChart").getContext("2d");
            let barChartData = {
                labels: ["Anggota TP PKK", "Kader Umum", "Kader Khusus"],
                datasets: [
                    {
                        label: 'Laki-laki',
                        fillColor: 'rgba(54, 162, 235, 0.7)',
                        strokeColor: 'rgba(54, 162, 235, 1)',
                        highlightFill: 'rgba(54, 162, 235, 0.9)',
                        data: [tpLaki, kaderUmumLaki, kaderKhususLaki]
                    },
                    {
                        label: 'Perempuan',
                        fillColor: 'rgba(255, 99, 132, 0.7)',
                        strokeColor: 'rgba(255, 99, 132, 1)',
                        highlightFill: 'rgba(255, 99, 132, 0.9)',
                        data: [tpPerempuan, kaderUmumPerempuan, kaderKhususPerempuan]
                    }
                ]
            };
            new Chart(ctxBar).Bar(barChartData, { responsive: true, maintainAspectRatio: false });

            // 3. Pie Chart
            let ctxPie = document.getElementById("pendudukPieChart").getContext("2d");
            let pieData = [
                {
                    value: totalJiwaLaki,
                    color: "#36A2EB",
                    highlight: "#42A5F5",
                    label: "Laki-laki"
                },
                {
                    value: totalJiwaPerempuan,
                    color: "#FF6384",
                    highlight: "#EF5350",
                    label: "Perempuan"
                }
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