-- ============================================================
-- MIGRASI: Tambah kolom Pokja IV sesuai format "DATA KEGIATAN PKK"
-- ke tabel tbl_keg_pokja_4
-- Kolom baru (nomor kolom sesuai format cetak):
--   imunisasi_bayi_balita  = Kolom 9  : Imunisasi / Vaksinasi Bayi/Balita
--   pkg                    = Kolom 10 : PKG (Program Kesehatan Lainnya/Gizi)
--   tbc                    = Kolom 11 : TBC
--   kk_asuransi_kesehatan  = Kolom 24 : Jumlah KK yang Memiliki Asuransi Kesehatan
--   prog_kesehatan         = Kolom 25 : Program Unggulan GKSTTB - Kesehatan
--   prog_kelestarian       = Kolom 26 : Program Unggulan GKSTTB - Kelestarian Lingkungan Hidup
--   prog_perencanaan_sehat = Kolom 27 : Program Unggulan GKSTTB - Perencanaan Sehat
-- ============================================================

ALTER TABLE `tbl_keg_pokja_4`
  -- Kesehatan (setelah kolom posyandu)
  ADD COLUMN `imunisasi_bayi_balita`  INT(11) DEFAULT 0 AFTER `kes_posyandu_lansia_kartu_gratis`,
  ADD COLUMN `pkg`                    INT(11) DEFAULT 0 AFTER `imunisasi_bayi_balita`,
  ADD COLUMN `tbc`                    INT(11) DEFAULT 0 AFTER `pkg`,

  -- Perencanaan Sehat (setelah tabungan keluarga)
  ADD COLUMN `kk_asuransi_kesehatan`  INT(11) DEFAULT 0 AFTER `pnya_tab_keluarga`,

  -- Program Unggulan: Gerakan Keluarga Sehat Tanggap & Tangguh Bencana (GKSTTB)
  ADD COLUMN `prog_kesehatan`         INT(11) DEFAULT 0 AFTER `kk_asuransi_kesehatan`,
  ADD COLUMN `prog_kelestarian`       INT(11) DEFAULT 0 AFTER `prog_kesehatan`,
  ADD COLUMN `prog_perencanaan_sehat` INT(11) DEFAULT 0 AFTER `prog_kelestarian`;
