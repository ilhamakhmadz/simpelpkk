<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekapitulasi Catatan Ibu Hamil, Melahirkan, Nifas, Bayi & Balita TP PKK Kecamatan</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; font-size: 8pt; color: #111; }
        .text-center { text-align: center; }
        .text-left   { text-align: left; }
        .bold        { font-weight: bold; }
        .header-title { text-align: center; font-size: 10pt; font-weight: bold; margin-bottom: 2px; text-transform: uppercase; }
        .meta-table { width: 100%; margin-bottom: 10px; font-size: 8pt; }
        .meta-table td { padding: 2px 4px; }
        table.data-table { width: 100%; border-collapse: collapse; font-size: 7pt; }
        table.data-table th, table.data-table td { border: 0.5px solid #000; padding: 3px 2px; text-align: center; vertical-align: middle; }
        table.data-table th { background-color: #f2f2f2; font-weight: bold; }
        table.data-table tfoot th { background-color: #eaeaea; font-weight: bold; }
        .col-num { font-size: 6pt; color: #555; background-color: #fafafa; }
    </style>
</head>
<body>
    <div class="header-title">REKAPITULASI DATA/BUKU CATATAN</div>
    <div class="header-title">IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL, KELAHIRAN BAYI, BAYI MENINGGAL DAN</div>
    <div class="header-title" style="margin-bottom: 10px;">KEMATIAN BALITA PADA TINGKAT TP PKK KECAMATAN</div>

    <table class="meta-table">
        <tr>
            <td style="width: 12%; font-weight: bold;">KAB/ KOTA</td>
            <td style="width: 2%;">:</td>
            <td style="width: 38%;">KABUPATEN BANDUNG</td>
            <td style="width: 12%; font-weight: bold;">BULAN</td>
            <td style="width: 2%;">:</td>
            <td style="width: 34%;"><?php echo strtoupper($nama_bulan); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">KECAMATAN</td>
            <td>:</td>
            <td><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
            <td style="font-weight: bold;">TAHUN</td>
            <td>:</td>
            <td><?php echo $tahun; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">PROVINSI</td>
            <td>:</td>
            <td>JAWA BARAT</td>
            <td></td><td></td><td></td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th rowspan="3" style="width: 22px;">NO</th>
                <th rowspan="3" style="width: 90px;">NAMA DESA/ KEL</th>
                <th rowspan="3" style="width: 28px;">DUSUN/<br>LINGK</th>
                <th rowspan="3" style="width: 22px;">RW</th>
                <th rowspan="3" style="width: 22px;">RT</th>
                <th rowspan="3" style="width: 28px;">DASA<br>WISMA</th>
                <th colspan="4">JUMLAH IBU</th>
                <th colspan="6">JUMLAH BAYI</th>
                <th colspan="2" rowspan="2">JML BALITA MENINGGAL</th>
                <th rowspan="3" style="width: 55px;">KETERANGAN</th>
            </tr>
            <tr>
                <th rowspan="2">HAMIL</th>
                <th rowspan="2">MELAHIR<br>KAN</th>
                <th rowspan="2">NIFAS</th>
                <th rowspan="2">MENIN<br>GGAL</th>
                <th colspan="2">LAHIR</th>
                <th colspan="2">AKTE KELAHIRAN</th>
                <th colspan="2">MENINGGAL</th>
            </tr>
            <tr>
                <th>L</th><th>P</th>
                <th>ADA</th><th>TIDAK</th>
                <th>L</th><th>P</th>
                <th>L</th><th>P</th>
            </tr>
            <tr class="col-num">
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
                    $t_dusun  += $r->jml_dusun;
                    $t_rw     += $r->jml_rw;
                    $t_rt     += $r->jml_rt;
                    $t_dsw    += $r->jml_dasawisma;
                    $t_ih     += $r->ibu_hamil;
                    $t_imel   += $r->ibu_melahirkan;
                    $t_inif   += $r->ibu_nifas;
                    $t_imen   += $r->ibu_meninggal;
                    $t_bl     += $r->bayi_lahir_l;
                    $t_bp     += $r->bayi_lahir_p;
                    $t_aa     += $r->bayi_akte_ada;
                    $t_at     += $r->bayi_akte_tidak;
                    $t_bml    += $r->bayi_meninggal_l;
                    $t_bmp    += $r->bayi_meninggal_p;
                    $t_bal_l  += $r->balita_meninggal_l;
                    $t_bal_p  += $r->balita_meninggal_p;
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
            <tr><td colspan="19" style="padding: 15px;">Tidak ada data.</td></tr>
        </tbody>
        <?php endif; ?>
    </table>
</body>
</html>
