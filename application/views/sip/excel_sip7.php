<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Catatan Data dan Kegiatan Warga TP PKK Desa/Kelurahan</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th { background-color: #d9edf7; font-weight: bold; }
        tfoot th { background-color: #fcf8e3; font-weight: bold; }
    </style>
</head>
<body>
    <table style="border: none; margin-bottom: 15px;">
        <tr>
            <th colspan="33" style="border: none; font-size: 14pt; font-weight: bold; text-align: center;">CATATAN DATA DAN KEGIATAN WARGA TP PKK</th>
        </tr>
        <tr>
            <th colspan="33" style="border: none; font-size: 12pt; font-weight: bold; text-align: center;">DESA/KELURAHAN TAHUN <?php echo $tahun; ?></th>
        </tr>
        <tr><td colspan="33" style="border: none;"></td></tr>
        <tr>
            <td colspan="4" style="border: none; font-weight: bold; text-align: left;">TP PKK DESA/KEL</td>
            <td colspan="1" style="border: none;">:</td>
            <td colspan="10" style="border: none; text-align: left;"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : ''); ?></td>
            <td colspan="3" style="border: none; font-weight: bold; text-align: left;">KAB/KOTA</td>
            <td colspan="1" style="border: none;">:</td>
            <td colspan="14" style="border: none; text-align: left;">KABUPATEN BANDUNG</td>
        </tr>
        <tr>
            <td colspan="4" style="border: none; font-weight: bold; text-align: left;">KECAMATAN</td>
            <td colspan="1" style="border: none;">:</td>
            <td colspan="10" style="border: none; text-align: left;"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : ''); ?></td>
            <td colspan="3" style="border: none; font-weight: bold; text-align: left;">PROVINSI</td>
            <td colspan="1" style="border: none;">:</td>
            <td colspan="14" style="border: none; text-align: left;">JAWA BARAT</td>
        </tr>
        <tr><td colspan="33" style="border: none;"></td></tr>
    </table>

    <table>
        <thead>
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">DESA / KELURAHAN</th>
                <th rowspan="3">JUML RW</th>
                <th rowspan="3">JUML RT</th>
                <th rowspan="3">JUML DASAWISMA</th>
                <th rowspan="3">JUML KRT</th>
                <th rowspan="3">JUML KK</th>
                <th colspan="10">JUMLAH ANGGOTA KELUARGA</th>
                <th colspan="4">KRITERIA RUMAH</th>
                <th colspan="4">SUMBER AIR KELUARGA</th>
                <th rowspan="3">JUMLAH SARANA MCK</th>
                <th colspan="2">MAKANAN POKOK</th>
                <th colspan="4">WARGA MENGIKUTI KEGIATAN</th>
                <th rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th colspan="2">TOTAL</th>
                <th colspan="2">BALITA</th>
                <th rowspan="2">PUS</th>
                <th rowspan="2">WUS</th>
                <th rowspan="2">IBU HAMIL</th>
                <th rowspan="2">IBU MENYUSUI</th>
                <th rowspan="2">LANSIA</th>
                <th rowspan="2">3 BUTA</th>
                <th rowspan="2">SEHAT LAYAK HUNI</th>
                <th rowspan="2">TIDAK SEHAT LAYAK HUNI</th>
                <th rowspan="2">MEMILIKI TMP. PEMB. SAMPAH</th>
                <th rowspan="2">MEMILIKI SPAL DAN PENYERAPAN AIR</th>
                <th rowspan="2">PDAM</th>
                <th rowspan="2">SUMUR</th>
                <th rowspan="2">SUNGAI</th>
                <th rowspan="2">DLL</th>
                <th rowspan="2">BERAS</th>
                <th rowspan="2">NON BERAS</th>
                <th rowspan="2">UP2K</th>
                <th rowspan="2">PEMANFAATAN TANAH PEKARANGAN</th>
                <th rowspan="2">INDUSTRI RUMAH TANGGA</th>
                <th rowspan="2">KESEHATAN LINGKUNGAN</th>
            </tr>
            <tr>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
            </tr>
            <tr style="background-color: #eee;">
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
                    <td style="text-align: left; font-weight: bold;"><?php echo htmlspecialchars($item->Nama_Desa ? $item->Nama_Desa : ($info_desa ? $info_desa->Nama_Desa : '-')); ?></td>
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
                    <td style="text-align: left;"><?php echo htmlspecialchars($item->keterangan); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" style="text-align: center;">JUMLAH</th>
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
                <td colspan="33" style="text-align: center; padding: 15px;">Tidak ada data.</td>
            </tr>
        </tbody>
        <?php endif; ?>
    </table>
</body>
</html>
