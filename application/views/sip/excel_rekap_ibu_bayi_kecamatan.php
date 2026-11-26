<?php echo chr(0xEF) . chr(0xBB) . chr(0xBF); // BOM UTF-8 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 3px 5px; text-align: center; vertical-align: middle; font-size: 9pt; }
        th { background-color: #d9e1f2; font-weight: bold; }
        .text-left { text-align: left; }
        .bold { font-weight: bold; }
        tfoot th { background-color: #bdd7ee; }
    </style>
</head>
<body>
<table>
    <tr>
        <td colspan="19" class="bold" style="text-align:center; font-size:11pt;">REKAPITULASI DATA/BUKU CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA PADA TINGKAT TP PKK KECAMATAN</td>
    </tr>
    <tr>
        <td colspan="19" style="text-align:center; font-size:10pt;">BULAN: <?php echo strtoupper($nama_bulan); ?> &nbsp;&nbsp; TAHUN: <?php echo $tahun; ?></td>
    </tr>
    <tr>
        <td colspan="6" class="text-left">KAB/KOTA: KABUPATEN BANDUNG</td>
        <td colspan="13" class="text-left">KECAMATAN: <?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?> &nbsp;&nbsp; PROVINSI: JAWA BARAT</td>
    </tr>
    <tr><td colspan="19"></td></tr>

    <!-- Header Kolom -->
    <thead>
        <tr>
            <th rowspan="3">NO</th>
            <th rowspan="3">NAMA DESA/ KEL</th>
            <th rowspan="3">DUSUN/LINGK</th>
            <th rowspan="3">RW</th>
            <th rowspan="3">RT</th>
            <th rowspan="3">DASA WISMA</th>
            <th colspan="4">JUMLAH IBU</th>
            <th colspan="6">JUMLAH BAYI</th>
            <th colspan="2">JML BALITA MENINGGAL</th>
            <th rowspan="3">KETERANGAN</th>
        </tr>
        <tr>
            <th rowspan="2">HAMIL</th>
            <th rowspan="2">MELAHIRKAN</th>
            <th rowspan="2">NIFAS</th>
            <th rowspan="2">MENINGGAL</th>
            <th colspan="2">LAHIR</th>
            <th colspan="2">AKTE KELAHIRAN</th>
            <th colspan="2">MENINGGAL</th>
            <th rowspan="2">L</th>
            <th rowspan="2">P</th>
        </tr>
        <tr>
            <th>L</th><th>P</th>
            <th>ADA</th><th>TIDAK ADA</th>
            <th>L</th><th>P</th>
        </tr>
        <tr>
            <?php for ($c = 1; $c <= 19; $c++): ?>
                <th><?php echo $c; ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($rekap_kecamatan)): $no = 1;
            $t_dusun=0; $t_rw=0; $t_rt=0; $t_dsw=0;
            $t_ih=0; $t_imel=0; $t_inif=0; $t_imen=0;
            $t_bl=0; $t_bp=0; $t_aa=0; $t_at=0;
            $t_bml=0; $t_bmp=0; $t_bal_l=0; $t_bal_p=0;
            foreach ($rekap_kecamatan as $r):
                $t_dusun += $r->jml_dusun; $t_rw += $r->jml_rw; $t_rt += $r->jml_rt; $t_dsw += $r->jml_dasawisma;
                $t_ih += $r->ibu_hamil; $t_imel += $r->ibu_melahirkan; $t_inif += $r->ibu_nifas; $t_imen += $r->ibu_meninggal;
                $t_bl += $r->bayi_lahir_l; $t_bp += $r->bayi_lahir_p; $t_aa += $r->bayi_akte_ada; $t_at += $r->bayi_akte_tidak;
                $t_bml += $r->bayi_meninggal_l; $t_bmp += $r->bayi_meninggal_p;
                $t_bal_l += $r->balita_meninggal_l; $t_bal_p += $r->balita_meninggal_p;
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td class="text-left bold"><?php echo htmlspecialchars($r->Nama_Desa); ?></td>
                <td><?php echo $r->jml_dusun; ?></td>
                <td><?php echo $r->jml_rw; ?></td>
                <td><?php echo $r->jml_rt; ?></td>
                <td><?php echo $r->jml_dasawisma; ?></td>
                <td><?php echo $r->ibu_hamil; ?></td>
                <td><?php echo $r->ibu_melahirkan; ?></td>
                <td><?php echo $r->ibu_nifas; ?></td>
                <td><?php echo $r->ibu_meninggal; ?></td>
                <td><?php echo $r->bayi_lahir_l; ?></td>
                <td><?php echo $r->bayi_lahir_p; ?></td>
                <td><?php echo $r->bayi_akte_ada; ?></td>
                <td><?php echo $r->bayi_akte_tidak; ?></td>
                <td><?php echo $r->bayi_meninggal_l; ?></td>
                <td><?php echo $r->bayi_meninggal_p; ?></td>
                <td><?php echo $r->balita_meninggal_l; ?></td>
                <td><?php echo $r->balita_meninggal_p; ?></td>
                <td class="text-left"><?php echo htmlspecialchars($r->keterangan ? $r->keterangan : '-'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">JUMLAH</th>
            <th><?php echo $t_dusun; ?></th>
            <th><?php echo $t_rw; ?></th>
            <th><?php echo $t_rt; ?></th>
            <th><?php echo $t_dsw; ?></th>
            <th><?php echo $t_ih; ?></th>
            <th><?php echo $t_imel; ?></th>
            <th><?php echo $t_inif; ?></th>
            <th><?php echo $t_imen; ?></th>
            <th><?php echo $t_bl; ?></th>
            <th><?php echo $t_bp; ?></th>
            <th><?php echo $t_aa; ?></th>
            <th><?php echo $t_at; ?></th>
            <th><?php echo $t_bml; ?></th>
            <th><?php echo $t_bmp; ?></th>
            <th><?php echo $t_bal_l; ?></th>
            <th><?php echo $t_bal_p; ?></th>
            <th></th>
        </tr>
    </tfoot>
    <?php else: ?>
        <tr><td colspan="19">Tidak ada data.</td></tr>
    <?php endif; ?>
</table>
</body>
</html>
