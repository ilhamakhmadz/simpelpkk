<html>

<head>
    <title><?= $filename ?></title>
    <style type="text/css">
        /* body { font-family: Arial;  } */
        .pos {
            position: absolute;
            z-index: 0;
            left: 0px;
            top: 0px
        }

        .posBody {
            position: absolute;
            padding: 0px 0px 40px 10px;
            z-index: 0;
            left: 0px;
            top: 0px
        }

        .tableKet {
            margin-top: 0cm;
            margin-right: 0cm;
            margin-bottom: 0cm;
            margin-left: 0cm;
            line-height: 115%;
            font-size: 13px;
            font-family: "Calibri", sans-serif;
            background: white
        }

        span {
            font-size: 13px;
            line-height: 115%;
            font-family: "Open Sans", sans-serif;
            color: black;
        }

        .subTable {
            width: 26.7pt;
            border-top: none;
            border-left: 1pt solid rgb(231, 231, 231);
            border-bottom: 1pt solid rgb(221, 221, 221);
            border-right: 1pt solid rgb(231, 231, 231);
            background: rgb(245, 245, 246);
            padding: 6pt;
            height: 23.6pt;
            vertical-align: top;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
        }

        .merge {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="pos" id="_413:101" style="top:50;left:413">
        <span id="_16.2" style="font-weight:bold; font-family:Arial; font-size:16.2px; color:#000000">
            LAPORAN DATA UMUM PKK</span>
    </div>

    <div class="pos" id="_100:215" style="top:130;left:60">
        <span id="_13.5" style=" font-family:Arial; font-size:13.5px; color:#000000">
            KAB/KOTA : KABUPATEN BANDUNG</span>
    </div>

    <div class="pos" id="_100:234" style="top:155;left:60">
        <span id="_13.5" style=" font-family:Arial; font-size:13.5px; color:#000000">
            PROVINSI : JAWA BARAT</span>
    </div>

    <div class="pos" id="_100:234" style="top:180;left:60">
        <span id="_13.5" style=" font-family:Arial; font-size:13.5px; color:#000000">
            TAHUN : <?=$tahun?></span>
    </div>
    <br><br><br><br><br><br><br><br>
    <table style="width:697.1pt;left:392;border-collapse:collapse;border:none;">
        <thead>
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">NAMA KECAMATAN</th>
                <th colspan="2">JUMLAH TP. PKK</th>
                <th colspan="4">JUMLAH KELOMPOK</th>
                <th colspan="2">JUMLAH</th>
                <th colspan="2">JUMLAH JIWA</th>
                <th colspan="6">JUMLAH KADER</th>
                <th colspan="4">JUMLAH TENAGA SEKRETARIAT</th>
                <th rowspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th rowspan="2">DESA</th>
                <th rowspan="2">KEL</th>
                <th rowspan="2">PKK RW</th>
                <th rowspan="2">PKK RT</th>
                <th rowspan="2">PKK DUSUN/ LING.</th>
                <th rowspan="2">DASA WISMA</th>
                <th rowspan="2">KRT</th>
                <th rowspan="2">KK</th>
                <th rowspan="2">L</th>
                <th rowspan="2">P</th>
                <th colspan="2">ANGGOTA TP. PKK</th>
                <th colspan="2">UMUM</th>
                <th colspan="2">KHUSUS</th>
                <th colspan="2">HONORER</th>
                <th colspan="2">BANTUAN</th>
            </tr>
            <tr>

                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
            </tr>

            <?php
                $no = 1;
                $total_jml_desa = 0;
                $total_jml_kel = 0;
                $total_jml_kelompok_pkk_rw = 0;
                $total_jml_kelompok_pkk_rt = 0;
                $total_jml_kelompok_dasawisma = 0;
                $total_jml_krt = 0;
                $total_jml_kk = 0;
                $total_jml_laki = 0;
                $total_jml_perempuan = 0;
                $total_jml_anggota_tp_pkk_laki = 0;
                $total_jml_anggota_tp_pkk_perempuan = 0;
                $total_jml_kader_umum_laki = 0;
                $total_jml_kader_umum_perempuan = 0;
                $total_jml_kader_khusus_laki = 0;
                $total_jml_kader_khusus_perempuan = 0;
                $total_jml_tenaga_sek_honorer_laki = 0;
                $total_jml_tenaga_sek_honorer_perempuan = 0;
                $total_jml_tenaga_sek_bantuan_laki = 0;
                $total_jml_tenaga_sek_bantuan_perempuan = 0;

                foreach($data_umum as $val){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $val->Nama_Kecamatan?></td>
                <td><?= $this->desa_model->jml_desa($val->Kd_Kec) ?></td>
                <td><?= $this->desa_model->jml_kel($val->Kd_Kec) ?></td>
                <td><?= $val->jml_kelompok_pkk_rw?></td>
                <td><?= $val->jml_kelompok_pkk_rt?></td>
                <!-- <td><?= $val->jml_kelompok_pkk_dusun?></td> -->
                <td><?= '00' ?></td>
                <td><?= $val->jml_kelompok_dasawisma?></td>
                <td><?= $val->jml_krt?></td>
                <td><?= $val->jml_kk?></td>
                <td><?= $val->jml_laki?></td>
                <td><?= $val->jml_perempuan?></td>
                <td><?= $val->jml_anggota_tp_pkk_laki?></td>
                <td><?= $val->jml_anggota_tp_pkk_perempuan?></td>
                <td><?= $val->jml_kader_umum_laki?></td>
                <td><?= $val->jml_kader_umum_perempuan?></td>
                <td><?= $val->jml_kader_khusus_laki?></td>
                <td><?= $val->jml_kader_khusus_perempuan?></td>
                <td><?= $val->jml_tenaga_sek_honorer_laki?></td>
                <td><?= $val->jml_tenaga_sek_honorer_perempuan?></td>
                <td><?= $val->jml_tenaga_sek_bantuan_laki?></td>
                <td><?= $val->jml_tenaga_sek_bantuan_perempuan?></td>
                <td><?= $val->keterangan?></td>
            </tr>
                <?php
                    $total_jml_desa += $this->desa_model->jml_desa($val->Kd_Kec);
                    $total_jml_kel += $this->desa_model->jml_kel($val->Kd_Kec);
                    $total_jml_kelompok_pkk_rw += $val->jml_kelompok_pkk_rw;
                    $total_jml_kelompok_pkk_rt += $val->jml_kelompok_pkk_rt;
                    $total_jml_kelompok_dasawisma += $val->jml_kelompok_dasawisma;
                    $total_jml_krt += $val->jml_krt;
                    $total_jml_kk += $val->jml_kk;
                    $total_jml_laki += $val->jml_laki;
                    $total_jml_perempuan += $val->jml_perempuan;
                    $total_jml_anggota_tp_pkk_laki += $val->jml_anggota_tp_pkk_laki;
                    $total_jml_anggota_tp_pkk_perempuan += $val->jml_anggota_tp_pkk_perempuan;
                    $total_jml_kader_umum_laki += $val->jml_kader_umum_laki;
                    $total_jml_kader_umum_perempuan += $val->jml_kader_umum_perempuan;
                    $total_jml_kader_khusus_laki += $val->jml_kader_khusus_laki;
                    $total_jml_kader_khusus_perempuan += $val->jml_kader_khusus_perempuan;
                    $total_jml_tenaga_sek_honorer_laki += $val->jml_tenaga_sek_honorer_laki;
                    $total_jml_tenaga_sek_honorer_perempuan += $val->jml_tenaga_sek_honorer_perempuan;
                    $total_jml_tenaga_sek_bantuan_laki += $val->jml_tenaga_sek_bantuan_laki;
                    $total_jml_tenaga_sek_bantuan_perempuan += $val->jml_tenaga_sek_bantuan_perempuan;

                    $no++;
                    }
                ?>
            <tr>
                <td colspan="23">JUMLAH</td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2">TP PKK KAB/KOTA</td>
                <td><?= $total_jml_desa ?></td>
                <td><?= $total_jml_kel ?></td>
                <td><?= $total_jml_kelompok_pkk_rw ?></td>
                <td><?= $total_jml_kelompok_pkk_rt ?></td>
                <td></td>
                <td><?= $total_jml_kelompok_dasawisma ?></td>
                <td><?= $total_jml_krt ?></td>
                <td><?= $total_jml_kk ?></td>
                <td><?= $total_jml_laki ?></td>
                <td><?= $total_jml_perempuan ?></td>
                <td><?= $total_jml_anggota_tp_pkk_laki ?></td>
                <td><?= $total_jml_anggota_tp_pkk_perempuan ?></td>
                <td><?= $total_jml_kader_umum_laki ?></td>
                <td><?= $total_jml_kader_umum_perempuan ?></td>
                <td><?= $total_jml_kader_khusus_laki ?></td>
                <td><?= $total_jml_kader_khusus_perempuan ?></td>
                <td><?= $total_jml_tenaga_sek_honorer_laki ?></td>
                <td><?= $total_jml_tenaga_sek_honorer_perempuan ?></td>
                <td><?= $total_jml_tenaga_sek_bantuan_laki ?></td>
                <td><?= $total_jml_tenaga_sek_bantuan_perempuan ?></td>
                <td></td>
            </tr>
    </table>
    <p
        style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
        &nbsp;</p>
</body>

</html>