<?php header("Content-Type: application/vnd.ms-excel; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekapitulasi Data/Buku Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th { background-color: #d9edf7; font-weight: bold; }
        tfoot th { background-color: #fcf8e3; font-weight: bold; }
    </style>
</head>
<body>
    <table style="border: none; margin-bottom: 15px;">
        <tr><th colspan="18" style="border: none; font-size: 12pt;">REKAPITULASI DATA/BUKU CATATAN</th></tr>
        <tr><th colspan="18" style="border: none; font-size: 12pt;">IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA PADA TINGKAT TP PKK DESA/KELURAHAN</th></tr>
        <tr><td colspan="18" style="border: none;"></td></tr>
        <tr>
            <td colspan="2" style="border: none; font-weight: bold; text-align: left;">DESA/KELURAHAN</td>
            <td style="border: none;">:</td>
            <td colspan="6" style="border: none; text-align: left;"><?php echo htmlspecialchars($info_desa ? strtoupper($info_desa->Nama_Desa) : '-'); ?></td>
            <td colspan="2" style="border: none; font-weight: bold; text-align: left;">BULAN</td>
            <td style="border: none;">:</td>
            <td colspan="6" style="border: none; text-align: left;"><?php echo strtoupper($nama_bulan); ?></td>
        </tr>
        <tr>
            <td colspan="2" style="border: none; font-weight: bold; text-align: left;">KECAMATAN</td>
            <td style="border: none;">:</td>
            <td colspan="6" style="border: none; text-align: left;"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
            <td colspan="2" style="border: none; font-weight: bold; text-align: left;">TAHUN</td>
            <td style="border: none;">:</td>
            <td colspan="6" style="border: none; text-align: left;"><?php echo $tahun; ?></td>
        </tr>
        <tr><td colspan="18" style="border: none;"></td></tr>
    </table>

    <table>
        <thead>
            <tr>
                <th rowspan="3">NO</th><th rowspan="3">NAMA DUSUN / LINGKUNGAN</th>
                <th colspan="3">JUMLAH</th><th colspan="4">JUMLAH IBU</th><th colspan="6">JUMLAH BAYI</th>
                <th colspan="2" rowspan="2">JML BALITA MENINGGAL</th><th rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th rowspan="2">RW</th><th rowspan="2">RT</th><th rowspan="2">DASA WISMA</th>
                <th rowspan="2">HAMIL</th><th rowspan="2">MELAHIRKAN</th><th rowspan="2">NIFAS</th><th rowspan="2">MENINGGAL</th>
                <th colspan="2">LAHIR</th><th colspan="2">AKTE KELAHIRAN</th><th colspan="2">MENINGGAL</th>
            </tr>
            <tr><th>L</th><th>P</th><th>ADA</th><th>TIDAK ADA</th><th>L</th><th>P</th><th>L</th><th>P</th></tr>
            <tr style="background-color: #eee;"><?php for ($c=1; $c<=18; $c++) echo "<th>$c</th>"; ?></tr>
        </thead>
        <tbody>
            <?php if (!empty($catatan_ibu_bayi)): $no=1;
                $t_rw=0; $t_rt=0; $t_dsw=0; $t_ih=0; $t_imel=0; $t_inif=0; $t_imen=0;
                $t_bl=0; $t_bp=0; $t_aa=0; $t_at=0; $t_bml=0; $t_bmp=0; $t_bal=0; $t_bap=0;
                foreach ($catatan_ibu_bayi as $r):
                    $t_rw+=$r->jml_rw; $t_rt+=$r->jml_rt; $t_dsw+=$r->jml_dasawisma;
                    $t_ih+=$r->ibu_hamil; $t_imel+=$r->ibu_melahirkan; $t_inif+=$r->ibu_nifas; $t_imen+=$r->ibu_meninggal;
                    $t_bl+=$r->bayi_lahir_l; $t_bp+=$r->bayi_lahir_p; $t_aa+=$r->bayi_akte_ada; $t_at+=$r->bayi_akte_tidak;
                    $t_bml+=$r->bayi_meninggal_l; $t_bmp+=$r->bayi_meninggal_p; $t_bal+=$r->balita_meninggal_l; $t_bap+=$r->balita_meninggal_p;
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td style="text-align: left; font-weight: bold;"><?php echo htmlspecialchars(!empty($r->nama_dusun) ? $r->nama_dusun : ($info_desa ? $info_desa->Nama_Desa : '-')); ?></td>
                    <td><?php echo $r->jml_rw; ?></td><td><?php echo $r->jml_rt; ?></td><td><?php echo $r->jml_dasawisma; ?></td>
                    <td><?php echo $r->ibu_hamil; ?></td><td><?php echo $r->ibu_melahirkan; ?></td><td><?php echo $r->ibu_nifas; ?></td><td><?php echo $r->ibu_meninggal; ?></td>
                    <td><?php echo $r->bayi_lahir_l; ?></td><td><?php echo $r->bayi_lahir_p; ?></td><td><?php echo $r->bayi_akte_ada; ?></td><td><?php echo $r->bayi_akte_tidak; ?></td>
                    <td><?php echo $r->bayi_meninggal_l; ?></td><td><?php echo $r->bayi_meninggal_p; ?></td><td><?php echo $r->balita_meninggal_l; ?></td><td><?php echo $r->balita_meninggal_p; ?></td>
                    <td style="text-align: left;"><?php echo htmlspecialchars($r->keterangan ? $r->keterangan : '-'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">JUMLAH</th>
                <th><?php echo $t_rw; ?></th><th><?php echo $t_rt; ?></th><th><?php echo $t_dsw; ?></th>
                <th><?php echo $t_ih; ?></th><th><?php echo $t_imel; ?></th><th><?php echo $t_inif; ?></th><th><?php echo $t_imen; ?></th>
                <th><?php echo $t_bl; ?></th><th><?php echo $t_bp; ?></th><th><?php echo $t_aa; ?></th><th><?php echo $t_at; ?></th>
                <th><?php echo $t_bml; ?></th><th><?php echo $t_bmp; ?></th><th><?php echo $t_bal; ?></th><th><?php echo $t_bap; ?></th>
                <th></th>
            </tr>
        </tfoot>
        <?php else: ?>
            <tr><td colspan="18">Tidak ada data.</td></tr></tbody>
        <?php endif; ?>
    </table>
</body>
</html>
