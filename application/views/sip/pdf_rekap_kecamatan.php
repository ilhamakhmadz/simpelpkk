<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekapitulasi Catatan Data dan Kegiatan Warga TP PKK Kecamatan</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; font-size: 7.5pt; color: #111; }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .bold { font-weight: bold; }
        .header-title { text-align: center; font-size: 11pt; font-weight: bold; margin-bottom: 3px; text-transform: uppercase; }
        .header-subtitle { text-align: center; font-size: 10pt; font-weight: bold; margin-bottom: 12px; text-transform: uppercase; }
        .meta-table { width: 100%; margin-bottom: 10px; font-size: 8pt; }
        .meta-table td { padding: 2px 4px; }
        table.data-table { width: 100%; border-collapse: collapse; font-size: 6pt; }
        table.data-table th, table.data-table td { border: 0.5px solid #000; padding: 2px 1.5px; text-align: center; vertical-align: middle; }
        table.data-table th { background-color: #f2f2f2; font-weight: bold; }
        table.data-table tfoot th { background-color: #eaeaea; font-weight: bold; }
        .col-num { font-size: 5pt; color: #555; background-color: #fafafa; }
    </style>
</head>
<body>
    <div class="header-title">REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA TP PKK</div>
    <div class="header-subtitle">KECAMATAN TAHUN <?php echo $tahun; ?></div>

    <table class="meta-table">
        <tr>
            <td style="width: 15%; font-weight: bold;">TP PKK KECAMATAN</td>
            <td style="width: 2%;">:</td>
            <td style="width: 40%;"><?php echo htmlspecialchars($info_kec ? strtoupper($info_kec->Nama_Kecamatan) : '-'); ?></td>
            <td style="width: 15%; font-weight: bold;">KAB/KOTA</td>
            <td style="width: 2%;">:</td>
            <td style="width: 26%;">KABUPATEN BANDUNG</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">PROVINSI</td>
            <td>:</td>
            <td>JAWA BARAT</td>
            <td style="font-weight: bold;">TAHUN</td>
            <td>:</td>
            <td><?php echo $tahun; ?></td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th rowspan="3" style="width: 16px;">NO</th>
                <th rowspan="3" style="width: 70px;">NAMA TP PKK DESA / KEL</th>
                <th rowspan="3" style="width: 24px;">JML DUSUN</th>
                <th rowspan="3" style="width: 20px;">JML RW</th>
                <th rowspan="3" style="width: 20px;">JML RT</th>
                <th rowspan="3" style="width: 24px;">JML DSW</th>
                <th rowspan="3" style="width: 22px;">JML KRT</th>
                <th rowspan="3" style="width: 22px;">JML KK</th>
                <th colspan="11">JUMLAH ANGGOTA KELUARGA</th>
                <th colspan="4">KRITERIA RUMAH</th>
                <th colspan="4">SUMBER AIR KELUARGA</th>
                <th rowspan="3" style="width: 24px;">JML MCK</th>
                <th colspan="2">MAKANAN POKOK</th>
                <th colspan="4">WARGA MENGIKUTI KEGIATAN</th>
                <th rowspan="3" style="width: 40px;">KET</th>
            </tr>
            <tr>
                <th colspan="2">TOTAL</th>
                <th colspan="2">BALITA</th>
                <th rowspan="2">PUS</th>
                <th rowspan="2">WUS</th>
                <th rowspan="2">IBU HAMIL</th>
                <th rowspan="2">IBU MENYUSUI</th>
                <th rowspan="2">LANSIA</th>
                <th colspan="2">3 BUTA</th>
                <th rowspan="2">SEHAT</th>
                <th rowspan="2">TDK SEHAT</th>
                <th rowspan="2">TPS</th>
                <th rowspan="2">SPAL</th>
                <th rowspan="2">PDAM</th>
                <th rowspan="2">SUMUR</th>
                <th rowspan="2">SUNGAI</th>
                <th rowspan="2">DLL</th>
                <th rowspan="2">BERAS</th>
                <th rowspan="2">NON BERAS</th>
                <th rowspan="2">UP2K</th>
                <th rowspan="2">TANAH PEK.</th>
                <th rowspan="2">IRT</th>
                <th rowspan="2">KESLING</th>
            </tr>
            <tr>
                <th>L</th><th>P</th><th>L</th><th>P</th><th>L</th><th>P</th>
            </tr>
            <tr class="col-num">
                <?php for ($c = 1; $c <= 35; $c++): ?>
                    <th><?php echo $c; ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rekap_kecamatan)): $no = 1;
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
                    <td class="text-left bold"><?php echo htmlspecialchars($r->Nama_Desa); ?></td>
                    <td><?php echo $r->jml_dusun; ?></td><td><?php echo $r->jml_rw; ?></td><td><?php echo $r->jml_rt; ?></td>
                    <td><?php echo $r->jml_dasawisma; ?></td><td><?php echo $r->jml_krt; ?></td><td><?php echo $r->jml_kk; ?></td>
                    <td><?php echo $r->total_l; ?></td><td><?php echo $r->total_p; ?></td><td><?php echo $r->balita_l; ?></td><td><?php echo $r->balita_p; ?></td>
                    <td><?php echo $r->pus; ?></td><td><?php echo $r->wus; ?></td><td><?php echo $r->ibu_hamil; ?></td><td><?php echo $r->ibu_menyusui; ?></td>
                    <td><?php echo $r->lansia; ?></td><td><?php echo $r->buta_l; ?></td><td><?php echo $r->buta_p; ?></td><td><?php echo $r->sehat_layak_huni; ?></td><td><?php echo $r->tidak_sehat_layak_huni; ?></td>
                    <td><?php echo $r->tempat_sampah; ?></td><td><?php echo $r->spal; ?></td><td><?php echo $r->pdam; ?></td><td><?php echo $r->sumur; ?></td>
                    <td><?php echo $r->sungai; ?></td><td><?php echo $r->dll; ?></td><td><?php echo $r->jamban; ?></td><td><?php echo $r->beras; ?></td>
                    <td><?php echo $r->non_beras; ?></td><td><?php echo $r->up2k; ?></td><td><?php echo $r->pemanfaatan_tanah; ?></td><td><?php echo $r->industri_rumah_tangga; ?></td>
                    <td><?php echo $r->kesling; ?></td><td class="text-left"><?php echo htmlspecialchars($r->keterangan ? $r->keterangan : '-'); ?></td>
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
            <tr><td colspan="35" style="padding: 15px;">Tidak ada data.</td></tr></tbody>
        <?php endif; ?>
    </table>
</body>
</html>
