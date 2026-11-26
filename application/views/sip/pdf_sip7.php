<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8pt;
            color: #111;
        }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }
        
        .header-title {
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
            margin-bottom: 3px;
            text-transform: uppercase;
        }
        .header-subtitle {
            text-align: center;
            font-size: 10pt;
            font-weight: bold;
            margin-bottom: 12px;
            text-transform: uppercase;
        }
        
        .meta-table {
            width: 100%;
            margin-bottom: 10px;
            font-size: 8pt;
        }
        .meta-table td {
            padding: 2px 4px;
            vertical-align: top;
        }
        
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6.5pt;
        }
        table.data-table th, table.data-table td {
            border: 0.5px solid #000;
            padding: 2.5px 1.5px;
            text-align: center;
            vertical-align: middle;
        }
        table.data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        table.data-table tfoot th {
            background-color: #eaeaea;
            font-weight: bold;
        }
        .col-num {
            font-size: 5.5pt;
            color: #555;
            background-color: #fafafa;
        }
    </style>
</head>
<body>

    <div class="header-title">CATATAN DATA DAN KEGIATAN WARGA TP PKK</div>
    <div class="header-subtitle">DESA/KELURAHAN TAHUN <?php echo $tahun; ?></div>

    <table class="meta-table">
        <tr>
            <td style="width: 15%; font-weight: bold;">TP PKK DESA/KEL</td>
            <td style="width: 2%;">:</td>
            <td style="width: 40%;"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '................................'); ?></td>
            <td style="width: 15%; font-weight: bold;">KAB/KOTA</td>
            <td style="width: 2%;">:</td>
            <td style="width: 26%;">KABUPATEN BANDUNG</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">KECAMATAN</td>
            <td>:</td>
            <td><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '................................'); ?></td>
            <td style="font-weight: bold;">PROVINSI</td>
            <td>:</td>
            <td>JAWA BARAT</td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <!-- Baris 1 -->
            <tr>
                <th rowspan="3" style="width: 18px;">NO</th>
                <th rowspan="3" style="width: 80px;">DESA / KELURAHAN</th>
                <th rowspan="3" style="width: 22px;">JUML RW</th>
                <th rowspan="3" style="width: 22px;">JUML RT</th>
                <th rowspan="3" style="width: 28px;">JUML DASAWISMA</th>
                <th rowspan="3" style="width: 25px;">JUML KRT</th>
                <th rowspan="3" style="width: 25px;">JUML KK</th>
                <th colspan="10">JUMLAH ANGGOTA KELUARGA</th>
                <th colspan="4">KRITERIA RUMAH</th>
                <th colspan="4">SUMBER AIR KELUARGA</th>
                <th rowspan="3" style="width: 28px;">JUMLAH SARANA MCK</th>
                <th colspan="2">MAKANAN POKOK</th>
                <th colspan="4">WARGA MENGIKUTI KEGIATAN</th>
                <th rowspan="3" style="width: 45px;">KETERANGAN</th>
            </tr>
            <!-- Baris 2 -->
            <tr>
                <th colspan="2">TOTAL</th>
                <th colspan="2">BALITA</th>
                <th rowspan="2" style="width: 20px;">PUS</th>
                <th rowspan="2" style="width: 20px;">WUS</th>
                <th rowspan="2" style="width: 20px;">IBU HAMIL</th>
                <th rowspan="2" style="width: 22px;">IBU MENYUSUI</th>
                <th rowspan="2" style="width: 20px;">LANSIA</th>
                <th rowspan="2" style="width: 18px;">3 BUTA</th>
                <th rowspan="2" style="width: 25px;">SEHAT LAYAK HUNI</th>
                <th rowspan="2" style="width: 25px;">TIDAK SEHAT LAYAK HUNI</th>
                <th rowspan="2" style="width: 28px;">MEMILIKI TMP. PEMB. SAMPAH</th>
                <th rowspan="2" style="width: 28px;">MEMILIKI SPAL DAN PENYERAPAN AIR</th>
                <th rowspan="2" style="width: 20px;">PDAM</th>
                <th rowspan="2" style="width: 20px;">SUMUR</th>
                <th rowspan="2" style="width: 20px;">SUNGAI</th>
                <th rowspan="2" style="width: 20px;">DLL</th>
                <th rowspan="2" style="width: 20px;">BERAS</th>
                <th rowspan="2" style="width: 20px;">NON BERAS</th>
                <th rowspan="2" style="width: 20px;">UP2K</th>
                <th rowspan="2" style="width: 30px;">PEMANFAATAN TANAH PEKARANGAN</th>
                <th rowspan="2" style="width: 28px;">INDUSTRI RUMAH TANGGA</th>
                <th rowspan="2" style="width: 30px;">KESEHATAN LINGKUNGAN</th>
            </tr>
            <!-- Baris 3 -->
            <tr>
                <th style="width: 18px;">L</th>
                <th style="width: 18px;">P</th>
                <th style="width: 18px;">L</th>
                <th style="width: 18px;">P</th>
            </tr>
            <!-- Baris Nomor Kolom 1 s/d 33 -->
            <tr class="col-num">
                <?php for ($c = 1; $c <= 33; $c++): ?>
                    <th><?php echo $c; ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (!empty($catatan_warga)): 
                $no = 1;
                $tot_rw = 0; $tot_rt = 0; $tot_dasawisma = 0; $tot_krt = 0; $tot_kk = 0;
                $tot_l = 0; $tot_p = 0; $tot_balita_l = 0; $tot_balita_p = 0;
                $tot_pus = 0; $tot_wus = 0; $tot_hamil = 0; $tot_menyusui = 0; $tot_lansia = 0; $tot_buta = 0;
                $tot_sehat = 0; $tot_tdk_sehat = 0; $tot_sampah = 0; $tot_spal = 0;
                $tot_pdam = 0; $tot_sumur = 0; $tot_sungai = 0; $tot_dll = 0;
                $tot_jamban = 0; $tot_beras = 0; $tot_non_beras = 0;
                $tot_up2k = 0; $tot_tanah = 0; $tot_industri = 0; $tot_kesling = 0;

                foreach ($catatan_warga as $item): 
                    $tot_rw += $item->jml_rw;
                    $tot_rt += $item->jml_rt;
                    $tot_dasawisma += $item->jml_dasawisma;
                    $tot_krt += $item->jml_krt;
                    $tot_kk += $item->jml_kk;
                    $tot_l += $item->total_l;
                    $tot_p += $item->total_p;
                    $tot_balita_l += $item->balita_l;
                    $tot_balita_p += $item->balita_p;
                    $tot_pus += $item->pus;
                    $tot_wus += $item->wus;
                    $tot_hamil += $item->ibu_hamil;
                    $tot_menyusui += $item->ibu_menyusui;
                    $tot_lansia += $item->lansia;
                    $tot_buta += $item->buta;
                    $tot_sehat += $item->sehat_layak_huni;
                    $tot_tdk_sehat += $item->tidak_sehat_layak_huni;
                    $tot_sampah += $item->tempat_sampah;
                    $tot_spal += $item->spal;
                    $tot_pdam += $item->pdam;
                    $tot_sumur += $item->sumur;
                    $tot_sungai += $item->sungai;
                    $tot_dll += $item->dll;
                    $tot_jamban += $item->jamban;
                    $tot_beras += $item->beras;
                    $tot_non_beras += $item->non_beras;
                    $tot_up2k += $item->up2k;
                    $tot_tanah += $item->pemanfaatan_tanah;
                    $tot_industri += $item->industri_rumah_tangga;
                    $tot_kesling += $item->kesling;
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td class="text-left bold"><?php echo htmlspecialchars($item->Nama_Desa ? $item->Nama_Desa : ($info_desa ? $info_desa->Nama_Desa : '-')); ?></td>
                    <td><?php echo $item->jml_rw; ?></td>
                    <td><?php echo $item->jml_rt; ?></td>
                    <td><?php echo $item->jml_dasawisma; ?></td>
                    <td><?php echo $item->jml_krt; ?></td>
                    <td><?php echo $item->jml_kk; ?></td>
                    <td><?php echo $item->total_l; ?></td>
                    <td><?php echo $item->total_p; ?></td>
                    <td><?php echo $item->balita_l; ?></td>
                    <td><?php echo $item->balita_p; ?></td>
                    <td><?php echo $item->pus; ?></td>
                    <td><?php echo $item->wus; ?></td>
                    <td><?php echo $item->ibu_hamil; ?></td>
                    <td><?php echo $item->ibu_menyusui; ?></td>
                    <td><?php echo $item->lansia; ?></td>
                    <td><?php echo $item->buta; ?></td>
                    <td><?php echo $item->sehat_layak_huni; ?></td>
                    <td><?php echo $item->tidak_sehat_layak_huni; ?></td>
                    <td><?php echo $item->tempat_sampah; ?></td>
                    <td><?php echo $item->spal; ?></td>
                    <td><?php echo $item->pdam; ?></td>
                    <td><?php echo $item->sumur; ?></td>
                    <td><?php echo $item->sungai; ?></td>
                    <td><?php echo $item->dll; ?></td>
                    <td><?php echo $item->jamban; ?></td>
                    <td><?php echo $item->beras; ?></td>
                    <td><?php echo $item->non_beras; ?></td>
                    <td><?php echo $item->up2k; ?></td>
                    <td><?php echo $item->pemanfaatan_tanah; ?></td>
                    <td><?php echo $item->industri_rumah_tangga; ?></td>
                    <td><?php echo $item->kesling; ?></td>
                    <td class="text-left"><?php echo htmlspecialchars($item->keterangan); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" class="text-center">JUMLAH</th>
                <th><?php echo $tot_rw; ?></th>
                <th><?php echo $tot_rt; ?></th>
                <th><?php echo $tot_dasawisma; ?></th>
                <th><?php echo $tot_krt; ?></th>
                <th><?php echo $tot_kk; ?></th>
                <th><?php echo $tot_l; ?></th>
                <th><?php echo $tot_p; ?></th>
                <th><?php echo $tot_balita_l; ?></th>
                <th><?php echo $tot_balita_p; ?></th>
                <th><?php echo $tot_pus; ?></th>
                <th><?php echo $tot_wus; ?></th>
                <th><?php echo $tot_hamil; ?></th>
                <th><?php echo $tot_menyusui; ?></th>
                <th><?php echo $tot_lansia; ?></th>
                <th><?php echo $tot_buta; ?></th>
                <th><?php echo $tot_sehat; ?></th>
                <th><?php echo $tot_tdk_sehat; ?></th>
                <th><?php echo $tot_sampah; ?></th>
                <th><?php echo $tot_spal; ?></th>
                <th><?php echo $tot_pdam; ?></th>
                <th><?php echo $tot_sumur; ?></th>
                <th><?php echo $tot_sungai; ?></th>
                <th><?php echo $tot_dll; ?></th>
                <th><?php echo $tot_jamban; ?></th>
                <th><?php echo $tot_beras; ?></th>
                <th><?php echo $tot_non_beras; ?></th>
                <th><?php echo $tot_up2k; ?></th>
                <th><?php echo $tot_tanah; ?></th>
                <th><?php echo $tot_industri; ?></th>
                <th><?php echo $tot_kesling; ?></th>
                <th></th>
            </tr>
        </tfoot>
        <?php else: ?>
            <tr>
                <td colspan="33" style="padding: 20px; text-align: center; color: #777;">
                    Tidak ada data catatan kegiatan warga.
                </td>
            </tr>
        </tbody>
        <?php endif; ?>
    </table>

</body>
</html>
