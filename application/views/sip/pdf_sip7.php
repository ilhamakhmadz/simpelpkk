<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SIP 7 - Rekapitulasi Hasil Kegiatan Posyandu</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.4;
        }
        
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .header h1 {
            font-size: 16pt;
            text-transform: uppercase;
            margin: 0 0 5px 0;
            color: #111;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        
        .header h2 {
            font-size: 12pt;
            margin: 0;
            color: #444;
            font-weight: normal;
        }
        
        .meta-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        
        .meta-table td {
            padding: 4px 8px;
            vertical-align: top;
            font-size: 10pt;
        }
        
        .meta-label {
            font-weight: bold;
            width: 15%;
        }
        
        .meta-separator {
            width: 2%;
            text-align: center;
        }
        
        .meta-value {
            width: 33%;
            border-bottom: 1px dotted #888;
        }
        
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        
        .report-table th, .report-table td {
            border: 1px solid #000;
            padding: 8px 10px;
            font-size: 10pt;
        }
        
        .report-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }
        
        .report-table td.text-left {
            text-align: left;
        }
        
        .report-table td.text-center {
            text-align: center;
        }
        
        .report-table td.text-right {
            text-align: right;
        }
        
        .report-table td.bold {
            font-weight: bold;
        }
        
        .signature-section {
            width: 100%;
            margin-top: 40px;
        }
        
        .signature-section td {
            font-size: 10pt;
            text-align: center;
            vertical-align: top;
        }
        
        .signature-title {
            margin-bottom: 65px;
        }
        
        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Rekapitulasi Hasil Kegiatan Posyandu (SIP 7)</h1>
        <h2>Sistem Informasi Posyandu - Pemberdayaan dan Kesejahteraan Keluarga (PKK)</h2>
    </div>

    <!-- Metadata Section -->
    <table class="meta-table">
        <tr>
            <td class="meta-label">Nama Posyandu</td>
            <td class="meta-separator">:</td>
            <td class="meta-value bold"><?php echo htmlspecialchars($posyandu_details->nama_posyandu); ?></td>
            
            <td class="meta-label">Desa / Kelurahan</td>
            <td class="meta-separator">:</td>
            <td class="meta-value"><?php echo htmlspecialchars($posyandu_details->Nama_Desa); ?></td>
        </tr>
        <tr>
            <td class="meta-label">Periode Bulan</td>
            <td class="meta-separator">:</td>
            <td class="meta-value bold"><?php echo $nama_bulan; ?></td>
            
            <td class="meta-label">Kecamatan</td>
            <td class="meta-separator">:</td>
            <td class="meta-value"><?php echo htmlspecialchars($posyandu_details->Nama_Kecamatan); ?></td>
        </tr>
        <tr>
            <td class="meta-label">Tahun Laporan</td>
            <td class="meta-separator">:</td>
            <td class="meta-value bold"><?php echo $tahun; ?></td>
            
            <td class="meta-label">Dusun / RW / RT</td>
            <td class="meta-separator">:</td>
            <td class="meta-value">
                Dusun: <?php echo htmlspecialchars($posyandu_details->nama_dusun ? $posyandu_details->nama_dusun : '-'); ?> | 
                RW: <?php echo htmlspecialchars($posyandu_details->rw); ?><?php echo $posyandu_details->rt ? ' | RT: '.htmlspecialchars($posyandu_details->rt) : ''; ?>
            </td>
        </tr>
    </table>

    <!-- Table Section -->
    <table class="report-table">
        <thead>
            <tr>
                <th rowspan="2" style="width: 5%; text-align: center;">No</th>
                <th rowspan="2" style="width: 30%; text-align: left;">Jenis Kegiatan / Layanan</th>
                <th rowspan="2" style="width: 15%; text-align: center;">Frekuensi Pelayanan</th>
                <th colspan="2" style="width: 20%; text-align: center;">Jumlah Pengunjung</th>
                <th colspan="2" style="width: 20%; text-align: center;">Jumlah Petugas Hadir</th>
                <th rowspan="2" style="width: 15%; text-align: left;">Keterangan</th>
            </tr>
            <tr>
                <th style="width: 10%; text-align: center;">Laki-Laki</th>
                <th style="width: 10%; text-align: center;">Perempuan</th>
                <th style="width: 10%; text-align: center;">Laki-Laki</th>
                <th style="width: 10%; text-align: center;">Perempuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($activities as $act): ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-left bold"><?php echo htmlspecialchars($act['jenis_kegiatan']); ?></td>
                    <td class="text-center"><?php echo $act['frekuensi']; ?> kali</td>
                    <td class="text-center"><?php echo $act['pengunjung_l']; ?></td>
                    <td class="text-center"><?php echo $act['pengunjung_p']; ?></td>
                    <td class="text-center"><?php echo $act['petugas_l']; ?></td>
                    <td class="text-center"><?php echo $act['petugas_p']; ?></td>
                    <td class="text-left"><?php echo htmlspecialchars($act['keterangan'] ? $act['keterangan'] : '-'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Signature block at bottom -->
    <table class="signature-section">
        <tr>
            <td style="width: 45%;">
                <div class="signature-title">Mengetahui,<br>Ketua TP PKK Desa / Kelurahan</div>
                <div class="signature-name">(......................................................)</div>
                <div>NIP / No. Anggota</div>
            </td>
            <td style="width: 10%;"></td>
            <td style="width: 45%;">
                <div class="signature-title">
                    Dilaporkan tanggal: <?php echo date("d F Y"); ?><br>
                    Pengelola Posyandu <?php echo htmlspecialchars($posyandu_details->nama_posyandu); ?>
                </div>
                <div class="signature-name"><?php echo htmlspecialchars($posyandu_details->pengelola ? $posyandu_details->pengelola : '......................................................'); ?></div>
                <div>Ketua Pengelola</div>
            </td>
        </tr>
    </table>

</body>
</html>
