<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Export Excel - Catatan Keluarga</title>
    <!-- Load SheetJS for converting HTML Table to Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
            padding: 20px;
        }
        .loading-msg {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-top: 50px;
        }
        /* Sembunyikan tabel dari tampilan layar karena hanya untuk dirender ke Excel */
        #dataTabelKeluarga {
            display: none;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
        }
        th {
            background-color: #d9d9d9;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="loading-msg" id="loadingMsg">Sedang memproses file Excel, mohon tunggu...</div>

    <!-- Tabel HTML yang akan diconvert ke Excel oleh SheetJS -->
    <table id="dataTabelKeluarga">
        <!-- Baris 1: Judul -->
        <tr>
            <th colspan="22" style="font-size: 14pt; font-weight: bold; text-align: center;">CATATAN KELUARGA</th>
        </tr>
        <!-- Baris 2: Sub Judul -->
        <tr>
            <th colspan="22" style="text-align: center; font-weight: normal;">CATATAN KELUARGA DARI ANGGOTA KELOMPOK DASA WISMA TAHUN <?php echo isset($catatan_keluarga->date_year) ? $catatan_keluarga->date_year : ''; ?></th>
        </tr>
        <!-- Baris 3: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">CATATAN KELUARGA DARI: <?php echo isset($catatan_keluarga->nama_kepala_keluarga) ? strtoupper($catatan_keluarga->nama_kepala_keluarga) : ''; ?></td>
        </tr>
        <!-- Baris 4: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">ANGGOTA KELOMPOK DASA WISMA: <?php echo isset($dasawisma_name) ? strtoupper($dasawisma_name) : ''; ?></td>
        </tr>
        <!-- Baris 5: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">TAHUN: <?php echo isset($catatan_keluarga->date_year) ? $catatan_keluarga->date_year : ''; ?></td>
        </tr>
        <!-- Baris 6: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">KRITERIA RUMAH: <?php echo (isset($catatan_keluarga->rumah_sehat_layak_huni) && $catatan_keluarga->rumah_sehat_layak_huni == 1) ? 'Layak Huni' : 'Tidak Layak Huni'; ?></td>
        </tr>
        <!-- Baris 7: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">JAMBAN KELUARGA: <?php echo (isset($catatan_keluarga->rumah_memiliki_jamban) && $catatan_keluarga->rumah_memiliki_jamban == 1) ? 'Ada' : 'Tidak Ada'; ?></td>
        </tr>
        <!-- Baris 8: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">SUMBER AIR: 
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
        <!-- Baris 9: Info -->
        <tr>
            <td colspan="22" style="text-align: left; font-weight: bold;">TEMPAT SAMPAH: <?php echo (isset($catatan_keluarga->rumah_memiliki_tps) && $catatan_keluarga->rumah_memiliki_tps == 1) ? 'Ada' : 'Tidak Ada'; ?></td>
        </tr>
        
        <!-- Header Tabel -->
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
        
        <!-- Isi Tabel -->
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
    </table>

    <script>
        window.onload = function() {
            try {
                // Ambil elemen tabel
                var table = document.getElementById("dataTabelKeluarga");
                
                // Konversi tabel HTML ke workbook SheetJS
                var wb = XLSX.utils.table_to_book(table, {sheet: "Catatan Keluarga"});
                
                // Persiapkan kolom width agar lebih rapi (opsional)
                var ws = wb.Sheets["Catatan Keluarga"];
                var wscols = [
                    {wch: 5},  // NO
                    {wch: 20}, // NIK
                    {wch: 20}, // NO KK
                    {wch: 25}, // NAMA
                    {wch: 15}, // STATUS DLM KEL
                    {wch: 15}, // STATUS KAWIN
                    {wch: 5},  // L/P
                    {wch: 15}, // TEMPAT LAHIR
                    {wch: 15}, // TGL/UMUR
                    {wch: 12}, // AGAMA
                    {wch: 15}, // PENDIDIKAN
                    {wch: 15}, // PEKERJAAN
                    {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 10}, {wch: 15}
                ];
                ws['!cols'] = wscols;

                // Nama file yang akan diunduh
                var namaKepalaKeluarga = "<?php echo isset($catatan_keluarga->nama_kepala_keluarga) ? addslashes(preg_replace('/[^A-Za-z0-9\- \_]/', '', $catatan_keluarga->nama_kepala_keluarga)) : 'Unknown'; ?>";
                var tahun = "<?php echo isset($catatan_keluarga->date_year) ? $catatan_keluarga->date_year : date('Y'); ?>";
                var fileName = "catatan_keluarga_" + namaKepalaKeluarga.replace(/ /g, "_") + "_" + tahun + ".xlsx";

                // Memulai trigger download Excel
                XLSX.writeFile(wb, fileName);

                // Update teks dan informasikan user boleh menutup tab
                document.getElementById('loadingMsg').innerHTML = "File Excel berhasil diunduh.<br><br><span style='font-weight:normal; font-size:12px;'>Anda dapat menutup halaman ini.</span>";
                
                // Secara opsional bisa kita close tabnya otomatis setelah dijeda sedikiti waktu (tergantung dukungan browser)
                setTimeout(function(){
                    window.close();
                }, 3000);

            } catch(e) {
                console.error("Gagal men-generate Excel:", e);
                document.getElementById('loadingMsg').innerHTML = "Maaf, terjadi kesalahan saat memproses file Excel.";
            }
        };
    </script>
</body>
</html>
