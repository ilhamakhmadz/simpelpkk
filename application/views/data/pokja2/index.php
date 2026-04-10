<div class='col-xs-12'>
    <div class="page-title">
        <div class="pull-left">
            <h1 class="title">Statistik - Data Pokja II</h1>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- SUMMARY CARDS -->
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-primary">
        <div class="content">
            <h2 id="total_butahuruf"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Warga Buta Huruf</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-success">
        <div class="content">
            <h2 id="total_tamanbacaan"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Taman Bacaan</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-warning">
        <div class="content">
            <h2 id="total_kader_khusus"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kader Khusus</span>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="tile-counter bg-danger">
        <div class="content">
            <h2 id="total_koperasi"><i class="fa fa-spinner fa-spin"></i></h2>
            <div class="clearfix"></div>
            <span>Total Kelompok Koperasi</span>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- CHARTS ROW -->
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Kategori Kader Khusus</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="kaderBarChart" height="200"></canvas>
        </div>
    </section>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
    <section class="box">
        <header class="panel_header">
            <h2 class="title pull-left">Distribusi Tahapan Koperasi</h2>
        </header>
        <div class="content-body" style="padding-top:15px; padding-bottom:15px;">
            <canvas id="koperasiPieChart" height="200"></canvas>
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
            <h2 class="title pull-left">Data Detail Pokja II Tingkat Kecamatan Wilayah Kabupaten Bandung</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="pkk-pokja2" class="table table-striped dt-responsive display" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Kecamatan</th>
                                    <th rowspan="2" class="align-middle border-start">Buta Huruf</th>
                                    <th colspan="2" class="text-center border-start">Paket A</th>
                                    <th colspan="2" class="text-center border-start">Paket B</th>
                                    <th colspan="2" class="text-center border-start">Paket C</th>
                                    <th colspan="2" class="text-center border-start">KF</th>
                                    <th rowspan="2" class="align-middle border-start">PAUD Sejenis</th>
                                    <th rowspan="2" class="align-middle">Taman Bacaan</th>
                                    <th colspan="4" class="text-center border-start">BKB</th>
                                    <th colspan="5" class="text-center border-start">Kader Khusus</th>
                                    <th colspan="3" class="text-center border-start">Kader Dilatih</th>
                                    <th colspan="2" class="text-center border-start">Koperasi Pemula</th>
                                    <th colspan="2" class="text-center border-start">Koperasi Madya</th>
                                    <th colspan="2" class="text-center border-start">Koperasi Utama</th>
                                    <th colspan="2" class="text-center border-start">Kop. Mandiri</th>
                                    <th colspan="2" class="text-center border-start">Kop. Berbadan Hukum</th>
                                </tr>
                                <tr>
                                    <!-- Paket A -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Paket B -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Paket C -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- KF -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    
                                    <!-- BKB -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <th>APE</th>
                                    <th>Simulasi</th>
                                    
                                    <!-- Kader Khusus -->
                                    <th class="border-start">Tutor KF</th>
                                    <th>Tutor PAUD</th>
                                    <th>BKB</th>
                                    <th>Koperasi</th>
                                    <th>Keteramp.</th>

                                    <!-- Kader Dilatih -->
                                    <th class="border-start">LP3PKK</th>
                                    <th>TPK3PKK</th>
                                    <th>DAMAS</th>
                                    
                                    <!-- Kop Pemula -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Kop Madya -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Kop Utama -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Kop Mandiri -->
                                    <th class="border-start">Klp</th>
                                    <th>Peserta</th>
                                    <!-- Kop Berbadan Hukum -->
                                    <th class="border-start">Klp</th>
                                    <th>Anggota</th>
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
    fetch('<?= base_url('index.php/api/data/Api_pokja2') ?>')
    .then(res => res.json())
    .then(response => {
        let data = response.data || [];

        let butahuruf = 0, tamanbacaan = 0;
        let tutor_kf = 0, tutor_paud = 0, bkb = 0, koperasi = 0, keterampilan = 0;
        let pemula = 0, madya = 0, utama = 0, mandiri = 0;

        let tableHtml = '';

        data.forEach(item => {
            butahuruf += parseInt(item.butahuruf || 0);
            tamanbacaan += parseInt(item.jmltamanbacaan || 0);

            tutor_kf += parseInt(item.kaderkhusus_tutorkf || 0);
            tutor_paud += parseInt(item.kaderkhusus_tutorpaud || 0);
            bkb += parseInt(item.kaderkhusus_bkb || 0);
            koperasi += parseInt(item.kaderkhusus_koperasi || 0);
            keterampilan += parseInt(item.kaderkhusus_keterampilan || 0);

            pemula += parseInt(item.koperasi_pemula_klp || 0);
            madya += parseInt(item.koperasi_madya_klp || 0);
            utama += parseInt(item.koperasi_utama_klp || 0);
            mandiri += parseInt(item.koperasi_mandiri_klp || 0);

            tableHtml += `<tr>
                <td>${item.Nama_Kecamatan || '-'}</td>
                <td class="border-start">${parseInt(item.butahuruf || 0)}</td>
                
                <td class="border-start">${parseInt(item.paketAklpbelajar || 0)}</td>
                <td>${parseInt(item.paketAwargabelajar || 0)}</td>
                
                <td class="border-start">${parseInt(item.paketBklpbelajar || 0)}</td>
                <td>${parseInt(item.paketBwargabelajar || 0)}</td>
                
                <td class="border-start">${parseInt(item.paketCklpbelajar || 0)}</td>
                <td>${parseInt(item.paketCwargabelajar || 0)}</td>
                
                <td class="border-start">${parseInt(item.kfklpbelajar || 0)}</td>
                <td>${parseInt(item.kfwargabelajar || 0)}</td>
                
                <td class="border-start">${parseInt(item.paudsejenis || 0)}</td>
                <td>${parseInt(item.jmltamanbacaan || 0)}</td>
                
                <td class="border-start">${parseInt(item.bkbklp || 0)}</td>
                <td>${parseInt(item.bkbibupeserta || 0)}</td>
                <td>${parseInt(item.bkbape || 0)}</td>
                <td>${parseInt(item.bkbsimulasi || 0)}</td>
                
                <td class="border-start">${parseInt(item.kaderkhusus_tutorkf || 0)}</td>
                <td>${parseInt(item.kaderkhusus_tutorpaud || 0)}</td>
                <td>${parseInt(item.kaderkhusus_bkb || 0)}</td>
                <td>${parseInt(item.kaderkhusus_koperasi || 0)}</td>
                <td>${parseInt(item.kaderkhusus_keterampilan || 0)}</td>
                
                <td class="border-start">${parseInt(item.kaderdilatih_lp3pkk || 0)}</td>
                <td>${parseInt(item.kaderdilatih_tpk3pkk || 0)}</td>
                <td>${parseInt(item.kaderdilatih_damaspkk || 0)}</td>
                
                <td class="border-start">${parseInt(item.koperasi_pemula_klp || 0)}</td>
                <td>${parseInt(item.koperasi_pemula_peserta || 0)}</td>
                
                <td class="border-start">${parseInt(item.koperasi_madya_klp || 0)}</td>
                <td>${parseInt(item.koperasi_madya_peserta || 0)}</td>
                
                <td class="border-start">${parseInt(item.koperasi_utama_klp || 0)}</td>
                <td>${parseInt(item.koperasi_utama_peserta || 0)}</td>
                
                <td class="border-start">${parseInt(item.koperasi_mandiri_klp || 0)}</td>
                <td>${parseInt(item.koperasi_mandiri_peserta || 0)}</td>
                
                <td class="border-start">${parseInt(item.koperasi_badanhukum_klp || 0)}</td>
                <td>${parseInt(item.koperasi_badanhukum_angg || 0)}</td>
            </tr>`;
        });

        document.getElementById('total_butahuruf').innerText = butahuruf.toLocaleString('id-ID');
        document.getElementById('total_tamanbacaan').innerText = tamanbacaan.toLocaleString('id-ID');
        
        let subtotal_kader = tutor_kf + tutor_paud + bkb + koperasi + keterampilan;
        document.getElementById('total_kader_khusus').innerText = subtotal_kader.toLocaleString('id-ID');
        
        let subtotal_koperasi = pemula + madya + utama + mandiri;
        document.getElementById('total_koperasi').innerText = subtotal_koperasi.toLocaleString('id-ID');

        let tbody = document.querySelector('#pkk-pokja2 tbody');
        if(tbody) tbody.innerHTML = tableHtml;

        // Initialize ChartJS v1
        if (typeof Chart !== 'undefined') {
            // Bar Chart
            let ctxBar = document.getElementById("kaderBarChart").getContext("2d");
            let barChartData = {
                labels: ["Tutor KF", "Tutor PAUD", "BKB", "Koperasi", "Keterampilan"],
                datasets: [{
                    label: 'Jumlah Kader',
                    fillColor: 'rgba(54, 162, 235, 0.7)',
                    strokeColor: 'rgba(54, 162, 235, 1)',
                    highlightFill: 'rgba(54, 162, 235, 0.9)',
                    data: [tutor_kf, tutor_paud, bkb, koperasi, keterampilan]
                }]
            };
            new Chart(ctxBar).Bar(barChartData, { responsive: true, maintainAspectRatio: false });

            // Doughnut Chart
            let ctxPie = document.getElementById("koperasiPieChart").getContext("2d");
            let pieData = subtotal_koperasi > 0 ? [
                { value: pemula, color: "#FF6384", highlight: "#FF8A9F", label: "Pemula" },
                { value: madya, color: "#36A2EB", highlight: "#42A5F5", label: "Madya" },
                { value: utama, color: "#FFCE56", highlight: "#FFD54F", label: "Utama" },
                { value: mandiri, color: "#4BC0C0", highlight: "#26A69A", label: "Mandiri" }
            ] : [
                { value: 1, color: "#EEEEEE", highlight: "#E0E0E0", label: "Belum Ada Data Koperasi" }
            ];
            new Chart(ctxPie).Doughnut(pieData, { responsive: true, maintainAspectRatio: false });
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