-- ============================================================
-- MIGRASI: Tambah kolom program KISAH, KRISAN, KIJAT, KUAT, KISAK
-- ke tabel tbl_keg_pokja_1
-- Setiap program memiliki 4 sub-kolom:
--   _kegiatan   = jumlah kegiatan
--   _vol_keg    = volume/frekuensi kegiatan
--   _metode     = metode yang digunakan
--   _jml_sasaran = jumlah sasaran/peserta
-- ============================================================

ALTER TABLE `tbl_keg_pokja_1`
  -- KISAH (Kelompok 1)
  ADD COLUMN `kisah_kegiatan`     INT(11) DEFAULT 0 AFTER `kelompok_arisan`,
  ADD COLUMN `kisah_vol_keg`      INT(11) DEFAULT 0 AFTER `kisah_kegiatan`,
  ADD COLUMN `kisah_metode`       VARCHAR(100) DEFAULT NULL AFTER `kisah_vol_keg`,
  ADD COLUMN `kisah_jml_sasaran`  INT(11) DEFAULT 0 AFTER `kisah_metode`,

  -- KRISAN (Kelompok 2)
  ADD COLUMN `krisan_kegiatan`    INT(11) DEFAULT 0 AFTER `kisah_jml_sasaran`,
  ADD COLUMN `krisan_vol_keg`     INT(11) DEFAULT 0 AFTER `krisan_kegiatan`,
  ADD COLUMN `krisan_metode`      VARCHAR(100) DEFAULT NULL AFTER `krisan_vol_keg`,
  ADD COLUMN `krisan_jml_sasaran` INT(11) DEFAULT 0 AFTER `krisan_metode`,

  -- KIJAT (Kelompok 3)
  ADD COLUMN `kijat_kegiatan`     INT(11) DEFAULT 0 AFTER `krisan_jml_sasaran`,
  ADD COLUMN `kijat_vol_keg`      INT(11) DEFAULT 0 AFTER `kijat_kegiatan`,
  ADD COLUMN `kijat_metode`       VARCHAR(100) DEFAULT NULL AFTER `kijat_vol_keg`,
  ADD COLUMN `kijat_jml_sasaran`  INT(11) DEFAULT 0 AFTER `kijat_metode`,

  -- KUAT (Kelompok 4)
  ADD COLUMN `kuat_kegiatan`      INT(11) DEFAULT 0 AFTER `kijat_jml_sasaran`,
  ADD COLUMN `kuat_vol_keg`       INT(11) DEFAULT 0 AFTER `kuat_kegiatan`,
  ADD COLUMN `kuat_metode`        VARCHAR(100) DEFAULT NULL AFTER `kuat_vol_keg`,
  ADD COLUMN `kuat_jml_sasaran`   INT(11) DEFAULT 0 AFTER `kuat_metode`,

  -- KISAK (Kelompok 5)
  ADD COLUMN `kisak_kegiatan`     INT(11) DEFAULT 0 AFTER `kuat_jml_sasaran`,
  ADD COLUMN `kisak_vol_keg`      INT(11) DEFAULT 0 AFTER `kisak_kegiatan`,
  ADD COLUMN `kisak_metode`       VARCHAR(100) DEFAULT NULL AFTER `kisak_vol_keg`,
  ADD COLUMN `kisak_jml_sasaran`  INT(11) DEFAULT 0 AFTER `kisak_metode`,

  -- Update PKBN dengan sub-kolom kegiatan (sudah ada pkbn_klpsimulasi & pkbn_angg)
  ADD COLUMN `pkbn_kegiatan`      INT(11) DEFAULT 0 AFTER `kisak_jml_sasaran`,
  ADD COLUMN `pkbn_vol_keg`       INT(11) DEFAULT 0 AFTER `pkbn_kegiatan`,
  ADD COLUMN `pkbn_metode`        VARCHAR(100) DEFAULT NULL AFTER `pkbn_vol_keg`,
  ADD COLUMN `pkbn_jml_sasaran`   INT(11) DEFAULT 0 AFTER `pkbn_metode`;
