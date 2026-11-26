<?php header("Content-Type: application/vnd.ms-excel; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekapitulasi Catatan Data dan Kegiatan Warga TP PKK Kecamatan</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th { background-color: #d9edf7; font-weight: bold; }
        tfoot th { background-color: #fcf8e3; font-weight: bold; }
    </style>
</head>
<body>
    <table style="border: none; margin-bottom: 15px;">
        <tr><th colspan="35" style="border: none; font-size: 14pt;">REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA TP PKK</th></tr>
        <tr><th colspan="35" style="border: none; font-size: 12pt;">KECAMATAN TAHUN <?php echo $tahun; ?></th></tr>
        <tr><td colspan="35" style="border: none;"></td></tr>
        <tr>
            <td colspan="4" style="border: none; font-weight: bold; text-align: left;">TP PKK KECAMATAN</td>
            <td style="border: none;">:</td>
            <td colspan="10" style="border: none; text-align: left;"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
            <td colspan="3" style="border: none; font-weight: bold; text-align: left;">KAB/KOTA</td>
            <td style="border: none;">:</td>
            <td colspan="16" style="border: none; text-align: left;">KABUPATEN BANDUNG</td>
        </tr>
        <tr>
            <td colspan="4" style="border: none; font-weight: bold; text-align: left;">PROVINSI</td>
            <td style="border: none;">:</td>
            <td colspan="10" style="border: none; text-align: left;">JAWA BARAT</td>
            <td colspan="3" style="border: none; font-weight: bold; text-align: left;">TAHUN</td>
            <td style="border: none;">:</td>
            <td colspan="16" style="border: none; text-align: left;"><?php echo $tahun; ?></td>
        </tr>
        <tr><td colspan="35" style="border: none;"></td></tr>
    </table>

    <table>
        <thead>
            <tr>
                <th rowspan="3">NO</th><th rowspan="3">NAMA TP PKK DESA / KELURAHAN</th><th rowspan="3">JUMLAH KEL. PKK DUSUN / LINGK.</th>
                <th rowspan="3">JUML RW</th><th rowspan="3">JUML RT</th><th rowspan="3">JUML DASAWISMA</th><th rowspan="3">JUML KRT</th><th rowspan="3">JUML KK</th>
                <th colspan="11">JUMLAH ANGGOTA KELUARGA</th><th colspan="4">KRITERIA RUMAH</th><th colspan="4">SUMBER AIR KELUARGA</th>
                <th rowspan="3">JUMLAH SARANA MCK</th><th colspan="2">MAKANAN POKOK</th><th colspan="4">WARGA MENGIKUTI KEGIATAN</th><th rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th colspan="2">TOTAL</th><th colspan="2">BALITA</th><th rowspan="2">PUS</th><th rowspan="2">WUS</th><th rowspan="2">IBU HAMIL</th><th rowspan="2">IBU MENYUSUI</th><th rowspan="2">LANSIA</th><th colspan="2">3 BUTA</th>
                <th rowspan="2">SEHAT LAYAK HUNI</th><th rowspan="2">TIDAK SEHAT LAYAK HUNI</th><th rowspan="2">MEMILIKI TMP. PEMB. SAMPAH</th><th rowspan="2">MEMILIKI SPAL DAN PENYERAPAN AIR</th>
                <th rowspan="2">PDAM</th><th rowspan="2">SUMUR</th><th rowspan="2">SUNGAI</th><th rowspan="2">DLL</th>
                <th rowspan="2">BERAS</th><th rowspan="2">NON BERAS</th><th rowspan="2">UP2K</th><th rowspan="2">PEMANFAATAN TANAH PEKARANGAN</th><th rowspan="2">INDUSTRI RUMAH TANGGA</th><th rowspan="2">KESEHATAN LINGKUNGAN</th>
            </tr>
            <tr><th>L</th><th>P</th><th>L</th><th>P</th><th>L</th><th>P</th></tr>
            <tr style="background-color: #eee;"><?php for ($c=1; $c<=35; $c++) echo "<th>$c</th>"; ?></tr>
        </thead>
        <tbody>
            <?php if (!empty($rekap_kecamatan)): $no=1;
                $t_dusun=0; $t_rw=0; $t_rt=0; $t_dsw=0; $t_krt=0; $t_kk=0;
                $t_l=0; $t_p=0; $t_bl=0; $t_bp=0; $t_pus=0; $t_wus=0; $t_ih=0; $t_im=0; $t_lan=0; $t_buta=0;
                $t_sh=0; $t_tsh=0; $t_tps=0; $t_spal=0; $t_pdam=0; $t_smr=0; $t_sng=0; $t_dll=0; $t_mck=0;
                $t_brs=0; $t_nbrs=0; $t_up2k=0; $t_tnh=0; $t_irt=0; $t_kes=0;
                foreach ($rekap_kecamatan as $r):
                    $t_dusun+=$r->jml_dusun; $t_rw+=$r->jml_rw; $t_rt+=$r->jml_rt; $t_dsw+=$r->jml_dasawisma;
                    $t_krt+=$r->jml_krt; $t_kk+=$r->jml_kk; $t_l+=$r->total_l; $t_p+=$r->total_p;
                    $t_bl+=$r->balita_l; $t_bp+=$r->balita_p; $t_pus+=$r->pus; $t_wus+=$r->wus;
                    $t_ih+=$r->ibu_hamil; $t_im+=$r->ibu_menyusui; $t_lan+=$r->lansia; $t_buta_l+=$r->buta_l; $t_buta_p+=$r->buta_p;
                    $t_sh+=$r->sehat_layak_huni; $t_tsh+=$r->tidak_sehat_layak_huni; $t_tps+=$r->tempat_sampah; $t_spal+=$r->spal;
                    $t_pdam+=$r->pdam; $t_smr+=$r->sumur; $t_sng+=$r->sungai; $t_dll+=$r->dll; $t_mck+=$r->jamban;
                    $t_brs+=$r->beras; $t_nbrs+=$r->non_beras; $t_up2k+=$r->up2k; $t_tnh+=$r->pemanfaatan_tanah;
                    $t_irt+=$r->industri_rumah_tangga; $t_kes+=$r->kesling;
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td style="text-align: left; font-weight: bold;"><?php echo htmlspecialchars($r->Nama_Desa); ?></td>
                    <td><?php echo $r->jml_dusun; ?></td><td><?php echo $r->jml_rw; ?></td><td><?php echo $r->jml_rt; ?></td>
                    <td><?php echo $r->jml_dasawisma; ?></td><td><?php echo $r->jml_krt; ?></td><td><?php echo $r->jml_kk; ?></td>
                    <td><?php echo $r->total_l; ?></td><td><?php echo $r->total_p; ?></td><td><?php echo $r->balita_l; ?></td><td><?php echo $r->balita_p; ?></td>
                    <td><?php echo $r->pus; ?></td><td><?php echo $r->wus; ?></td><td><?php echo $r->ibu_hamil; ?></td><td><?php echo $r->ibu_menyusui; ?></td>
                    <td><?php echo $r->lansia; ?></td><td><?php echo $r->buta_l; ?></td><td><?php echo $r->buta_p; ?></td><td><?php echo $r->sehat_layak_huni; ?></td><td><?php echo $r->tidak_sehat_layak_huni; ?></td>
                    <td><?php echo $r->tempat_sampah; ?></td><td><?php echo $r->spal; ?></td><td><?php echo $r->pdam; ?></td><td><?php echo $r->sumur; ?></td>
                    <td><?php echo $r->sungai; ?></td><td><?php echo $r->dll; ?></td><td><?php echo $r->jamban; ?></td><td><?php echo $r->beras; ?></td>
                    <td><?php echo $r->non_beras; ?></td><td><?php echo $r->up2k; ?></td><td><?php echo $r->pemanfaatan_tanah; ?></td><td><?php echo $r->industri_rumah_tangga; ?></td>
                    <td><?php echo $r->kesling; ?></td><td style="text-align: left;"><?php echo htmlspecialchars($r->keterangan ? $r->keterangan : '-'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">JUMLAH</th>
                <th><?php echo $t_dusun; ?></th><th><?php echo $t_rw; ?></th><th><?php echo $t_rt; ?></th>
                <th><?php echo $t_dsw; ?></th><th><?php echo $t_krt; ?></th><th><?php echo $t_kk; ?></th>
                <th><?php echo $t_l; ?></th><th><?php echo $t_p; ?></th><th><?php echo $t_bl; ?></th><th><?php echo $t_bp; ?></th>
                <th><?php echo $t_pus; ?></th><th><?php echo $t_wus; ?></th><th><?php echo $t_ih; ?></th><th><?php echo $t_im; ?></th>
                <th><?php echo $t_lan; ?></th><th><?php echo $t_buta_l; ?></th><th><?php echo $t_buta_p; ?></th><th><?php echo $t_sh; ?></th><th><?php echo $t_tsh; ?></th>
                <th><?php echo $t_tps; ?></th><th><?php echo $t_spal; ?></th><th><?php echo $t_pdam; ?></th><th><?php echo $t_smr; ?></th>
                <th><?php echo $t_sng; ?></th><th><?php echo $t_dll; ?></th><th><?php echo $t_mck; ?></th><th><?php echo $t_brs; ?></th>
                <th><?php echo $t_nbrs; ?></th><th><?php echo $t_up2k; ?></th><th><?php echo $t_tnh; ?></th><th><?php echo $t_irt; ?></th>
                <th><?php echo $t_kes; ?></th><th></th>
            </tr>
        </tfoot>
        <?php else: ?>
            <tr><td colspan="35">Tidak ada data.</td></tr></tbody>
        <?php endif; ?>
    </table>
</body>
</html>
