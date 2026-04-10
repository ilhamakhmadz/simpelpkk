<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Export PDF - Catatan Keluarga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
        }
        .header p {
            margin: 2px 0;
            font-size: 12px;
            font-weight: bold;
        }
        .info-table {
            width: 100%;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .info-table td {
            vertical-align: top;
            padding: 2px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        .data-table th, .data-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        @media print {
            @page {
                size: landscape;
                margin: 10mm;
            }
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            /* Menghitamkan warna meskipun pakai background-color */
            .data-table th {
                background-color: #d9d9d9 !important;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>CATATAN KELUARGA</h2>
        <p>CATATAN KELUARGA DARI ANGGOTA KELOMPOK DASA WISMA TAHUN <?php echo isset($catatan_keluarga->date_year) ? $catatan_keluarga->date_year : ''; ?></p>
    </div>

    <table class="info-table">
        <tr>
            <td width="20%">CATATAN KELUARGA DARI</td>
            <td width="2%">:</td>
            <td><?php echo isset($catatan_keluarga->nama_kepala_keluarga) ? strtoupper($catatan_keluarga->nama_kepala_keluarga) : ''; ?></td>
        </tr>
        <tr>
            <td>ANGGOTA KELOMPOK DASA WISMA</td>
            <td>:</td>
            <td><?php echo isset($dasawisma_name) ? strtoupper($dasawisma_name) : ''; ?></td>
        </tr>
        <tr>
            <td>TAHUN</td>
            <td>:</td>
            <td><?php echo isset($catatan_keluarga->date_year) ? $catatan_keluarga->date_year : ''; ?></td>
        </tr>
        <tr>
            <td>KRITERIA RUMAH</td>
            <td>:</td>
            <td><?php echo (isset($catatan_keluarga->rumah_sehat_layak_huni) && $catatan_keluarga->rumah_sehat_layak_huni == 1) ? 'Layak Huni' : 'Tidak Layak Huni'; ?></td>
        </tr>
        <tr>
            <td>JAMBAN KELUARGA</td>
            <td>:</td>
            <td><?php echo (isset($catatan_keluarga->rumah_memiliki_jamban) && $catatan_keluarga->rumah_memiliki_jamban == 1) ? 'Ada' : 'Tidak Ada'; ?></td>
        </tr>
        <tr>
            <td>SUMBER AIR</td>
            <td>:</td>
            <td>
                <?php 
                $sumber_air = array();
                if (isset($catatan_keluarga->pdam) && $catatan_keluarga->pdam == 1) {
                    $sumber_air[] = 'PDAM';
                }
                if (isset($catatan_keluarga->sumur) && $catatan_keluarga->sumur == 1) {
                    $sumber_air[] = 'Sumur';
                }
                echo !empty($sumber_air) ? implode(' atau ', $sumber_air) : 'Tidak ada';
                ?>
            </td>
        </tr>
        <tr>
            <td>TEMPAT SAMPAH</td>
            <td>:</td>
            <td><?php echo (isset($catatan_keluarga->rumah_memiliki_tps) && $catatan_keluarga->rumah_memiliki_tps == 1) ? 'Ada' : 'Tidak Ada'; ?></td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>NO KK</th>
                <th>NAMA ANGGOTA KELUARGA</th>
                <th>STATUS DALAM KELUARGA</th>
                <th>STATUS PERKAWINAN</th>
                <th>L/P</th>
                <th>TEMPAT LAHIR</th>
                <th>TGL/UMUR</th>
                <th>AGAMA</th>
                <th>PENDIDIKAN</th>
                <th>PEKERJAAN</th>
                <th>BERKEBUTUHAN KHUSUS</th>
                <th>PENGHAYATAN DAN PENGAMALAN PANCASILA</th>
                <th>GOTONG ROYONG</th>
                <th>PENDIDIKAN DAN KETRAMPILAN</th>
                <th>PENGEMBANGAN KEHIDUPAN BERKOPERASI</th>
                <th>PANGAN</th>
                <th>SANDANG</th>
                <th>KESEHATAN</th>
                <th>PERENCANAAN SEHAT</th>
                <th>KET</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($anggota) && !empty($anggota)) {
                $no = 1;
                foreach ($anggota as $item) {
                    // Hitung umur
                    if (isset($item->tanggal_lahir) && $item->tanggal_lahir) {
                        $tanggal_lahir = new DateTime($item->tanggal_lahir);
                        $today = new DateTime();
                        $umur = $today->diff($tanggal_lahir)->y;
                        $tgl_umur = date_format(date_create($item->tanggal_lahir), "d-m-Y") . ' / ' . $umur;
                    } else {
                        $tgl_umur = '';
                    }

                    $cacat = isset($item->cacat) && isset($master_cacat[$item->cacat]) ? $master_cacat[$item->cacat] : '';
                    $pancasila = isset($item->pancasila) && isset($master_pancasila[$item->pancasila]) ? $master_pancasila[$item->pancasila] : '';
                    $gotong_royong = isset($item->gotong_royong) && isset($master_gotong_royong[$item->gotong_royong]) ? $master_gotong_royong[$item->gotong_royong] : '';
                    $keterampilan = isset($item->keterampilan) && isset($master_keterampilan[$item->keterampilan]) ? $master_keterampilan[$item->keterampilan] : '';
                    $koperasi = isset($item->koperasi) && isset($master_koperasi[$item->koperasi]) ? $master_koperasi[$item->koperasi] : '';
                    $pangan = isset($item->pangan) && isset($master_pangan[$item->pangan]) ? $master_pangan[$item->pangan] : '';
                    $sandang = isset($item->sandang) && isset($master_sandang[$item->sandang]) ? $master_sandang[$item->sandang] : '';
                    $kesehatan = isset($item->kesehatan) && isset($master_kesehatan[$item->kesehatan]) ? $master_kesehatan[$item->kesehatan] : '';
                    $perencanaan_sehat = isset($item->perencanaan_sehat) && isset($master_perencanaan_sehat[$item->perencanaan_sehat]) ? $master_perencanaan_sehat[$item->perencanaan_sehat] : '';
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo isset($item->nik) ? $item->nik : ''; ?></td>
                <td><?php echo isset($item->kk) ? $item->kk : ''; ?></td>
                <td><?php echo isset($item->nama_anggota) ? $item->nama_anggota : ''; ?></td>
                <td><?php echo isset($item->status_dalam_keluarga) ? $item->status_dalam_keluarga : (isset($item->status) ? $item->status : ''); ?></td>
                <td><?php echo isset($item->status_kawin) ? $item->status_kawin : ''; ?></td>
                <td><?php echo isset($item->jenis_kelamin) ? $item->jenis_kelamin : ''; ?></td>
                <td><?php echo isset($item->tempat_lahir) ? $item->tempat_lahir : ''; ?></td>
                <td><?php echo $tgl_umur; ?></td>
                <td><?php echo isset($item->agama) ? $item->agama : ''; ?></td>
                <td><?php echo isset($item->pendidikan) ? $item->pendidikan : ''; ?></td>
                <td><?php echo isset($item->pekerjaan) ? $item->pekerjaan : ''; ?></td>
                <td><?php echo $cacat; ?></td>
                <td><?php echo $pancasila; ?></td>
                <td><?php echo $gotong_royong; ?></td>
                <td><?php echo $keterampilan; ?></td>
                <td><?php echo $koperasi; ?></td>
                <td><?php echo $pangan; ?></td>
                <td><?php echo $sandang; ?></td>
                <td><?php echo $kesehatan; ?></td>
                <td><?php echo $perencanaan_sehat; ?></td>
                <td><?php echo isset($item->ket_anggota) ? $item->ket_anggota : ''; ?></td>
            </tr>
            <?php 
                }
            } else {
            ?>
            <tr>
                <td colspan="22">Data anggota keluarga tidak ditemukan.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
